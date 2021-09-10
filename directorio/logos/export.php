<?php

	/**
	 * More info about this script on: 
	 * http://stackoverflow.com/questions/11511511/how-to-save-a-png-image-server-side-from-a-base64-data-string
	 */

	$data = $_REQUEST['base64data']; 
	$name = $_REQUEST['nombrePath'];
	echo $data;


	$image = explode('base64,',$data); 

	

	if(file_put_contents($name.'.png', base64_decode($image[1]))){
		echo "true ok ";
	}
?>

