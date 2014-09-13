<?php
	$action=$_GET['u'];
	if($action=='addItem'){
?>
									
									<form id="add_item_form" class="" name="add_item" method="post" action="">
                                    	<div id="add_item_container">
                                        	<div class="padding_b" id="add_item_innercontainer">
											<div class="mbb field">
												<div class="padding_v_m grey_bg">
													<div class="text_align_ctr fwb">
														Add Item
													</div>
												</div>
											</div>
											<div class="clearfix">
                                        	<div class="field mbb lfloat">
                                            	<label for="add_item_el-1" class="label">Item Name</label>
                                                <input type="text" id="add_item_el-1" class="inputtext" maxlength="30" title="Item Name" />
                                            </div>
                                            <div class="field mbb rfloat">
                                            	<label for="add_item_el-2" class="label">Item Category</label>
                                                <select name="" class="select" id="add_item_el-2">
                                                	<option value="-1" selected="selected">Select Category</option>
                                                    <option value="0">Electronic Gadgets</option>
                                                    <option value="1">Clothings</option>
                                                    <option value="2">Furnitures</option>
                                                    <option value="3">Jwellery</option>
                                                    <option value="4">Utensiles</option>
                                                    <option value="5">Others</option>
                                                </select>
                                            </div>
											</div>
											<div class="clearfix">
                                            <div class="field mbb lfloat">
                                            	<div class="label">
                                                	<span>Add Item Photo ( maximum 8 photo / item )</span>
                                                </div>
                                                <div class="_pht_cn">
                                                	<div class="clearfix">
														<div class="lfloat">
															<div class="dtupc158" id="dtupc158">	
                       	 										<div class="dtupw159">
                        										</div>
                    										</div>
														</div>
														<div class="lfloat">
                                                			<div class="_76hop">
                                                        		<input type="file" class="inputFile" id="add_files" />
                                                            	<div class="_76hop-" title="Add Photo">Add Photo</div>
                                                        	</div>
														</div>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											
                                            <div class="clearfix field mbm">
                                            	<div class="checkWrapper lfloat">
                                                	<span class="" data-type="check">
                                                    	<input type="checkbox" name="allow_price" id="add_item_el-4" data-control="add_item_el-6" />
                                                    </span>
                                                </div>
                                                <div class="lfloat mlb">
                                                	<label for="add_item_el-4"><span class="checklabel">Mention your expected price (in Rs) .</span></label>
                                                </div>
                                            </div>
                                            
                                            <div class="clearfix mbb">
												<div class="field rfloat">
                                            		<label for="add_item_el-5" class="label">Item Location</label>
                                                	<input type="text" id="add_item_el-5" class="inputtext" title="Item Location" />
                                            	</div>
                                            	<div class="field lfloat hidden_elem">
                                            		<label for="add_item_el-6" class="label">Expected Price</label>
                                                	<input type="text" id="add_item_el-6" class="inputtext" title="Expected Price" value="0" />
                                            	</div>
                                            </div>
                                            <div class="field mbm clearfix">
                                            	<label for="add_el_3" class="label">Add Item Description</label>
                                                <div class="uiTypeahead">
                                                	<div class="wrap">
                                                    	<div class="innerWrap">
                                                			<textarea class="inputTextArea uiAutoGrow textInput" id="add_el_3" title="Add Item Description" placeholder></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field clearfix">
												<button class="mts mlb mbs padding_s nbtnbg5 cancel rfloat nbtn button" value="Cancel">Cancel</button>      
                                            	<button type="submit" class="mts mbs button padding_s nbtn nbtnbg4  _fnwx rfloat submitButton" id="submit_add_item" data-ajax="true" data-ajaxify="ajax/formsubmission.php">Add Item
                                                <!--
                                                <div class="ajax-wait indisp mls">
                                                	<div class="clearfix">
                                                    	<div class="_bim87">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                -->
                                                </button>
                                        		
                                            </div>
                                            <div class="field error_container hidden_elem">
                                         		<div class="error_inner">
                                           			Unknown error occured.Please try again after some time.
                                         		</div>
                                    		</div>
                                            </div>
                                        </div>
                                    </form>
<?php
	}else if($action=='modifyItem'){
?>
													<div id="modify_item_box">
														<form id="modify_item_form" class="" name="modify_item" method="post" action="" onsubmit="">
                                    						<div id="modify_item_container">
                                        						<div class="padding_b" id="modify_item_innercontainer">
                                                                	<div class="mbb field">
																		<div class="padding_v_m grey_bg">
																			<div class="text_align_ctr fwb">
																				Modify Item
																			</div>
																		</div>
																	</div>
																	<div class="field mbb">
                                                                    	<div class="">
                                                                        	<div class="clearfix w50 m-h-a">
                                                                        		<div class="lfloat">
                                                                    				<label for="modify_item_el-0" class="label">Add item code</label>
                                                                        			<input type="text" autocomplete="off" maxlength="8" class="inputtext" title="Add item code" id="modify_item_el-0" />
                                                                                </div>
                                                                                <div class="rfloat">
                                                                                	<div>
                                                                                    	<button class="mtb mlb padding_s nbtnbg5 rfloat nbtn button modify_elem smbtn" data-javascript-response="true" data-ajax="true" data-ajaxify="ajax/modres.php" data-ajax-target="modify_inf_der" data-haspopup="false"  data-ajax-replace="true" >Go</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               		<div id="modify_inf_der" class="clearfix">
                                                                    
                                                                    </div>
                                                                    	
                                            					</div>
                                        					</div>
                                    					</form>
													</div>
<?php
	}
?>