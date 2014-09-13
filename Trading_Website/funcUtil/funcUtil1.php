<?php
 	function showtopheadbar(){
		?>
		
		<div id="pagelet_headerbar" data-referrer="pagelet_headerbar">
        	<div id="headerBarHolder">
            	<div id="headerBar">
                	<div class="_12mal">
						<?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){ ?>
                    	<div class="loggedout_menubar_container">
                        	<div class="clearfix loggedout_menubar">
								<div class="clearfix">
									<div class="lfloat logobar" id="logobar">
										<div id="logobarInner">
											<div class="logo lfloat" id="logop1"></div>
                                            <div class="logo lfloat mlb" id="logop2"></div>
										</div>
									</div>
									<?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])){ ?>
									<div class="_12mam rfloat mrm">
										<a href="" class="_12man" data-ajax="true" data-javascript-response="true" data-haspopup="true" data-coverfullscreen="true" data-ajaxify="ajax/logincreate.php">
											<!--<div class="_12mam padding_m bdr_r_s text_align_ctr" role="button">-->
												<span>Sign in</span>
											<!--</div>-->
										</a>
									</div>
									<?php } ?>
								</div>
                            </div>
                        </div>
						<?php }else{ ?>
						<div class="loggedin_menubar_container">
							<div class="clearfix loggedin_menubar">
								<div class="clearfix">
									<div class="lfloat _34cdr">
										<div class="toggleMenu toggleHorizontal">
											<a class="toggleButton _34cdr7 menu-trigger" href="#" title="Open Menubar" id="trigger"></a>
										</div>
										<div class="logobar mtm mlm" id="logobar">
											<div id="logobarInner">
												<div class="logo lfloat" id="logo"></div>
											</div>
										</div>
									</div>
									<div class="rfloat">
										<ul id="headItemBar" class="clearfix _67hic">
											<li class="headItems navItems" id="navItem" role="navigation">
												<div id="navItem_container" class="">
													<div class="uiToggle navItems" id="navItems_notifications">
														<a class="navLink" data-hover="tooltip" data-tooltip-align="center" data-tooltip-msg="Click to see notifications">
															<span class="_69hj">Notification</span>
															<span class="_69hk hidden_elem"></span>
														</a>
													</div>
													<div class="uiToggle navItems" id="navItems_messages">
														<a class="navLink" data-hover="tooltip" data-tooltip-align="center" data-tooltip-msg="Click to see/send messages">
															<span class="_69hj">Message</span>
															<span class="_69hk hidden_elem"></span>
														</a>
													</div>
													<div class="uiToggle navItems" id="navItems_requests">
														<a class="navLink" data-hover="tooltip" data-tooltip-align="center" data-tooltip-msg="Click to  see requests">
															<span class="_69hj">Requests</span>
															<span class="_69hk hidden_elem"></span>
														</a>
													</div>
													<div class="navItems" id="navItems_home">
														<a class="navLink" href=""><span class="_69hj">Home</span></a>
													</div>
													<div class="navItems" id="navItems_profile">
														<a class="navLink" href=""><span class="_69hj">Profile</span></a>
													</div>
												</div>
											</li>
											<li class="headItems searchBar _hid" id="snSearch" role="search">
												<div class="clearfix _hie-">
													<i class="_hie_"></i>
													<div class="uiTypeahead _ty142">
														<div class="wrap">
															<div class="innerWrap">
																<div class="_ty143 textInput _hid-a _hid-b _54bg _45gbx" id="">
																	<div class="_hid-a-1">Search Users,Pages and other stuffs</div>
																	<div class="_hid-a-2">
																		<span class="_hid-a-112"></span>
																	</div>
																	<div class="_hid-a-0">
																		<input type="text" class="_hid-a-0a inputsearch" id="searchInput"/>
																	</div>
																	
																</div>
															
															</div>
														</div>
													</div>
												</div>
											</li>
											<li class="headItems postTextboxItem _hir" id="snUpdateStatus">
												<div class="clearfix">
													<div class="mtm mbm">
														<div id="postText">
															<div class="_56tyu">
																<form rel="async" action="" onsubmit="" name="update_status" method="post" class="_hm43">
																	<div class="postheader _234qmc lfloat">
																		<div class="clearfix">
																			<div class="lfloat">
																				<span>Post on </span>
																				<select name="postplace" class="select postplace _sl_a-" id="postPlace">
																					<option value="1" selected="selected">Your Wall</option>
																					<option value="2">Your Friend's Wall</option>
																					<option value="3">A Group Wall</option>
																				</select>
																				<input class="hidden_elem" name="" placeholder="">
																			</div>
																			<div class="rfloat">
																				<div class="privacy _qdp">
																					<a href="#" class="privacyLink" title="Public"><span>Public</span></a>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="_23cd">
																		<div class="_wqbc12-">
																			<div class="_wqbc12_">
																				<span class="_45_ob-">Drag link/photo </span>
																				<span class="_46_ob-">Drop link </span>
																				<span class="_47_ob-">Drop photo </span>
																			</div>
																		</div>
																		<div class="_23cd-1">
																			<div class="uiMentionInput" id="">
																				<div class="highlighter">
																					<div class="highlightedContent"><span></span></div>
																					<div class="highlightedAuxContent"><span></span></div>
																				</div>
																				<div class="uiTypeahead mentionTypeahead composerTypeahead _hid ">
																					<div class="wrap">
																						<div class="innerWrap _hid-b">
																							<div class="DOMControl_placeholder inplaceText">
																								<span class="text_normal"></span>
																							</div>
																							<textarea class="uiAutoGrow inputTextarea uiMentionsTexarea colorTransparent textInput autoFocus" title="What's up?" placeholder="What's up?" name="updateStatus_textarea" role="textbox"></textarea>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="_24cd _234qmc" id="postfooter">
																		<div class="clearfix">
																			<div class="lfloat">
																				<ul class="clearfix _34toy lfloat" id="postNavItemBarType1">
																					<li class="navItem">
																						<a href="" class="navLink">
																							<span></span>
																						</a>
																					</li>
																					<li class="navItem">
																						<a href="" class="navLink">
																							<span></span>
																						</a>
																					</li>
																					<li class="navItem">
																						<a href="" class="navLink">
																							<span></span>
																						</a>
																					</li>
																				</ul>
																				<ul class="clearfix _34toz lfloat" id="postNavItemBarType2">
																					<li class="navItem">
																						<a href="" class="navLink textChange">
																							<span></span>
																						</a>
																					</li>
																					<li class="navItem">
																						<a href="" class="navLink textChange">
																							<span></span>
																						</a>
																					</li>
																					<li class="navItem">
																						<a href="" class="navLink textChange">
																							<span></span>
																						</a>
																					</li>
																				</ul>
																			</div>
																			<div class="rfloat">
																				<input type="submit" class="inputSubmit _c14-q_ updateSubmit _hm55 nbtn nbtnbg3 blur" value="Post" id="" disabled="disabled"/>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>									
								</div>
							</div>
						</div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
		
 <?php
	}
?>