<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" id="smartnetwork" class="sidelongchat" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
<link rel="stylesheet" type="text/css" href="css/main_1.css"/>
<link rel="stylesheet" type="text/css" href="css/chat.css"/>
<title>Smart Network</title>
</head>
<body>
	<div id="globalcontainer">
	
	</div>
	<div id="sidecharbar" class="">
		<div id="sidecharbarwrapper" class="fixed_elem parentHeight sideChatBar">
			<div>
				<div class="clearfix">
					<ul class="parentHeight">
						<?php getOnlineUsers(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div
</body>