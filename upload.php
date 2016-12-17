<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Array
(
    [file_upload] => Array
    (
        [name] => e4f.png
        [type] => image/png
        [tmp_name] => /Applications/MAMP/tmp/php/phpodzfRk
        [error] => 0
        [size] => 328119
    )
)
 */
 

// Check for errors
if($_FILES['file_upload']['error'] > 0){
    die('An error ocurred when uploading.');
}

if(!getimagesize($_FILES['file_upload']['tmp_name'])){
    die('Please ensure you are uploading an image.');
}

// Check filetype
if($_FILES['file_upload']['type'] != 'image/png'){
    die('Unsupported filetype uploaded.');
}

// Check filesize
if($_FILES['file_upload']['size'] > 500000){
    die('File uploaded exceeds maximum upload size.');
}

// Check if the file exists
if(file_exists('upload/' . $_FILES['file_upload']['name'])){
    die('File with that name already exists.');
}

// Upload file
if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], 'upload/' . $_FILES['file_upload']['name'])){
    die('Error uploading file - check destination is writeable.');
}

die('File uploaded successfully.');

?>