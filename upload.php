<?php

if(isset($_POST["submit"])) {
	$file = $_FILES['file'];

	$fileName = $FILES['file']['name'];
	$fileTmpName = $FILES['file']['tmp_name'];
	$fileSize = $FILES['file']['size'];
	$fileError = $FILES['file']['error'];
	$fileType = $FILES['file']['type'];

	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
			   $fileNameNew = uniqid('',true).".".$fileActualExt;
			   $fileDestination = 'uploads/'.$fileNameNew;
			   move_uploaded_file($fileTmpName, $fileDestination);
			   header("Location: index.php?uploadsucess"); 	
			}
		}	else { 
				echo "Grande";

		}
	} else {
		echo "não foi";
	}
}
?>
