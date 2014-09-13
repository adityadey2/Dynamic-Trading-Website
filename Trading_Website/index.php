<?php
	include("funcUtil/funcUtil1.php");
	include("funcUtil/funcUtil2.php");
	session_start();
	if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" id="smartnetwork" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Network</title>
<link rel="stylesheet" href="css/main_1.css" type="text/css" />
<link rel="stylesheet" href="css/css1.css" type="text/css" />
<link rel="stylesheet" href="css/component.css" type="text/css" />
<link rel="stylesheet" href="css/hexaflip.css" type="text/css" />
</head>

<body class="snIndex">
	
	<div class="_li">
<?php 	showtopheadbar(); ?>
        <div id="globalContainer" class="uiContextualLayerParent">
<?php 		showmiddlecontent();
			showfooter();
?>
           
        </div>
    </div>
    <div id="tooltip" class="helptip _tip_size_a _tip_style_a hidden_elem">
    	<div class="clearfix">
        	<span class="destip">
            
            </span>   
        </div>
    </div>
	
	<div class="_999 _cap-entire _mk4 bgb fullscreen takeControl hidden_elem" id="slideShow">
    	<div class="_998">
        
        </div>
	</div>
    <div class="_999 bgb _cap-entire _mk3 hidden_elem" id="popup">
    	<div class="_998">
        	<div class="popupbox">
				<div class="loading _poptype-a">
					<div class="_09-ut">
						<span class="_55ym _55yq _55yo"></span>
					</div>
				</div>
            </div>
        
        </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/hexaflip.js"></script>
	<script type="text/javascript" src="js/jquery.cbpQTRotator.js"></script>
	<script type="text/javascript" src="js/jsUtil1.js"></script>
	<script type="text/javascript" src="js/jsUtil2.js"></script>
	<script type="text/javascript">
	$( function() {
		$(document).ready(function(e) {
            $( '#cbp-qtrotator' ).cbpQTRotator({
				interval : 6000
			});
        });
		//......Hexaflip
	})(jQuery);
	
	
</script>
</body>
</html>

<?php }else{
			header('Location:trade/index.php');
	}
?>