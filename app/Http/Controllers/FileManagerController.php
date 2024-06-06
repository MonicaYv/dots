<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\File as FileModel ;
use App\Models\Folder;

class FileManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('filemanager');
    }
    public function createFolder(Request $request){
        
        $parentFolder = $request->input('parentFolder');
        $childFolder = 'New Folder';
        $parentFolderPath = base_path('public/rootdir/' . $parentFolder); // Adjust this to the base path of your parent folder
        $childFolderPath = $parentFolderPath . '/' . $childFolder;
    
        if (!File::exists($parentFolderPath)) {
            return response()->json(['success' => false, 'message' => 'Parent folder does not exist.']);
        }
    
        $counter = 1;
        $originalChildFolderPath = $childFolderPath;
    
        // Check if the child folder already exists and append a number if necessary
        while (File::exists($childFolderPath)) {
            $childFolderPath = $originalChildFolderPath . ' (' . $counter . ')';
            $counter++;
        }
    
        
        $newFolder = new Folder();
        $newFolder->parent = 0;
        $newFolder->name = basename($childFolderPath);
        $newFolder->parentpath = $parentFolderPath;
        $newFolder->path = $childFolderPath;
        $newFolder->sort_order = 0; // Adjust as needed
        $newFolder->status = 1; // Assuming 1 means active
        $newFolder->created_by = auth()->id(); // Assuming you want to save the ID of the authenticated user
        if ($newFolder->save()) {
            File::makeDirectory($childFolderPath, 0775, true);
        }
       
    
        return response()->json(['success' => true, 'folderName' => basename($childFolderPath)]);

    }
}
