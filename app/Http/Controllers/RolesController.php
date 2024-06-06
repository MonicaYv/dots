<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the roles.
     */
    public function index($id ='')
    {
       if($id){
        $role = Roles::find($id);
        return view('roles.index',compact('role'));

       }else{
        $roles = Roles::get();
        return view('roles.index',compact('roles'));
        }
    }

    public function roles()
    {
        $roles = Roles::get();
        $roles = json_encode($roles);
        return view('roles.roles',compact('roles'));
    }

    public function add()
    {
       return view('roles.add');
    }

    public function edit(string $id)
    {
       $role = Roles::find($id);
       $role->file_manage_settings = explode(",", $role->file_manage_settings);
       $role->user_settings = explode(",", $role->user_settings);
       return view('roles.edit',compact('role'));
    }

    public function create(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['file_manage_settings'] = implode(',', $input['file_manage_settings']);
        $input['user_settings'] = implode(',', $input['user_settings']);
        $role = Roles::create($input);
         return redirect()->route('roles');
           
    }

     public function update(Request $request, string $id)
    {

       // Access and prepare data from the request
        $data = request()->except(['_token']);
        if(!empty($data['file_manage_settings']))
        $data['file_manage_settings'] = implode(',', $data['file_manage_settings']);
        if(!empty($data['user_settings']))
        $data['user_settings'] = implode(',', $data['user_settings']);

        $updated = Roles::where('id', $id)->update($data);
        $role = Roles::find($id);

        if ($updated) {
            return redirect()->route('roles');
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return redirect()->route('roles');
        }
    }

     public function destroy(string $id)
    {
        
        Roles::where('id', $id)->delete();
        return redirect()->route('roles');
         
    
    }
}
