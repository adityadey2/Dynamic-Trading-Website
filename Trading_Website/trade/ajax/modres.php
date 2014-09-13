<?php
	session_start();
	require_once('../../class/mysql.php');
	$current_user_id=$_SESSION['user_id'];
	$item_code=$_POST['item_code'];
	$result=$GLOBALS['MySQL']->res("select * from item_stat where item_code='$item_code'");
	$count=mysql_num_rows($result);
	if($count==1){
		$row=mysql_fetch_array($result);
		$item_no=$row['item_no'];
		$owner_id=$row['owner_id'];
		$title=$row['title'];
		$category=$row['category'];
		$item_description=$row['description'];
		$item_imagepath=$row['imagepath'];
		$item_price_listed=$row['expected_price'];
		if($owner_id==$current_user_id){
			$data='
																	<div class="clearfix">
                                        							<div class="field mbb lfloat">
                                            							<label for="modify_item_el-1" class="label">Item Name</label>
                                                						<input type="text" id="modify_item_el-1" class="inputtext" maxlength="30" title="Modify item name" value="'.$title.'" />
                                            						</div>
                                            						<div class="field mbb rfloat">
                                            							<label for="modify_item_el-2" class="label">Item Category</label>
                                                						<select name="" class="select" id="modify_item_el-2">
                                                    						<option value="0" '; if($category==0) $data.='selected="selected"'; $data.='>Electronic Gadgets</option>
                                                   							<option value="1" '; if($category==1) $data.='selected="selected"'; $data.='>Clothings</option>
                                                 						   	<option value="2" '; if($category==2) $data.='selected="selected"'; $data.='>Furnitures</option>
                                            						        <option value="3" '; if($category==3) $data.='selected="selected"'; $data.='>Jwellery</option>
                                                    						<option value="4" '; if($category==4) $data.='selected="selected"'; $data.='>Utensiles</option>
                                                    						<option value="5" '; if($category==5) $data.='selected="selected"'; $data.='>Others</option>
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
                                                    							<input type="checkbox" name="allow_price" id="modify_item_el-4"'; if($item_price_listed!=0) $data.='checked="checked"'; $data.='/>
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
                                            						<div class="field lfloat mbm '; if($item_price_listed==0) $data.='hidden_elem'; $data.='">
                                            							<label for="modify_item_el-6" class="label">Expected Price</label>
                                                						<input type="text" id="modify_item_el-6" class="inputtext" title="Modify expected price" value="'.$item_price_listed.'" />
                                            						</div>
                                                                    </div>
                                            						<div class="field mbm clearfix">
                                            							<label for="modify_el_7" class="label">Modify Item Description</label>
                                                						<div class="uiTypeahead">
                                                							<div class="wrap">
                                                    							<div class="innerWrap">
                                                									<textarea class="inputTextArea uiAutoGrow textInput" id="modify_el_7" title="Modify item description" placeholder>'.$item_description.'</textarea>
                                                        						</div>
                                                    						</div>
                                                						</div>
                                           		 					</div>
                                            						<div class="field clearfix">
																		<button class="mts mlb mbs padding_s nbtnbg5 cancel rfloat nbtn button cancelButton" value="Cancel" data-javascript-response="true">Cancel</button>      
                                            							<input type="submit" class="mts mbs button padding_s nbtn nbtnbg4  _fnwx rfloat submitButton" value="Modify Item" id="submit_modify_item" />
                                        		
                                            						</div>';
			echo json_encode(array('success'=>1,'data'=>$data));
		}else{
			$data='
				<div class="field error_container hidden_elem">
                                         		<div class="error_inner">
                                           			Unknown error occured.Please try again after some time.
                                         		</div>
                                    		</div>';
			echo json_encode(array('success'=>0,'data'=>$data));
		}
	}else{
		$data='
				<div class="field error_container hidden_elem">
                                         		<div class="error_inner">
                                           			Unknown error occured.Please try again after some time.
                                         		</div>
                                    		</div>';
		echo json_encode(array('success'=>0,'data'=>$data));	
	}
	
?>