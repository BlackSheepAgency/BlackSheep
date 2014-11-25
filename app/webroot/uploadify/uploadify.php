<?php

define('APPLICATION_PATH', realpath(dirname(__FILE__)).'/../');

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = $_GET['folder_images'].'/'. $_GET['folder'];

if (!empty($_FILES)) {

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
	
	$tab_name = explode(".", $_FILES['Filedata']['name']);
	$ext = $tab_name[count($tab_name)-1];
	array_pop($tab_name);
	$txt = implode('.', $tab_name);
	$name_file = time().'_'.$tab_name[0].".".$ext;
	$targetFile = rtrim($targetPath,'/') . '/' . $name_file;
	$targetFile = APPLICATION_PATH.$targetFile;
	
	// Validate the file type
	

	$fileTypes = array('jpg','jpeg','gif','png', 'pdf'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		// list($poubelle, $URL_dest) = explode("../../", $targetFile);

		echo 'img/'.$_GET['folder'] .'/'.$name_file;

	} else {
		echo 'Invalid file type.';
	}
}

?>