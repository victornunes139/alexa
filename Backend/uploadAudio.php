<?php

$url = 'http://localhost';

if(isset($_FILES['audio']) && is_uploaded_file($_FILES['audio']['tmp_name'])) {
    $uploads_dir = '../uploads';
    $tmp_name = $_FILES['audio']['tmp_name'];
    $name = basename($_FILES["audio"]["name"]);


    ///Deletar um arquivo
    $files = glob('../uploads/*');
    foreach($files as $file) { 
        if(is_file($file)) {
            unlink($file); 
        }
    }


    move_uploaded_file($tmp_name, "$uploads_dir/$name");
} else {
    header('Location: ' . $url);
}