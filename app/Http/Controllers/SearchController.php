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

        $files = FileModel::where('path', 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
           // $files = FileModel::Where('name', 'LIKE', "%{$query}%")->get();

        
        $folders = Folder::where('path', 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get(['path', 'name', 'status']);
  // Search in LightApp model
        $lightApps = LightApp::where('name', 'LIKE', "%{$query}%")
            ->orWhere('link', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get(['name', 'link', 'description','icon']);

        
        $results = [
            'files' => $files,
            'folders' => $folders,
            'lightApps' => $lightApps,
        ];


  

     $html = view('appendview.search')->with('results', $results)->render();
        return response()->json(['html' => $html]);
        
    }
}

