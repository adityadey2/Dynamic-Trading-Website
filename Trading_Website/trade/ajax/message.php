<?php
		echo '
									<form id="message_form" class="" name="message" method="post" action="" onsubmit="">
                                    	<div id="message_container">
                                        	<div class="clearfix padding_b">
												<div class="mbb field">
													<div class="padding_v_m grey_bg">
														<div class="text_align_ctr fwb">
															Message
														</div>
													</div>
												</div>
                                        		<div class="field mbb">
                                            		<label for="msg_el-1" class="label">Recipient name / email :</label>
                                                	<input type="text" id="msg_el-1" class="inputtext" title="Add recipient name or email address" />
                                            	</div>
                                                <div class="field mbb">
                                            		<label for="msg_el-2" class="label">Subject :</label>
                                                	<input type="text" id="msg_el-2" class="inputtext" title="Add a subject" />
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
                                            		<input type="submit" class="mts mbs button padding_s nbtn nbtnbg4 _fnwx rfloat submitButton" value="Send" id="submit_message" />
                                            	</div>
                                            </div>
                                        </div>
                                    </form>
	';

?>