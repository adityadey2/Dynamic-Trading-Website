<?php
	session_start();
	$_SESSION['user_id']=1;
	$_SESSION['username']='aditya.dey2';
	if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
		$user_id=$_SESSION['user_id'];
		$username=$_SESSION['username'];
		include("funcUtil/funcUtil1.php");
		include("funcUtil/funcUtil2.php");
		require_once("../class/mysql.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" id="smartnetwork" class="trade">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Network</title>
<link rel="stylesheet" href="../css/main_1.css" type="text/css" />
<link rel="stylesheet" href="../css/css1.css" type="text/css" />
<link rel="stylesheet" href="../css/component.css" type="text/css" />
<link rel="stylesheet" href="../css/hexaflip.css" type="text/css" />
<link rel="stylesheet" href="../social/css/index.css" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" />
</head>

<body class="snIndex" id="body">
	<div class="_li">
		<div class="clearfix">
			<div id="headBarHolder" data-referrer="headBarHolder">
				<div id="headBar">
					<div id="headBarInner">
						<div class="_15mac">
							<div class="loggedin_menubar_container">
								<div class="loggedin_menubar">
									<div class="lfloat" id="logoBar">
										<div id="logoBarInner">
											<div id="logo">
												<div class="clearfix">
										
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="rfloat">
							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="accmdBar" data-referrer="accmdBar">
				<div id="accmdBarInner">
					<div class="_waz uiToggle">
			
<?php 			createSearchBar();	?>
						<div id="trade-places">
							<div id="trade-placeInner">
								<div class="_tid">
									<div>
										<div class="_tid-">
											<div class="clearfix">
												<div class="lfloat">
													<h1><span>Cities</span></h1>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Agra</a></li>
														<li class="listItem"><a href="" class="anchorItem">Ahmedabad</a></li>
														<li class="listItem"><a href="" class="anchorItem">Bangalor</a></li>
														<li class="listItem"><a href="" class="anchorItem">Bhopal</a></li>
														<li class="listItem"><a href="" class="anchorItem">Chennai</a></li>
														<li class="listItem"><a href="" class="anchorItem">Delhi</a></li>
														<li class="listItem"><a href="" class="anchorItem">Hyderabad</a></li>
														<li class="listItem"><a href="" class="anchorItem">Indore</a></li>
														<li class="listItem"><a href="" class="anchorItem">Jaipur</a></li>
														<li class="listItem"><a href="" class="anchorItem">Kanpur</a></li>
														
													</ul>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Kolkata</a></li>
														<li class="listItem"><a href="" class="anchorItem">Lucknow</a></li>
														<li class="listItem"><a href="" class="anchorItem">Ludhiana</a></li>
														<li class="listItem"><a href="" class="anchorItem">Mumbai</a></li>
														<li class="listItem"><a href="" class="anchorItem">Nagpur</a></li>
														<li class="listItem"><a href="" class="anchorItem">Patna</a></li>
														<li class="listItem"><a href="" class="anchorItem">Pune</a></li>
														<li class="listItem"><a href="" class="anchorItem">Surat</a></li>
														<li class="listItem"><a href="" class="anchorItem">Thane</a></li>
														<li class="listItem"><a href="" class="anchorItem">Vadodra</a></li>
													</ul>
												</div>
												<div class="rfloat">
													<h1><span>States</span></h1>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Andaman & Nicobar Islands</a></li>
														<li class="listItem"><a href="" class="anchorItem">Andhra Pradesh</a></li>
														<li class="listItem"><a href="" class="anchorItem">Arunachal Pradesh</a></li>
														<li class="listItem"><a href="" class="anchorItem">Assam</a></li>
														<li class="listItem"><a href="" class="anchorItem">Bihar</a></li>
														<li class="listItem"><a href="" class="anchorItem">Chandigarh</a></li>
														<li class="listItem"><a href="" class="anchorItem">Hyderabad</a></li>
														<li class="listItem"><a href="" class="anchorItem">Dadra & Nagar Haveli</a></li>
														<li class="listItem"><a href="" class="anchorItem">Daman & Diu</a></li>
														<li class="listItem"><a href="" class="anchorItem">Delhi</a></li>
														
													</ul>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Goa</a></li>
														<li class="listItem"><a href="" class="anchorItem">Gujarat</a></li>
														<li class="listItem"><a href="" class="anchorItem">Haryana</a></li>
														<li class="listItem"><a href="" class="anchorItem">Himachal Pradesh</a></li>
														<li class="listItem"><a href="" class="anchorItem">Jammu & Kashmir</a></li>
														<li class="listItem"><a href="" class="anchorItem">Jharkhand</a></li>
														<li class="listItem"><a href="" class="anchorItem">Karnataka</a></li>
														<li class="listItem"><a href="" class="anchorItem">Kerala</a></li>
														<li class="listItem"><a href="" class="anchorItem">Lakshadweep</a></li>
														<li class="listItem"><a href="" class="anchorItem">Madhya Pradesh</a></li>
													</ul>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Maharashtra</a></li>
														<li class="listItem"><a href="" class="anchorItem">Manipur</a></li>
														<li class="listItem"><a href="" class="anchorItem">Meghalaya</a></li>
														<li class="listItem"><a href="" class="anchorItem">Mizoram</a></li>
														<li class="listItem"><a href="" class="anchorItem">Nagaland</a></li>
														<li class="listItem"><a href="" class="anchorItem">Orissa</a></li>
														<li class="listItem"><a href="" class="anchorItem">Pondicherry</a></li>
														<li class="listItem"><a href="" class="anchorItem">Punjab</a></li>
														<li class="listItem"><a href="" class="anchorItem">Rajasthan</a></li>
														<li class="listItem"><a href="" class="anchorItem">Sikkim</a></li>
													</ul>
													<ul class="unorderedItem">
														<li class="listItem"><a href="" class="anchorItem">Tamil Nadu</a></li>
														<li class="listItem"><a href="" class="anchorItem">Tripura</a></li>
														<li class="listItem"><a href="" class="anchorItem">Uttaranchal</a></li>
														<li class="listItem"><a href="" class="anchorItem">Uttar Pradesh</a></li>
														<li class="listItem"><a href="" class="anchorItem">West Bengal</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="accountDetails">
							<div id="accountDetailsInner">
								<div class="_xid">
									<div>
										<div class="_xid-">
											<div class="clearfix">
											<div class="lfloat">
											
												<?php
													$result=$GLOBALS['MySQL']->res("select * from user where user_id='$user_id' and username='$username'");
													if($result){
														while($row=mysql_fetch_array($result)){
															$firstname=$row['firstname'];
															$lastname=$row['lastname'];
														}
													}
													$result=$GLOBALS['MySQL']->res("select * from user_photos where user_id='$user_id' and status='1'");
													if($result){
														while($row=mysql_fetch_array($result)){
															$profilepic=$row['imagepath'];
															$path="../social/photo/user/".$username."/Original/Profile_Picture/".$profilepic;
															list($width,$height,$type)=getimagesize($path);
															$aspectRatio=$width/$height;
															if($aspectRatio>1){
																$height=80;
																$left=-($aspectRatio*$height-80)/2;
															}else{
																$width=80;
																$top=0;
															}
														}
													}
													
												?>
												<a href=<?php echo "www.smartnetwork.com/social/profile.php?username=".$username; ?> class="anchorImg indisp" >
													<span class="_scnt-i">
														<i class="_i-21-" style="<?php if(isset($profilepic)){	echo "background:url(../social/photo/user/".$username."/Original/Profile_Picture/".$profilepic.");";
															if($aspectRatio>1)
																echo 'background-size:auto '.$height.'px; background-position:'.$left.' 0';
															else
																echo 'background-size:'.$width.'px auto; background-position:0 '.$top;
													}?>"></i>
													</span>
												</a>
												<a href=<?php echo "www.smartnetwork.com/social/profile.php?username=".$username; ?> class="indisp anchorItem mlm btm" >
													<span class="_scnt-s">
														<?php
															echo $firstname.' '.$lastname;
														?>
													</span>
												</a>
											</div>
											<div class="rfloat">
										
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="global_container">
            	<div class="clearfix">
<?php						createLeftSide(); ?>
                    <div class="rfloat _872p">
                    	<div class="_872q">
                        	<div class="clearfix">
                            	<div class="">
                                	<?php
										if(!isset($_GET['item'])){
									?>
									<div class="_it_1e3" >
                                    	<div id="trade_body">
                                        	<div class="clearfix">
                                            	<div class="_it_1f3 mtm">
                                                	<div class="padding_s _st102">
                                                    	<div class="clearfix">
                                                    		<div class="lfloat _fnwx">
                                                        		<div class="clearfix">
                                                            		<div class="mrb _st102- lfloat">
                                                            			View Mode
                                                                	</div>
                                                                	<div class="cbp-vm-options rfloat">
                                                                		<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="grid-view" title="Grid View"></a>
                                                                    	<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="list-view" title="List View"></a>
                                                                	</div>
                                                            	</div>
                                                        	</div>
                                                        	<div class="rfloat">
                                                        		<div class="padding_h_m _fnwx">
                                                                	<a href="#" class="blocklink undeclink" data-ajax="true" data-javascript-response="true">Add new tab</a>
                                                                </div>
                                                        	</div>
                                                       	</div>
                                                    </div>
                                                </div>
                                                <div id="item_container" data-referrer="item_container">
                                                	<div id="item_container_inner">
                                                		<div class="">
                                                			<div class="_it_1h3">
                                                            	<div class="clearfix m-h-a">
                                                				<?php 
																	$result=$GLOBALS['MySQL']->res("select * from item_stat");
																	while($row=mysql_fetch_array($result)){
																		createItemDisplay($row);	
																	}		
																?>
                                                                </div>
                                                			</div>
                                                		</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
										}else{
											$item_code=$_GET['item'];	
											$disp=$_GET['disp'];
											$arr=$GLOBALS['MySQL']->getRow("select * from item_stat where item_code='$item_code'");
											createSingleItem($arr,$disp);
										}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <div class="_999 bgb _cap-entire _mk3 hidden_elem" id="popup">
    	<div class="_998">
        	<div class="popupbox popup_trans">
				<div class="loading _poptype-a">
					<div class="_09-ut">
						<span class="_55ym _55yq _55yo"></span>
					</div>
				</div>
            </div>
        </div>
	</div>
   
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.easing.js"></script>
    <script type="text/javascript" src="../social/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="../js/base.js"></script>
    <script type="text/javascript" src="../js/jsin.js"></script>
    <script type="text/javascript" src="js/jsUtil1.js"></script>
    <script type="text/javascript" src="js/jsUtil2.js"></script>
    <script type="text/javascript" src="js/jsUtil3.js"></script>
</body>
</html>
<?php
	}
	?>
