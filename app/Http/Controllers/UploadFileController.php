<?php

namespace codeDelivery\Http\Controllers;

use Illuminate\Http\Request;



class UploadFileController extends Controller {
   public function index(){
      return view('uploadfile');
   }

   public function upload(Request $request) {
    // selected folder
    $selectfolder = \Request::get('selectfolder');
    // input files
    $files = $request->file('file');

    foreach ($files as $file):

        $fileName = $file->getClientOriginalName();

        $pathToStore = storage_path(). "/download/". $selectfolder;

        $file->move($pathToStore, $fileName);

    endforeach;
   }

   public function showUploadFile(Request $request){
      $file = $request->file('image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'uploads/1';
      $file->move($destinationPath,$file->getClientOriginalName());
   }
}
