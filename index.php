<?php

$route = $_SERVER['REQUEST_URI'];
if($route == '/rss') {
    require_once 'Frontend/xml.php';
} else {
    require_once 'Fronted/home.php';
}




