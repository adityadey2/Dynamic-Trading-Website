<?php 
	session_start();
	$user_id=$_SESSION['user_id'];
	require_once("../../class/mysql.php");
	$result=$GLOBALS['MySQL']->res("select * from item_stat where owner_id='$user_id'");
	
 ?>

										<div id="trade_profile">
                                        	<div class="clearfix padding_b">
                                            	<div class="mbb field">
													<div class="padding_v_m grey_bg">
														<div class="text_align_ctr fwb">
															Trade Profile
														</div>
													</div>
												</div>
                                                <div class="clearfix">
                                        		<div class="lfloat w50">
                                                	<div class="mbm padding_v_s _999a text_align_ctr">
                                                    	<div class="clearfix _998a">
                                                    		Sold / Added
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    	<ul id="tr_el_1" class="">
                                                        	<div class="clearfix">
                                                        	<?php
																while($row=mysql_fetch_array($result)){
																	$item_no=$row['item_no'];
																	$title=$row['title'];
																	$category=$row['category'];
																	$description=$row['description'];
																	$expected_price=$row['expected_price'];
																	$status=$row['status'];
																	$imagepath=$row['imagepath'];
																	$images=explode('-',$imagepath);
																	$date_added=$row['date_added'];
																	$path='../image/user/'.$user_id.'/'.$images[0];
																	$pathVirtual='image/user/'.$user_id.'/'.$images[0];
																	$category_array=array("Electronic Gadget","Clothing","Furniture","Jwellery","Utensiles","Others");
																	list($width, $height, $type, $attr) = getimagesize($path);
																	$aspect_ratio=$width/$height;
																	if($aspect_ratio>=0.94){
																		$height1=80;
																		$width1=$aspect_ratio*$height1;
																		$left1=-($width1-75)/2;	
																	}else{
																		$width1=75;
																		$height1=$width1/$aspect_ratio;
																		$top1=-($height1-80)/2;
																	}
															?>
                                                            		<li class="lfloat _trl_23 w100" data-item="<?php echo $item_no; ?>">
                                                                    	<a href="index.php?item=<?php echo $item_no; ?>&disp=0" class="">
                                                                        	<div class="lfloat mlm mrb">
                                                                        		<div class="_239_">
                                                                            		<div class="_it_j- _p10-">
                                                                                		<div class="imgwrapper">
                                                                                    		<img src=<?php echo $pathVirtual; ?> class="img"
                                                            								<?php
																								if($aspect_ratio>=0.94){
																									echo 'style="height:'.$height1.'px; left:'.$left1.'px"';
																								}else{
																									echo 'style="width:'.$width1.'px; top:'.$top1.'px"';
																								}	
																							?>
                                                             								/>
                                                                                    	</div>
                                                                                	</div>
                                                                            	</div>
                                                                            </div>
                                                                            <div class="lfloat mlm _104s _211t">
                                                                            	<div class="_104x clearfix mbs"><span class="fsb"><?php echo $title; ?></span></div>
                                                                                <div class="_104x  clearfix mbs"><span class="fsm fcg"><?php echo $category_array[$category]; ?></span></div>
                                                                                <div class="_104x  clearfix mbs"><span class="fsm"><?php echo $expected_price.' Rs.'; ?></span></div>
                                                                            </div>
                                                                            <div class="lfloat  _104s padding_v_m">
                                                                            	<div class="_104x clearfix mbs">
                                                                                	<span class="fsm fwb <?php 
																						if($status==1) 
																							echo '_p0i'; 
																						else if($status==2) 
																							echo '_p0j';  
																					?>">
																						<?php 
																						if($status==1) 
																							echo 'Available'; 
																						else if($status==2) 
																							echo 'Traded'; 
																						else 
																							echo 'Rejected'; 
																						?>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="_104x clearfix mbs">
                                                                                	<span class="fsm fcg clearfix mbs">
                                                                                    	<?php echo date('H:i:s',$date_added); ?>
                                                                                    </span>
                                                                                    <span class="fsm fcg clearfix">
                                                                                    	<?php echo date('d/m/Y',$date_added); ?>
                                                                                    </span>
                                                                                </div>    
                                                                                
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                            <?php	
																}
															?>
                                                            </div>	
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="rfloat w50">
                                                	<div class="mbm padding_v_s _999b text_align_ctr">
                                                    	<div class="clearfix _998b">
                                                    		Purchased
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                    	<ul id="tr_el_2" class="">
                                                        	<div class="clearfix">
                                                        		<li class="lfloat _trl_23 w100"  data-item="<?php if(isset($item_no)) echo $item_no; ?>">	
                                                                	<div class="clearfix text_align_ctr">Nothing Purchased yet</div> 
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>