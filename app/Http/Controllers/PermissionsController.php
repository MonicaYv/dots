<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class PermissionsController extends Controller
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
        $permission = Permissions::find($id);
        return view('permissions.index',compact('permission'));

       }else{
           $permissions = Permissions::get();
           return view('permissions.index',compact('permissions'));
        }
    }

    public function permissions()
    {
        $permissions = Permissions::get();
        $permissions = json_encode($permissions);
        return view('permissions.permissions',compact('permissions'));
    }

    public function add()
    {
       return view('permissions.add');
    }

    public function create(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['permissions'] = implode(',', $input['permissions']);
        $role = Permissions::create($input);
        return redirect()->route('permissions');  
    }

     public function edit(string $id)
    {
       $permission = Permissions::find($id);
       $permission->permissions = explode(",", $permission->permissions);
       return view('Permissions.edit',compact('permission'));
    }

     public function update(Request $request, string $id)
    {

       // Access and prepare data from the request
        $data = request()->except(['_token']);
        $data['permissions'] = implode(',', $data['permissions']);
        $updated = Permissions::where('id', $id)->update($data);
        $role = Permissions::find($id);

        if ($updated) {
            return redirect()->route('permissions');
        } else {
            // Handle update failure (e.g., log the error or return a specific error message)
            return redirect()->route('permissions');
        }
    }

     public function destroy(string $id)
    {
        
        Permissions::where('id', $id)->delete();
        return redirect()->route('permissions');
    
    }
}
