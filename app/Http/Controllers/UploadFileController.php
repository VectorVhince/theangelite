<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\mypdf;
use PDF;
use Response;
use Image;

class UploadFileController extends Controller
{
    public function upload(Request $request){

        $covername = time() . '.' . $request->file('upload_cover')->getClientOriginalExtension();

        if ($request->hasFile('upload_cover')) {
            // Image::make($request->file('upload_cover'))->resize(900, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save(public_path('files/cover_photo/' . $covername));
            Image::make($request->file('upload_cover'))->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('files/cover_photo/' . $covername));
        }


    	 $filename = $request->file('upload_file')->getClientOriginalName();
        $request->file('upload_file')->move(
          base_path().'/public/files/uploads/', $filename
        );
      
        $fullPath = '/public/files/uploads/' . $filename;
        $upload = new mypdf;


        $upload->filename = $filename;
        $upload->cover_photo = $covername;
 		$upload->save();

    	// $files = $request->file('file');
    	// $output = [];

    	// if(!empty($files)):

    	// 	foreach($files as $file):
    	// 		Storage::put($file->getClientOriginalName(), file_get_contents($file));
    	// 		$output['filename'] = $file->getClientOriginalName();
    	// 	endforeach;

    	// endif;

    	// DB::table('mypdfs')->insert(array($output));

    	// dd($output);
    	return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function pdf($filename){

    
    	$file= public_path(). "/files/uploads/" . $filename;

	    $headers = array(
	              'Content-Type: application/pdf',
	            );

	   return response()->download($file, $filename , $headers);
    }

    public function deletepdf($id){
        $aa = mypdf::find($id);
        $aa->delete();
        return back();
    }
}
