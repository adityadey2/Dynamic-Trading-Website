<?php
	include("../funcUtil/funcUtil1.php");
	include("../funcUtil/funcUtil2.php");
	session_start();
	$_SESSION['username']='aditya.dey2';
	$_SESSION['user_id']=1;
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" id="smartnetwork" class="social">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Network</title>
<link rel="stylesheet" href="../css/main_1.css" type="text/css" />
<link rel="stylesheet" href="../css/css1.css" type="text/css" />
<link rel="stylesheet" href="../css/component.css" type="text/css" />
<link rel="stylesheet" href="../css/hexaflip.css" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" />
</head>

<body class="snIndex">
	
	<div class="_li mp-pusher" id="mp-pusher">
		<div class="clearfix">
			<div id="pagelet_newsfeed" data-referrer="pagelet_newsfeed" class="lfloat">
				<div id="newsfeed">
					<div id="newsfeedInner">
						<div class="clearfix">
							<div class="lfloat _nfa12 _nfc4 _nfo_y _nfr_11">
<?php 							showtopheadbar(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/hexaflip.js"></script>
	<script type="text/javascript" src="../js/jquery.cbpQTRotator.js"></script>
	<!--<script type="text/javascript" src="../js/jsUtil1.js"></script>-->
	<script type="text/javascript" src="../js/jsUtil2.js"></script>
	<script type="text/javascript" src="js/jsUtil1.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/mlpushmenu.js"></script>
	<script>
		new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
	</script>
	
</body>
</html>