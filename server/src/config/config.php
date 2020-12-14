<?php
//BASE URL 
// $uri = $_SERVER['REQUEST_URI'];

// if(isset($uri) && $uri !== null){
//     $uri = substr($uri, 1);
//     $uri = explode('/', $uri);
//     $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0]. "/" . $uri[1] ."/";
// }else{
//     $uri = null;
// }

// define("BASE_URL", $uri);

define('CONTROLLERS','src/controllers/');
define('VIEWS','src/views/');
define('MODELS','src/models/');
