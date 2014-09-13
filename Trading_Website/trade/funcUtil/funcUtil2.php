<?php
	function createSingleItem($arr,$disp){
			$item_no=$arr['item_no'];
			$item_code=$arr['item_code'];
			$owner_id=$arr['owner_id'];
			$title=$arr['title'];
			$category=$arr['category'];
			$location=$arr['location'];
			$description=$arr['description'];
			$status=$arr['status'];
			$expected_price=$arr['expected_price'];
			$imagepath=$arr['imagepath'];
			$rating=$arr['rating'];
			$images=explode('-',$imagepath);
			$date_added=$arr['date_added'];
			$category_array=array("Electronic Gadget","Clothing","Furniture","Jwellery","Utensiles","Others");
			
			$arr1=$GLOBALS['MySQL']->getRow("select * from user where user_id='$owner_id'");
			$owner_username=$arr1['username'];
			$owner_firstname=$arr1['firstname'];
			$owner_lastname=$arr1['lastname'];
			$owner_email=$arr1['email'];
			$owner_account_link='www.smartnetwork.com/index.php?user='.$owner_username;
			$owner_gender=($arr1['gender']==1)?'Male':'Female';
			$result=$GLOBALS['MySQL']->res("select * from item_auction where item_no='$item_no' order by date desc");
			$result1=$GLOBALS['MySQL']->res("select max(auction_price) as auction_price from item_auction where item_no='$item_no'");
			if(mysql_num_rows($result1)!=0){
				$row2=mysql_fetch_array($result1);
				$highest_auction_price=$row2['auction_price'];
			}else{
				$highest_auction_price=0;
			}
			$rowcount=mysql_num_rows($result);
?>
			
			<div class="_item_s-">
            	<div id="item_wrapper">
                	<div id="item_innerWrapper">
                    	<div class="clearfix _586">
                        	<div class="lfloat">
                        	<div class="indisp">
                            	<div class="padding_v_m">
                                    <div class="_592">
                                    	<span>Item code : </span>
                                    </div>
                               	</div>
                            </div>
                            <div class="indisp">
                            	<div class="_587">
                                	<div class="fwb">
                                    	<span><?php echo $item_code; ?></span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="rfloat">
                            	<div class="padding_v_m" id="_item_s_8">
                                    		<div class="_592 <?php if($status==1)	echo '_p0i'; else echo '_p0j'; ?>">
                                    			<span>
												<?php
                                        		if($status==1)
													echo 'Available';
												else if($status==2)
													echo 'Traded';
												else
													echo 'Item Removed';
												?>
                                        		</span>
                                        	</div>
                            	</div>
                            </div>
                        </div>
                    	<div class="clearfix ptm _56p">
                        	<div class="lfloat _237_" id="_item_s-1">
                            	<div class="_it_j- _p92- _spc_">
                                	<div class="_spc_a _ctm">Zoom in</div>
                                    <div class="_104s _p92-">
                                    	<?php
										$count=count($images);
										for($i=0;$i<$count-1;$i++){
											$path='image/user/'.$owner_id.'/'.$images[$i];
											list($width, $height, $type, $attr) = getimagesize($path);
											$aspect_ratio=$width/$height;
											if($aspect_ratio>=1){
												$height=380;
												$width=$aspect_ratio*$height;
												$left=-($width-380)/2;	
											}else{
												$width=380;
												$height=$width/$aspect_ratio;
												$top=-($height-380)/2;
											}
											$path='image/user/'.$owner_id.'/'.$images[$i];
										?>
                                        <div class="imgwrapper  <?php if($i!=$disp) echo ' hidden_elem'; else echo ' selected'; ?>">
                                		<img src=<?php echo $path; ?> class="img zoomin _spc_e coverfullscreen" 
                                        	<?php
												if($aspect_ratio>=1){
													echo 'style="height:'.$height.'px; left:'.$left.'px"';
												}else{
													echo 'style="width:'.$width.'px; top:'.$top.'px"';
												}	
											?>
                                        />
                                        <div class="mask"></div>
                                        <div class="mask mask2"></div>
                                        </div>
                                        <?php  } ?>
                                </div>	
                                </div>
                            </div>
                            <div class="rfloat w62">
                            <div class="lfloat w50">
                            	<div class="" id="_item_s-2">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Title</span>
                                        	</div>
                                    	</div>
     									<div class="_56p w95">
                                    		<div class="_56q">
                                    			<span><?php echo $title; ?></span>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                            
                            	<div class="" id="_item_s_4">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Category</span>
                                        	</div>
                                    	</div>
     									<div class="_56p w95">
                                    		<div class="_56q">
                                    			<span><?php echo $category_array[$category]; ?></span>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                            	<?php  
									if($expected_price!=0){
								?>
                            	<div class="" id="_item_s_5">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Price Listed by Owner</span>
                                        	</div>
                                    	</div>
     									<div class="_56p w95">
                                    		<div class="_56q">
                                    			<span><?php echo $expected_price.' Rs.'; ?></span>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                            	<?php } ?>
                            	<div class="" id="_item_s_6">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Item location</span>
                                        	</div>
                                    	</div>
                                    	<div class="_56p w95">
                                    		<div class="_56q">
                                        		<span><?php echo $location;  ?></span>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                                <div class="" id="_item_s_11">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Rating</span>
                                        	</div>
                                    	</div>
                                    	<div class="_56p w95">
                                    		<div class="_531">
                                        		<span></span>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                            </div>
                            <div class="rfloat w50">
                            	<div class="" id="_item_s_3">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Image Available</span>
                                        	</div>
                                    	</div>
     									<div class="_56p w95 _56m">
                                        	<div class="_56q">
                                    		<div class="clearfix _76in-">
                                            	<div class="uiScrollableArea fade horizontal">
                                        			<div class="uiScrollableAreaWrap scrollable-x">
                                           				<div class="uiScrollableAreaBody"> 
                                           

                                            	<?php
												$count=count($images);
												for($i=0;$i<$count-1;$i++){
													$path='image/user/'.$owner_id.'/'.$images[$i];
													list($width1, $height1, $type1, $attr1) = getimagesize($path);
													$aspect_ratio=$width1/$height1;
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
                                        		<a href="#" data-javascript-response="true" class="mrs imgrefer" data-refer="_item_s-1" data-imgno="<?php echo $i; ?>">
                                        			<div class="_239_">
                                            			<div class="_it_j- _p10-">
                                                			<div class="imgwrapper">
                                                    		<img src=<?php echo $path; ?> class="img"
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
                                           		</a>
                                                <?php } ?>
                                                		</div>
                                                 	</div>
                                                    <div class="uiScrollableAreaTrack invisible_elem">
                                                    	<div class="uiScrollableAreaGripper" id="uiScrollableAreaGripper"></div>
                                                    </div>
                                        		</div>
                                        	</div>
                                            </div>
                                    	</div>
                                	</div>
                            	</div>
                            	<div class="" id="_item_s_7">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Offer Started</span>
                                        	</div>
                                    	</div>
                                    	<div class="_56p w95">
                                    		<div class="_56q">
                                        		<span class="fsl mrb"><?php echo date('H:i:s',$date_added); ?></span>
                                        		<span class="fsl"><?php echo date('d/m/Y',$date_added); ?></span>
                                        	
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                                <div class="" id="_item_s_9">
                            		<div class="clearfix">
                                		<div class="_586 w95">
                                    		<div class="_592">
                                    			<span>Owner Details</span>
                                        	</div>
                                    	</div>
                                    	<div class="_56p w95">
                                    		<div class="_56q _64p">
                                        		<div class="clearfix mbs">
                                                	<div class="lfloat fwb">
                                                		<?php echo $owner_firstname.' '.$owner_lastname; ?>
                                                    </div>
                                                    <div class="rfloat fcg">
                                                    	<?php echo $owner_gender; ?>
                                                    </div>
                                                </div>
                                                <div class="clearfix mbs">
                                                	<?php echo $owner_email; ?>
                                                </div>
                                                <div class="clearfix mbs">
                                                	<a href=<?php echo $owner_account_link; ?> class="">
														<?php echo $owner_account_link; ?>
                                                    </a>
                                                </div>
                                        	
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                            </div>
                            
                        </div>
                        </div>
                        <div class="clearfix mtb mbb">
                        <div class="" id="_item_s_10">
                            <div class="clearfix">
                                <div class="_586">
                                    <div class="_592 _594">
                                    	<span>Item Description</span>
                                    </div>
                                </div>
     							<div class="_56p _60p">
                                    <div class="_56q">
                                    	<span><?php echo $description; ?></span>
                                    </div>
                                </div>
                            </div>
                       	</div>
                      	</div>
                        <div class="mtb mbb item_auction <?php if($rowcount==0) echo 'hidden_elem' ?>">
                        	<div class="" id="_item_s_11">
                            	<div class="">
                                	<div class="_586">
                                    	<div class="_592 _594">
                                    		<span>Auction</span>
                                            <?php if($_SESSION['user_id']==$owner_id){ ?>
                                            <span class="mlm">
                                            	<a href="">
                                                	<i></i>
                                                </a>
                                            </span>
                                            <?php } ?>
                                    	</div>
                                	</div>
     								<div class="_56p _60p">
                                    	<div class="_56q ntxtin">
                                    		<div class="clearfix wbg bdr_g padding_h_m" id="auction_user_container">

                                    		<?php
											while($row=mysql_fetch_array($result)){
												$auction_member_id=$row['auction_member_id'];
												$auction_price=$row['auction_price'];
												$auction_date=$row['date'];
												$row1=$GLOBALS['MySQL']->getRow("select * from user where user_id='$auction_member_id'");
												$auction_member_firstname=$row1['firstname'];	
												$auction_member_lastname=$row1['lastname'];
												$auction_member_username=$row1['username'];
												$row2=$GLOBALS['MySQL']->getRow("select * from user_photos where user_id='$auction_member_id' AND status='1'");
												$profile_image=$row2['imagepath'];
												$auc_mem_propic_path='../social/photo/user/'.$auction_member_username.'/Original/Profile_Picture/'.$profile_image;
												list($auc_mem_propic_width, $auc_mem_propic_height, $auc_mem_propic_type, $auc_mem_propic_attr) = getimagesize($auc_mem_propic_path);
												$auc_mem_propic_aspect_ratio=$auc_mem_propic_width/$auc_mem_propic_height;
												if($auc_mem_propic_aspect_ratio>=0.94){
													$auc_mem_propic_height=80;
													$auc_mem_propic_width=$auc_mem_propic_aspect_ratio*$auc_mem_propic_height;
													$auc_mem_propic_left=-($auc_mem_propic_width-75)/2;	
												}else{
													$auc_mem_propic_width=75;
													$auc_mem_propic_height=$auc_mem_propic_width/$auc_mem_propic_aspect_ratio;
													$auc_mem_propic_top=-($auc_mem_propic_height-80)/2;
												}
												
										?>
                                        		<div class="lfloat mrm padding_h_s auction_user">
                                                	<div class="clearfix mbs mts text_align_ctr">
                                                    	<span class="fwb"><?php echo $auction_member_firstname.' '.$auction_member_lastname; ?>
                                                        </span>
                                                    </div>
                                                	<div class="clearfix">
                                        				<a href="#" class="" data-javascript-response="true">
                                        					<div class="_239_  m-h-a">
                                            					<div class="_it_j- _p10-">
                                                					<div class="imgwrapper">
                                                    					<img src=<?php echo $auc_mem_propic_path; ?> class="img"
                                                            			<?php
																		if($auc_mem_propic_aspect_ratio>=0.94){
																			echo 'style="height:'.$auc_mem_propic_height.'px; left:'.$auc_mem_propic_left.'px"';
																		}else{
																			echo 'style="width:'.$auc_mem_propic_width.'px; top:'.$auc_mem_propic_top.'px"';
																		}	
																		?>
                                                            		 	/>
                                                    				</div>
                                                				</div>
                                            				</div>
                                           				</a>
                                        			</div>
                                                    <div class="clearfix text_align_ctr <?php echo ($auction_price>=$expected_price)?'_p0i':'_p0j'; ?>">
                                                		<span class="fwb"><?php echo $auction_price.' Rs.'; ?></span>
                                                        <span class="fsm"><?php echo '('.round($auction_price*100/$expected_price).'%)';  ?></span>
                                                	</div>
                                                    <div class="clearfix mbs text_align_ctr">
                                                		<span class="fcg fsm"><?php echo date('H:i:s d/m/Y',$auction_date);  ?></span>
                                                	</div>
                                   
                                                </div>
                                                <?php
												}
												?>
                                            </div>
                                       	</div>           
                                       	
                                    </div>
                                </div>
                            </div>
                       	</div>
                      	<div class="field mbm">
                        	<div class="">
                                <div class="_586">
                                    <div class="_592 _594">
                                    	<span>Queries</span>
                                    </div>
                                </div>
     							<div class="_56p _60p">
                                   	<div class="_56q ntxtin">
                                    	<div class="clearfix">
                                        	<div class="lfloat w50">
                                            	<div class="_45m">
                                    				<div class="padding_m  fade">
                                        				<?php
															$result2=$GLOBALS['MySQL']->res("select * from item_query where item_no='$item_no'");
															if($result2){
																while($row3=mysql_fetch_array($result2)){
																	$query_user=$row3['user_id'];
																	$query_description=$row3['query'];
																	$query_date=$row3['date'];	
																	$row4=$GLOBALS['MySQL']->getRow("select * from user where user_id='$query_user'");
																	$query_user_username=$row4['username'];
																	$query_user_firstname=$row4['firstname'];
																	$query_user_lastname=$row4['lastname'];
																	
														?>
                                                        			<div class="padding_v_s">
                                                                    	<div class="">
                                                                        	<div class="">
                                                                            	<a href="<?php echo '../social/profile.php?user='.$query_user_username; ?>"><span class="fwb fsl"><?php echo $query_user_firstname.' '.$query_user_lastname; ?></span></a>
                                                                            </div>
                                                                        	<div class="_60p">
                                                                            	<span class="fsl"><?php echo $query_description; ?></span>
                                                                            </div>
                                                                            <div class="mts _60p">
                                                                            	<?php 
																					if($_SESSION['user_id']!=$owner_id && $_SESSION['user_id']!=$query_user)
																						echo 	'<span class="mrm">
																									<a href="#">Vote</a>
																								</span>&middot';
																					else if( $_SESSION['user_id']!=$query_user)
																						echo 	'<span class="mrm">
																									<a href="#">Reply</a>
																								</span>&middot';
																				?>
                                                                            
                                                                            	<span class="fsm fcg mlm"><?php echo date('H:i:s ',$query_date);?>
                                                                                </span>
                                                                                <span class="mls fsm fcg"><?php echo date('d/m/Y',$query_date); ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php
																}
															}
														?>
                                        			</div>
                                                    <?php
														if($_SESSION['user_id']!=$owner_id){
													?>
                                                    <span class="margin"></span>
                                        			<div class="">
                                        				<form class="_fm27" name="item_query" action="#" method="post" id="item_query">
                                            				<div id="">
                                                				<div class="field">
                                                    				<div class="uiTypeahead">
                                                        				<div class="wrap">
                                                    						<textarea class="uiAutoGrow inputTextarea textInput" placeholder="Post your query about this item"></textarea>	
                                        	                    		</div>
                                            	            		</div>
                                            	        		</div>
                                                	    		<div class="clearfix _24cd _234qmc">
                                                    				<button class="rfloat nbtn nbtnbg5 mdbtn " type="submit">Post</button>
                                                    			</div>
                                                			</div>
                                            			</form>
                                        			</div>
                                                    <?php } ?>
                                                    
                                            	</div>
                                        	</div>
                                    	</div>
                                	</div>
                               	</div>     
                            </div>
                        </div>
                        <div class="field mbm">
                        	<div class="_586"></div>
                            <div class="_56p"></div>
                            	<div class="clearfix">
                                	<div class="_99p text_align_rtl">
                                    <div class="indisp">
                            <?php if($owner_id!=$_SESSION['user_id'] && $status==1){ ?>
                            <span class="uiButtonGroup uiButtonGroupOverlay">
                                <span class="uiButtonGroupItem uiButtonItem firstItem lastItem">
                                     <span class="_23s fcw">
                        	<a class="nbtn nbtnbg4 uiButton uiButtonMedium uiButtonOverlay" id="_item_s_12" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=add-to-cart" data-haspopup="true" data-coverfullscreen="true" data-item-view="true" data-autoclose="true" data-autoclose-time="4000" role="button">Add to cart</a>
                            		 </span>
                            	</span>
                           	</span>
                            <span class="uiButtonGroup uiButtonGroupOverlay">
                                <span class="uiButtonGroupItem uiButtonItem firstItem lastItem">
                                     <span class="_23s">
                            				<a class="nbtn nbtnbg5 uiButton uiButtonMedium uiButtonOverlay" id="_item_s_13" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=msg" data-haspopup="true" data-coverfullscreen="true" data-item-view="true"  data-autoclose="false" role="button">Message Owner</a>
                                    </span>
                            	</span>
                           	</span>
                            <span class="uiButtonGroup uiButtonGroupOverlay lastButtonGroup">
                                <span class="uiButtonGroupItem uiButtonItem firstItem lastItem">
                                     <span class="_23s fcw">    
                            			<a class="nbtn nbtnbg1 uiButton uiButtonMedium uiButtonOverlay" id="_item_s_14" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=bid" data-haspopup="true" data-coverfullscreen="true" data-item-view="true" data-autoclose="false" role="button">Bid</a>
                            		</span>
                            	</span>
                           	</span>	
                                       
                            <?php }else if($owner_id==$_SESSION['user_id'] && $status==1){ ?>
                        				<span class="uiButtonGroup uiButtonGroupOverlay">
                                        	<span class="uiButtonItem uiButtonGroupItem firstItem"></span>
                                        	<span class="uiButtonGroupItem uiButtonItem">
                                            	<span class="_23s">
                            							<a href="#" class="nbtn nbtnbg5 uiButton uiButtonMedium uiButtonOverlay" id="_item_s_15" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=modify" data-haspopup="true" data-coverfullscreen="true" data-item-view="true" data-autoclose="false" role="button">
                                							<span class="uiButtonText">Modify item</span>
                            							</a>
                                                </span>
                                            </span>
                                            <span class="uiButtonGroupItem uiSelectorItem lastItem">
                                            	<div class="uiSelector indisp uiSelectorRight">
                                                	<div class="wrap uiToggle shadowToggler">
                                                    	<a class="nbtn nbtnbg5 uiButton uiSelectorButton uiButtonMedium uiButtonOverlay uiButtonNoText" rel="toggle" role="button" href="#">
                                                        	<i class="img _qwac34-">
                                                            
                                                            </i>
                                                        	
                                                        </a>
                                                        <div class="uiSelectorMenuWrapper uiToggleFlyout uiFlyoutTop">
                                                        	<div role="menu" class="uiMenu uiSelectorMenu">
                                                            	<ul class="uiMenuInner menuOpen" data-level="0">
                                                                	<li class="uiMenuItem">
                                                                    	<a class="itemAnchor" href="" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=modify" data-haspopup="true" data-coverfullscreen="true" data-item-view="true" data-autoclose="false">Modify Everything</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a class="itemAnchor trigger" href="" data-trigger-level="1">Modify particular property</a>
                                                                        
                                                                    </li>
                                                                </ul>
                                                              <ul class="uiMenuInner " data-level="1">
                                                                	<li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify title</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify category</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify location</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify price</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify photos</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor">Modify description</a>
                                                                    </li>
                                                                    <li class="uiMenuItem">
                                                                    	<a href="" class="itemAnchor trigger" data-trigger-level="0">Back</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </span>
                                        <span class="uiButtonGroup uiButtonGroupOverlay lastButtonGroup">
            								<span class="uiButtonGroupItem uiButtonItem firstItem lastItem">
                                            	<span class="_23s fcw">
                                            		<a href="#" class="nbtn nbtnbg4 uiButton uiButtonMedium uiButtonOverlay" id="_item_s_15" data-ajax="true" data-javascript-response="true" data-ajaxify="ajax/itemacs.php?action=delete" data-haspopup="true" data-coverfullscreen="true" data-item-view="true" data-autoclose="false" role="button">
                                						<span class="uiButtonText">Delete item</span>
                            						</a>
                                            	</span>
                                           	</span> 
                                        </span>
                        	<?php } ?>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden_elem _farl">
            	<div class="clearfix">
                	<div>
                    	<div class="hidden_elem">
                    		<div id="handle_items">
                            	<input type="hidden" name="item_no" value="<?php echo $item_no; ?>" />
								<input type="hidden" name="itemcode" value="<?php echo $item_code; ?>" />
                                <input type="hidden" name="title" value="<?php echo $title; ?>" />
                                <input type="hidden" name="category" value="<?php echo $category; ?>" />
                                <input type="hidden" name="item_description" value="<?php echo $description; ?>" />
                                <input type="hidden" name="item_imagepath" value="<?php echo $imagepath; ?>"  />
                                <input type="hidden" name="owner_username" value="<?php echo $owner_username; ?>" />
                                <input type="hidden" name="owner_name" value="<?php echo $owner_firstname.' '.$owner_lastname; ?>" />
                                <input type="hidden" name="item-price-listed" value="<?php echo $expected_price; ?>" />
                                <input type="hidden" name="highest-auction-price" value="<?php echo $highest_auction_price; ?>" />		
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            
<?php	
		}
?>