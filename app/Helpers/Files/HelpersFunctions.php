<?php


if (!function_exists('site_image')) {
    function site_image($image)
    {
        return url('/assets/img/' . $image);
    }
}


if (!function_exists('get_image')) {
    function get_image($path_image)
    {
        return url('/uploads/' . $path_image);
    }
}




if (!function_exists('adminAth')) {
    function adminAth()
    {
        return auth()->guard('admin');
    }
}

//  pathes 

define("UPLOADS_PATH", "public/images/");
define("IMAGES_PATH", "/storage/images/");

















?>
