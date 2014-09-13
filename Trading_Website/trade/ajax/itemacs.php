<?php 
	require_once("../../class/mysql.php"); 
	session_start();
	$current_user=$_SESSION['user_id'];
	$item_no=$_POST['item_no'];
	$itemcode=$_POST['itemcode'];
	$title=$_POST['title'];
	$category=$_POST['category'];
	$item_description=$_POST['item_description'];
	$item_imagepath=$_POST['item_imagepath'];
	$owner_username=$_POST['owner_username'];
	$owner_name=$_POST['owner_name'];
	$item_price_listed=$_POST['item_price_listed'];
	$highest_auction_price=$_POST['highest_auction_price'];
	$action=$_GET['action'];
	if($action=='bid'){
?>




			<div id="bid_container" class="current-popup invisible_elem">
				<div id="bidwrapper" class="bid-wrapper">
					<div class="_12lal">
						<div class="clearfix">
							<div>
								<div id="popupwrapper" class="_pop98">
									<div class="header">
										<div class="_12lap _31kgw">
											<div class="clearfix">
												<div class="_7-ou lfloat">
													Auction
												</div>
												<div class="rfloat">
													<a class="_42ft _50z- cancelButton closePopup _5upp _50-0 " role="button" title="Close" data-javascript-response="true" href="#"></a>
												</div>
											</div>
										</div>
									</div>
									<div class="bidformContainer _56p">
										<div id="bidformWrapper">
											<div class="_12lao _31kgw">
												<noscript></noscript>
												<div class="_12xap _12xoa">
													<div id="bid_box">
														<form name="bidform" id="bidform" action="" onSubmit="" method="post">
															<div id="bidForm" class="bidFormDiv">
																<div class="field mbb">
                                                                    	<div class="grey_bg padding_v_m">
                                                                			<div class="text_align_ctr fwb">
                                                                    			<span class="mrb">Item code :</span>
                                                                    			<span class="mlb"><?php echo $itemcode; ?></span>
                                                                    		</div>
                                                                        </div>
																</div>
																<div class="field mtb mbm clearfix text_align_ctr ">
																	<label for="bid_price" class="mbm w100">Raise your bid ( in Rs. )</label>
																	<input type="text" class="inputtext _12xax _12xad" id="bid_el-1" placeholder="" name="bid_price"/>
																</div>
																<div class="clearfix text_align_ctr field">
																		<button type="submit" name="bid_submit" id="bid_submit" class="mbm mtm fsl _12xaz padding_s bidsub nbtn nbtnbg4" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/auction.php" data-ajax-target="auction_user_container">Bid</button>
                                                                        <button class="mbm mtm mlb fsl cancelButton closePopup _12xaz padding_s nbtn nbtnbg5" data-javascript-response="true">Close</button>
																</div>
															</div>
														</form>
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
			</div>
            
<?php 	}else if($action=='msg'){
	
?>
			<div id="message_container" class="current-popup invisible_elem">
				<div id="message_wrapper" class="login-wrapper">
					<div class="_12lal">
						<div class="clearfix">
							<div>
								<div id="popupwrapper" class="_pop98">
									<div class="header">
										<div class="_12lap _31kgw">
											<div class="clearfix">
												<div class="_7-ou lfloat">
													Message
												</div>
												<div class="rfloat">
													<a class="_42ft _50z- cancelButton closePopup _5upp _50-0 " role="button" title="Close" href="#" data-javascript-response="true"></a>
												</div>
											</div>
										</div>
									</div>
									<div class="messageformContainer">
										<div id="messageformWrapper">
											<div class="_12lao _31kgw">
												<noscript></noscript>
												<div class="_12xap _12xoa">
													<div id="message_box">
														<form id="message_form" class="" name="message" method="post" action="" onsubmit="">
                                    						<div id="message_container">
                                        						<div class="clearfix padding_b">
                                        							<div class="field mbb">
                                            							<label for="msg_el-1" class="label">Recipient name:</label>
                                                						<input type="text" id="msg_el-1" class="inputtext" value="<?php echo $owner_name; ?>" disabled="disabled" />
                                            						</div>
                                                					<div class="field mbb">
                                            							<label for="msg_el-2" class="label">Subject :</label>
                                                						<input type="text" id="msg_el-2" class="inputtext" value="Item Enquiry" />
                                            						</div>
                                            						<div class="field mbm clearfix">
                                            							<label for="msg_el_3" class="label">Message :</label>
                                                						<div class="uiTypeahead">
                                                							<div class="wrap">
                                                    							<div class="innerWrap">
                                                									<textarea class="inputTextArea uiAutoGrow textInput" id="msg_el_3" title="Add message" placeholder></textarea>
                                                        						</div>
                                                    						</div>
                                                						</div>
                                            						</div>
                                            						<div class="field clearfix">
                                                                    	 <button class="mts mbs button padding_s nbtn nbtnbg5  rfloat cancelButton closePopup mlb" data-javascript-response="true">Close</button>  
                                            							<button type="submit" class="mts mbs button padding_s nbtn nbtnbg4 _fnwx rfloat submitButton" value="Send" id="submit_message">Send</button>
                                                                     
                                            						</div>
                                            					</div>
                                        					</div>
                                    					</form>
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
			</div>


<?php
		}else if($action=='add-to-cart'){
			$result=$GLOBALS['MySQL']->res("select * from my_cart where item_no='$item_no' and user_id='$current_user'");
			if(($count=mysql_num_rows($result))==0)
				$result=$GLOBALS['MySQL']->res("insert into my_cart(item_no,user_id) VALUES('$item_no','$current_user')");
?>
			<div id="add_to_cart_container" class="current-popup invisible_elem alertbox">
				<div id="add_to_cart_wrapper" class="add_to_cart-wrapper">
					<div class="_12lal">
						<div class="clearfix">
							<div>
								<div id="popupwrapper" class="_pop98">
									<div class="header">
										<div class="_12lap _31kgw">
											<div class="clearfix">
												<div class="_7-ou lfloat">
													Alert
												</div>
												<div class="rfloat">
													<a class="_42ft _50z- cancelButton closePopup autoclose _5upp _50-0 " role="button" title="Close" href="#" data-javascript-response="true"></a>
												</div>
											</div>
										</div>
									</div>
									<div class="_12lao _31kgw">
                                    	<div class="clearfix mbm mtm">
                                        	<span class="fwb fsl">
                                        	<?php  
												if($count>=1)
													echo 'This item is already added in your cart';
												else if($result)
													echo 'Successfully added into your cart';
												else
													echo 'Some error occured.Try again later.';
											?>
                                            </span>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
			
		}else if($action=='modify'){
?>		
			<div id="modify_item_container" class="current-popup invisible_elem">
				<div id="modify_item_rapper" class="modify_item-wrapper">
					<div class="_12lal">
						<div class="clearfix">
							<div>
								<div id="popupwrapper" class="_pop98">
									<div class="header">
										<div class="_12lap _31kgw">
											<div class="clearfix">
												<div class="_7-ou lfloat">
													Modify item
												</div>
												<div class="rfloat">
													<a class="_42ft _50z- cancelButton closePopup _5upp _50-0 " role="button" title="Close" href="#" data-javascript-response="true"></a>
												</div>
											</div>
										</div>
									</div>
									<div class="modify_itemformContainer">
										<div id="modify_itemformWrapper">
											<div class="_12lao _31kgw">
												<noscript></noscript>
												<div class="_12xap _12xoa">
													<div id="modify_item_box">
														<form id="modify_item_form" class="" name="modify_item" method="post" action="" onsubmit="">
                                    						<div id="modify_item_container">
                                        						<div class="padding_b">
                                                                	<div class="field mbb">
                                                                    	<div class="padding_v_m grey_bg">
                                                                        	<div class="text_align_ctr fwb">
                                                                        		<span class="mrb">Item code :</span>
                                                                            	<span class="mlb"><?php echo $itemcode; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                	<div class="clearfix">
                                        							<div class="field mbb lfloat">
                                            							<label for="modify_item_el-1" class="label">Item Name</label>
                                                						<input type="text" id="modify_item_el-1" class="inputtext" maxlength="30" title="Modify item name" value="<?php echo $title; ?>" />
                                            						</div>
                                            						<div class="field mbb rfloat">
                                            							<label for="modify_item_el-2" class="label">Item Category</label>
                                                						<select name="" class="select" id="modify_item_el-2">
                                                    						<option value="0" <?php echo ($category==0)?'selected="selected"':''; ?>>Electronic Gadgets</option>
                                                   							<option value="1" <?php echo ($category==1)?'selected="selected"':''; ?>>Clothings</option>
                                                 						   	<option value="2" <?php echo ($category==2)?'selected="selected"':''; ?>>Furnitures</option>
                                            						        <option value="3" <?php echo ($category==3)?'selected="selected"':''; ?>>Jwellery</option>
                                                    						<option value="4" <?php echo ($category==4)?'selected="selected"':''; ?>>Utensiles</option>
                                                    						<option value="5" <?php echo ($category==5)?'selected="selected"':''; ?>>Others</option>
                                                						</select>
                                            						</div>
                                                                    </div>
                                                                    <div class="clearfix">
                                            						<div class="field mbb lfloat">
                                            							<div class="label">
                                                							<span>Add Item Photo</span>
                                                						</div>
                                                						<div class="_pht_cn">
                                                							<div class="clearfix">
                                                								<div class="_76hop">
                                                        							<input type="file" class="inputFile" id="add_item_el-3" />
                                                            						<div class="_76hop-" title="Add Photo">Add Photo</div>
                                                        						</div>
                                                    						</div>
                                                						</div>
                                            						</div>
                                                                    </div>
                                                                    <div class="clearfix">
                                            						<div class="field mbm lfloat">
                                            							<div class="checkWrapper lfloat">
                                                							<span class="" data-type="check">
                                                    							<input type="checkbox" name="allow_price" id="modify_item_el-4" <?php if($item_price_listed!=0) echo 'checked="checked"'; ?> />
                 					                                   		</span>
                                                						</div>
                                                						<div class="lfloat mlb">
                                                							<label for="modify_item_el-4"><span class="checklabel">Mention your expected price (in Rs) .</span></label>
                                                						</div>
                                            						</div>
                                                                    </div>
                                                                    <div class="clearfix">
																	<div class="field mbb rfloat">
                                            							<label for="modify_item_el-5" class="label">Item Location</label>
                                                						<input type="text" id="modify_item_el-5" class="inputtext" title="Modify item location" />
                                            						</div>
                                            						<div class="field lfloat mbm <?php if($item_price_listed==0) echo 'hidden_elem'; ?>">
                                            							<label for="modify_item_el-6" class="label">Expected Price</label>
                                                						<input type="text" id="modify_item_el-6" class="inputtext" title="Modify expected price" value="<?php echo $item_price_listed; ?>" />
                                            						</div>
                                                                    </div>
                                            						<div class="field mbm clearfix">
                                            							<label for="modify_el_7" class="label">Modify Item Description</label>
                                                						<div class="uiTypeahead">
                                                							<div class="wrap">
                                                    							<div class="innerWrap">
                                                									<textarea class="inputTextArea uiAutoGrow textInput" id="modify_el_7" title="Modify item description" placeholder><?php echo $item_description; ?></textarea>
                                                        						</div>
                                                    						</div>
                                                						</div>
                                           		 					</div>
                                            						<div class="field clearfix">
																		<button class="mts mlb mbs padding_s nbtnbg5 cancel rfloat nbtn button cancelButton closePopup" value="Cancel" data-javascript-response="true">Cancel</button>      
                                            							<input type="submit" class="mts mbs button padding_s nbtn nbtnbg4  _fnwx rfloat submitButton" value="Modify Item" id="submit_modify_item" />
                                        		
                                            						</div>
                                            					</div>
                                        					</div>
                                    					</form>
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
			</div>			
<?php			
		}
?>