<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CloudStorageController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //to get all files
        $content = Storage::disk('s3')->allFiles('');
        //to get specific file
        //$content = Storage::get($file_name);
        
        return view('cloudstorage')->with('contents',$content);
    }

    public function list()
    {
        //to get all files
        $content = Storage::disk('s3')->allFiles('');
        
        dd($content);
        //return view('cloudstorage')->with('contents',$content);
    }



    public function createFile(Request $request)
    {
          $file_name = $request->file_name;
          $file_content = 'Dynamically added data';
          $done = Storage::disk('s3')->put($file_name, $file_content);

          if($done)
            return redirect()->route('cloudstore-s3-list');  
          else
            return response()->json('file creation failed');
    }

    public function createFolder($foldername)
    {
          $done = Storage::disk('s3')->put($foldername,'');

          if($done)
            return redirect()->route('cloudstore-s3-list');
          else
            return response()->json('folder creation failed');
    }

    public function createSubFolder($parentFolder,$foldername)
    {
          $foldername = $parentFolder.'/'.$foldername;
          //$done = Storage::put($foldername,'');
          $done = Storage::disk('s3')->makeDirectory($foldername);

          if($done)
            return redirect()->route('cloudstore-s3-list');
          else
            return response()->json('Sub-folder creation failed');
    }

    public function getFileContent($file)
    {     
            //to get specific file
        $content = Storage::disk('s3')->get($file);

        dd($content);

    }

    public function getFileData(Request $request)
    {    

        $file = $request->file; 
            //to get specific file
        $content = Storage::disk('s3')->get($file);

        $files = view('appendview.filecontent')->with('content',$content)->render();
        return response()->json($files);

    }

    public function delete(Request $request)
    {     
        $file = $request->file;
            //to get specific file
        $done = Storage::disk('s3')->delete($file);

        if($done)
            return redirect()->route('cloudstore-s3-list');
          else
            return response()->json('File deletion failed');

    }
}
