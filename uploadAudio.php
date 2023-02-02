<?php
$success = null;

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

    $success = move_uploaded_file($tmp_name, "$uploads_dir/$name");

    if($success) {
        $success = 'true';
    } else {
        $success = 'false';
    }
} 