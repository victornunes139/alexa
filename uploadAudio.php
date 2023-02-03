<?php
include 'utils.php';
include 'environment.php';

if(isset($_FILES['audio']) && is_uploaded_file($_FILES['audio']['tmp_name'])) {
    $uploads_dir = 'uploads';
    $tmp_name = $_FILES['audio']['tmp_name'];
    $name = basename($_FILES["audio"]["name"]);

    $files = glob('uploads/*');
    foreach($files as $file) { 
        if(is_file($file)) {
            unlink($file); 
        }
    }

    $success_moved = move_uploaded_file($tmp_name, "$uploads_dir/$name");

    $fields = [
        "uid" => guidv4(),
        "updateDate" => date("Y-m-d\TH:i:s.000\Z"),
        "titleText" => "Título da Alexa",
        "mainText" => "MainText da Alexa",
        "streamUrl" => "$host/uploads/$name",
        "redirectionUrl" =>  $host
    ];

    $writed_success = file_put_contents($filename, json_encode($fields));


    if($success_moved && $writed_success !== false) {
        $success = 'true';
    } else {
        $success = 'false';
    }
} 