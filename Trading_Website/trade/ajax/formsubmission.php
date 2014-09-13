<?php
	session_start();
	$current_user_id=$_SESSION['user_id'];
	require_once('../../class/mysql.php');
	$action=$_POST['action'];
	if($action=='add_item'){
			$title=$GLOBALS['MySQL']->escape($_POST['title']);
			$category=$GLOBALS['MySQL']->escape($_POST['category']);
			$location=$GLOBALS['MySQL']->escape($_POST['location']);
			$price=$GLOBALS['MySQL']->escape($_POST['price']);
			$description=$GLOBALS['MySQL']->escape($_POST['description']);
			$imagepath=$GLOBALS['MySQL']->escape($_POST['imagepath']);
	}
	$time=time();
	$result=$GLOBALS['MySQL']->res("insert into item_stat(owner_id,title,category,location,imagepath,description,expected_price,traded_price,date_added,date_traded,status) values ('$current_user_id','$title','$category','$location','$imagepath','$description','$price','0','$time','0','1')");
	if($result){
		echo 'smthng';
		$result1=$GLOBALS['MySQL']->res("select item_no from item_stat where owner_id='$current_user_id' and date_added='$time' order by date_added desc limit 1");
		$row=mysql_fetch_array($result1);
		$id=$row['item_no'];
		echo $id;
		$temp=0;
		$dup_id=$id;
		while(floor($dup_id)!=0){
			$temp++;
			$dup_id=floor($dup_id/10);
		}
		$item_code='';
		$characters=8-$temp;
		$possible_letters = '23456789bcdfghjkmnpqrstvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
		$i = 0;
		$item_code.=$id;
		while ($i < $characters) { 
			$item_code.= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
			$i++;
		}
		$result2=$GLOBALS['MySQL']->res("update item_stat set item_code='$item_code' where item_no='$id'");
		if($result2){
			$targetPath='../image/user/'.$current_user_id;
			if( !is_dir($targetPath) ){
       			 mkdir($targetPath, 0777);
       			$fp=fopen($targetPath . "/index.html", "w");
    		}
			$array=explode('-',$imagepath);
			$upload_length=count($array);
			for($i=0;$i<$upload_length-1;$i++){
				$targetFile=$targetPath.'/'.$array[$i];
				$tempFile='../image/temp/'.$array[$i];
				$fp1 = fopen($tempFile, "r");
       			$fp2 = fopen($targetFile, "w");
        		$buff = fread($fp1, filesize($tempFile));
        		fwrite($fp2, $buff);
        		fclose($fp1);
        		fclose($fp2);
				unlink($tempFile);
			}
		}
	}
	
?>
