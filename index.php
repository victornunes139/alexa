<?php

$route = $_SERVER['REQUEST_URI'];

if($route == '/json') {
    require 'audio.json';
} else {
    header('Location: home.php');
}




