<?php
		function createLeftSide(){
?>
			<div class="lfloat _871p">
                    	<div class="_871q">
                        	<div class="clearfix">
                            	<div class="_fe-42_a">
         							<div class="_fz-42_a">
										<div class="clearfix wbg bdr_r_s">
                                        	<div class="category_name _fnbs _er12-0">
                                    			My Items
                                            </div>
                            			<ul class="tradeItems myItems" id="myItems">
                                			<li class="tradeItem">
                                    			<a href="" class="tradeLink _fnws"><span>Total Items</span></a>
                                        		<span class=""></span>
                                    		</li>
                                    		<li class="tradeItem">
                                    			<a href="" class="tradeLink _fnws"><span>Approved Items</span></a>
                                        		<span class=""></span>
                                    		</li>
                                    		<li class="tradeItem">
                                    			<a href="" class="tradeLink _fnws"><span>Pending Items</span></a>
                                        		<span class=""></span>
                                    		</li>
											<li class="tradeItem">
                                    			<a href="" class="tradeLink _fnws"><span>Rejected Items</span></a>
                                        		<span class=""></span>
                                    		</li>
                                		</ul>
										</div>
                            		</div>
									<div class="_fz-42_a">
										<div class="clearfix wbg bdr_r_s">
                                        	<div class="category_name _fnbs _er12-0">
                                    			
                                            </div>
                            			<ul class="tradeItems" id="">
                                			<li class="tradeItem">
                                    			<a href="../trade/index.php?action=add" class="tradeLink _fnws" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/itemschng.php?u=addItem"><span>Add New Item</span></a>
                                        		<span class=""></span>
                                    		</li>
                                    		<li class="tradeItem">
                                    			<a href="../trade/index.php?action=delete" class="tradeLink _fnws" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/itemschng.php?u=delItem"><span>Delete Item</span></a>
                                        		<span class=""></span>
                                    		</li>
                                    		<li class="tradeItem">
                                    			<a href="../trade/index.php?action=modify" class="tradeLink _fnws" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/itemschng.php?u=modifyItem"><span>Modify Item</span></a>
                                        		<span class=""></span>
                                    		</li>
                                		</ul>
										</div>
                            		</div>
									<div class="_fz-42_a">
										<div class="clearfix wbg bdr_r_s">
                                    		<div class="category_name _fnbs _er12-0">
                                            	User Detail
                                            </div>
                            			<ul class="tradeItems " id="">
                                        	<li class="tradeItem">
                                    			<a href="../trade/index.php?tab=home" class="tradeLink _fnws"><span>Home</span></a>
                                        		<span class=""></span>
                                    		</li>
                                			<li class="tradeItem">
                                    			<a href="../trade/index.php?tab=tradeprofile" class="tradeLink _fnws" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/mytradeprofile.php"><span>Trade Profile</span></a>
                                        		<span class=""></span>
                                    		</li>
                                            <li class="tradeItem">
                                    			<a href="../trade/index.php?tab=mycart" class="tradeLink _fnws"><span>My Cart</span></a>
                                        		<span class=""></span>
                                    		</li>
                                    		<li class="tradeItem">
                                    			<a href="../trade/index.php?tab=message" class="tradeLink _fnws" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/message.php"><span>Messages</span></a>
                                        		<span class=""></span>
                                    		</li>
                                            <!--
                                    		<li class="tradeItem">
                                    			<a href="" class="tradeLink _fnws"><span>Trade Mates</span></a>
                                        		<span class=""></span>
                                    		</li>
                                            -->
                                		</ul>
										</div>
                            		</div>
                                </div>
                            </div> 
                        </div>
                    </div>
<?php
		}
		function createSearchBar(){
?>
			<div id="searchBar" data-referrer="searchBar">
				<div id="searchBarInner" class="_hid">
					<div class="clearfix">
						<div class="_15mae">
						<div class="_15maf">
							<div class="clearfix">
								<div class="lfloat _321">
									<div class="_15mal _hie- mrm">
										<div class="uiTypeahead _ty142">
											<div class="wrap">
												<div class="innerWrap">
													<div class="_ty143 textInput _hid-a _hid-b _54bg _45gbx">
														<div class="DOMControl_placeholder">
															Search Items by its name / type / date added
														</div>
														<div class="_hid-a-0">
															<input class="_hid-a-0a" type="text" id="" name="">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="rfloat">
									<a class="_15map anchorItem toggleTrigger">
										<span class="fcw">Select place</span>
									</a>
								</div>
                              
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
<?php
		}
		function createItemDisplay($row){
			$item_no=$row['item_no'];
			$item_code=$row['item_code'];
			$owner_id=$row['owner_id'];
			$title=$row['title'];
			$category=$row['category'];
			$location=$row['location'];
			$description=$row['description'];
			$expected_price=$row['expected_price'];
			$status=$row['status'];
			$imagepath=$row['imagepath'];
			$rating=$row['rating'];
			$images=explode('-',$imagepath);
			
?>
			<div class="_it_i- _12t mrm" title="">
            	<a href="../trade/index.php?item=<?php echo $item_code; ?>&disp=0" class=""  data-item=<?php echo $item_no; ?> >
            	<div class="_it_j- _p31-">
                	<div class="imgwrapper">
                    	<?php
						$count=count($images);
						for($i=0;$i<$count-1;$i++){
							$path='image/user/'.$owner_id.'/'.$images[$i];
							list($width, $height, $type, $attr) = getimagesize($path);
							$aspect_ratio=$width/$height;
							if($aspect_ratio>=0.863){
								$height=176;
								$width=$aspect_ratio*$height;
								$left=-($width-152)/2;	
							}else{
								$width=152;
								$height=$width/$aspect_ratio;
								$top=-($height-176)/2;
							}
						?>
                    	<img src=<?php echo $path; ?> class="img <?php if($i==0) echo ' selected'; else echo ' hidden_elem'; ?>" 
						<?php 	if($aspect_ratio>=0.863){ 
									echo 'style="height:'.$height.'px; left:'.$left.'px"';
								}else{
									echo 'style="width:'.$width.'px; top:'.$top.'px"';
								}
						?> 
                        >
                        <?php } ?>
                    </div>
                    <div class="_12a _12c _12d">
                    	<div class="_12e">
                        	<div class="_12i">
                            	<span class="_12o"><?php echo $title; ?></span>
                            </div>
                        </div>
                        <div class="_12b">
                        	<button class="_12o _12h"><span>Like</span></button>
                        </div>
                    	<div class="_12k">
                        	<div class="_12m">
                            	<span class="_12o"><?php if($status==1) echo 'Available'; else if($status==2) echo 'Traded'; else echo 'Rejected'; ?></span>
                            </div>
                        </div>
                        <img src="../icons/gradient.png" class="_327" />
                    </div>
                </div>
                </a>
            </div>
<?php	
		}
		
?>