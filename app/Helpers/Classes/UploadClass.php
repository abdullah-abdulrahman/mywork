<?php  

namespace App\Helpers\Classes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UploadClass extends Controller
{
	
	public static function uploadImage($request, $name_image, $path)
	{
		$file = $request->file($name_image);
		$extension = $file->getClientOriginalExtension();
    	$fileNameToStore =  rand(20,60000) .uniqid(). '.' . $extension;
    	$path = $file->storeAs($path, $fileNameToStore);
    	return $fileNameToStore;
	}
}


















?> 























