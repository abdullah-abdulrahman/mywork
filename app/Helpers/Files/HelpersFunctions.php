<?php


if (!function_exists('site_image')) {
    function site_image($image)
    {
        return url('/assets/img/' . $image);
    }
}

if (!function_exists('adminAth')) {
    function adminAth()
    {
        return auth()->guard('admin');
    }
}

// Get Images Paths

function get_slider_image($path_image)
{
    return url('/uploads/slider/' . $path_image);
}

function get_about_image($path_image)
{
    return url('/uploads/about/' . $path_image);
}

function get_partners_image($path_image)
{
    return url('/uploads/partners/' . $path_image);
}

function get_services_image($path_image)
{
    return url('/uploads/services/' . $path_image);
}

function get_projects_image($path_image)
{
    return url('/uploads/projects/' . $path_image);
}


//  pathes 

define("UPLOADS_PATH", "uploads/");
define("SLIDER_PATH", "slider/");
define("ABOUT_PATH", "about/");
define("PARTNERS_PATH", "partners/");
define("PROJECTS_PATH", "projects/");
define("SERVICES_PATH", "services/");


















?>
