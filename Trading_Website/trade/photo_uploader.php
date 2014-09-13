<?php
	
	if (!empty($_FILES)) {
    	$tempFile = $_FILES['file']['tmp_name'];
		$targetPath='image/temp';
		if( !is_dir($targetPath) ){
       		 mkdir($targetPath, 0777);
       		$fp=fopen($targetPath . "/index.html", "w");
    	}
		
		 $fileParts = pathinfo($_FILES['file']['name']);
		 //Check image types/extension
		 $fileType=array("jpg","png","gif","jpeg");
		 if ( in_array(strtolower($fileParts['extension']), $fileType )) {
        
        	//Check Image Size
			list($width, $height, $type, $attr) = getimagesize($tempFile);
			
           	 	$targetFileName = md5(uniqid('',true)) . "." . $fileParts['extension'];
            	$targetFile = $targetPath . '/' . $targetFileName;
				if(move_uploaded_file($tempFile,$targetFile))
         			move_uploaded_file($tempFile,$targetFile);
				$aspectRatio=$width/$height;
				if($aspectRatio>1){
					$left=36*($aspectRatio-1);
					$img='<img class="temp_image img" style="left:-'.$left.'px; height:73px;" src="image/temp/'.$targetFileName.'" data-imagename="'.$targetFileName.'">';
				}else{
					$img='<img class="temp_image img" style="top:0px; width:73px;" src="image/temp/'.$targetFileName.'"  data-imagename="'.$targetFileName.'">';
				}
        		echo json_encode(array('success'=>1, 'file'=>$targetFileName,'img'=>$img));
		 }
	}
?>