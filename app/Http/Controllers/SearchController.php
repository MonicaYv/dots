<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File as FileModel;
use App\Models\Folder;
use App\Models\LightApp;
use App\Models\App;

class SearchController extends Controller
{
    public function search(Request $request)
    {


         $apps = App::all();
         
        $query = $request->input('query');

        $files = FileModel::where('path', 'LIKE', "%{$request->term}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
           // $files = FileModel::Where('name', 'LIKE', "%{$query}%")->get();

        
        $folders = Folder::where('path', 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get(['path', 'name', 'status']);
  // Search in LightApp model
      

        
        $results = [
            'files' => $files,
            'folders' => $folders,
          
        ];


  

     $html = view('appendview.search')->with('results', $results)->render();
        return response()->json(['html' => $html]);
        
    }


    public function index()
    {
        return view('search-form');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchAutocomplete($term)
    {
        /*$res = Task::select("name")
                ->where("name","LIKE","%{$request->term}%")
                ->get();*/

                $files = FileModel::where('path', 'LIKE', "%{$request->term}%")
            ->orWhere('name', 'LIKE', "%{$request->term}%")
            ->orWhere('status', 'LIKE', "%{$request->term}%")
            ->orderBy('name', 'asc')
            ->get();

            $folders = Folder::where('path', 'LIKE', "%{$request->term}%")
            ->orWhere('name', 'LIKE', "%{$request->term}%")
            ->orWhere('status', 'LIKE', "%{$request->term}%")
            ->orderBy('name', 'asc')
            ->get(['path', 'name', 'status']);

             $results = [
            'files' => $files,
            'folders' => $folders,
          
        ];
   
         return response()->json($results);
    }
}

