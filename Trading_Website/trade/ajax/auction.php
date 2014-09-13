<?php
	session_start();
	require_once('../../class/mysql.php');
	$current_user_id=$_SESSION['user_id'];
	$bidprice=$_POST['bidprice'];
	$item_no=$_POST['item_no'];
	$expected_price=$_POST['item_price_listed'];
	$time=time();
	$result1=$GLOBALS['MySQL']->res("select * from item_auction where auction_member_id='$current_user_id' and item_no='$item_no'");
	if(mysql_num_rows($result1)==0){
	$result=$GLOBALS['MySQL']->res("insert into item_auction(item_no,auction_member_id,auction_price,date) values('$item_no','$current_user_id','$bidprice','$time')");
	if($result){
		$row1=$GLOBALS['MySQL']->getRow("select * from user where user_id='$current_user_id'");
		$auction_member_firstname=$row1['firstname'];	
		$auction_member_lastname=$row1['lastname'];
		$auction_member_username=$row1['username'];
		$row2=$GLOBALS['MySQL']->getRow("select * from user_photos where user_id='$current_user_id' AND status='1'");
		$profile_image=$row2['imagepath'];
		$auc_mem_propic_path='../../social/photo/user/'.$auction_member_username.'/Original/Profile_Picture/'.$profile_image;
		$auc_mem_propic_pathVirtual='../social/photo/user/'.$auction_member_username.'/Original/Profile_Picture/'.$profile_image;
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
		$data='
												<div class="lfloat mrm padding_h_s auction_user">
                                                	<div class="clearfix mbs mts text_align_ctr">
                                                    	<span class="fwb">'.$auction_member_firstname.' '.$auction_member_lastname.'
                                                        </span>
                                                    </div>
                                                	<div class="clearfix">
                                        				<a href="#" class="" data-javascript-response="true">
                                        					<div class="_239_  m-h-a">
                                            					<div class="_it_j- _p10-">
                                                					<div class="imgwrapper">
                                                    					<img src='.$auc_mem_propic_pathVirtual.' class="img"';
																		if($auc_mem_propic_aspect_ratio>=0.94){
																			$data.= 'style="height:'.$auc_mem_propic_height.'px; left:'.$auc_mem_propic_left.'px"';
																		}else{
																			$data.= 'style="width:'.$auc_mem_propic_width.'px; top:'.$auc_mem_propic_top.'px"';
																		}	
																		$data.='
                                                            		 	/>
                                                    				</div>
                                                				</div>
                                            				</div>
                                           				</a>
                                        			</div>
                                                    <div class="clearfix text_align_ctr '; 
																						if($bidprice>=$expected_price)
																							$data.='_p0i';
																						else $data.='_p0j';
														$data.='">
                                                		<span class="fwb">'.$bidprice.' Rs.</span>
                                                        <span class="fsm">'.'('.round($bidprice*100/$expected_price).'%)'.'</span>
                                                	</div>
                                                    <div class="clearfix mbs text_align_ctr">
                                                		<span class="fcg fsm">'.date('H:i:s d/m/Y',$time).'</span>
                                                	</div>
                                   
                                                </div>
		';
		echo json_encode(array('success'=>1,'data'=>$data));
	}
	}else{
		$result=$GLOBALS['MySQL']->res("update item_auction set auction_price='$bidprice',date='$time' where auction_member_id='$current_user_id' ");
		echo json_encode(array('success'=>1,'data'=>''));
	}
?>