(function($){
	var timeout,topscroll;
	$(document).on('click','.tradeLink',function(){
		var self=$(this);
		var data_ajax=self.data('ajax');
		var data_javascript_response=self.data('javascript-response');
		if(data_javascript_response){
			if(!self.hasClass('selectedLink')){
				if(data_ajax){
					var ajax_location=self.data('ajaxify');
					$.ajax({
						url:ajax_location,
						type:'POST',
						success: function(data){
							if(self.hasClass('tradeLink')){
								$('._872p ._872q .clearfix div').html(data);
							}
						}
					});
				}
				$('.tradeLink').removeClass('selectedLink');
				self.addClass('selectedLink');
			}
			return false;	
		}
	});
	var loadingheight,loadingwidth;
	$(document).ready(function(){
		loadingheight=$('#popup .popupbox .loading').height();
		loadingwidth=$('#popup .popupbox .loading').width();
		$('#popup .popupbox').css({'width':loadingwidth,'height':loadingheight});
	});
	$(document).on('click','a,button',function(){
		var self=$(this); 
		var datasent='';
		var haspopup=self.data('haspopup');
		var javascript_response=self.data('javascript-response');
		if(javascript_response){
			if(haspopup){
				var coverfullscreen=self.data('coverfullscreen');
				if(coverfullscreen){
					topscroll=window.scrollY;
					bodywidth=$('._li').width();
					$('._li').addClass('_fixit').css({'width':bodywidth,'top':-topscroll+'px'});
					$('#popup').removeClass('hidden_elem').css('display','none').fadeIn('fast');
					$('#popup .popupbox').removeClass('hidden_elem');
					var itemview=self.data('item-view');
					if(itemview){
						var item_no=$('#handle_items input[name="item_no"]').val();
						var itemcode=$('#handle_items input[name="itemcode"]').val();
						var	owner_username=$('#handle_items input[name="owner_username"]').val();
						var owner_name=$('#handle_items input[name="owner_name"]').val();
						var item_price_listed=$('#handle_items input[name="item-price-listed"]').val();
						var highest_auction_price=$('#handle_items input[name="highest-auction-price"]').val();
						var title=$('#handle_items input[name="title"]').val();
						var category=$('#handle_items input[name="category"]').val();
						var item_description=$('#handle_items input[name="item_description"]').val();
						var item_imagepath=$('#handle_items input[name="item_imagepath"]').val();
						datasent+='item_no='+item_no;
						datasent+='&itemcode='+itemcode;
						datasent+='&title='+title;
						datasent+='&category='+category;
						datasent+='&item_description='+item_description;
						datasent+='&item_imagepath='+item_imagepath;
						datasent+='&owner_username='+owner_username;
						datasent+='&owner_name='+owner_name;
						datasent+='&item_price_listed='+item_price_listed;
						datasent+='&highest_auction_price='+highest_auction_price;
					}
					var autoclose=self.data('autoclose');
					var ajaxcall=self.data('ajax');
					if(ajaxcall){
						var ajaxify=self.data('ajaxify');
						$.ajax({
							url:ajaxify,
							type:'POST',
							timeout:1000,
							data:datasent,
							success: function(data){
								$('#popup .popupbox .loading').addClass('hidden_elem');
								var width=$('#popupwrapper').width();
								var height=$('#popupwrapper').height();
								$('#popup .popupbox').prepend(data);
								var width=$('#popupwrapper').width();
								var height=$('#popupwrapper').height();
								$('#popup .popupbox').css({'width':width,'height':height});
								/*
								var currentPopup=$('.fullscreen ._998').children('.current-popup');
								var popboxsizey=currentPopup.height();
								var screenHeight=screen.availHeight;
								var top=(screenHeight-popboxsizey)/2;
								currentPopup.css({'top':top});
								*/
								clearTimeout(timeout);
								timeout=setTimeout(function(){
									$('.popupbox .current-popup').removeClass('invisible_elem');
								},500);
								
								if(autoclose){
									var autoclosetime=self.data('autoclose-time');	
									timeout=setTimeout(function(){
										$('.popupbox .autoclose').click();
									},autoclosetime);
								}
							},
							error: function(request,status,err){
								if(status=='timeout'){
									$('#popup .popupbox').addClass('hidden_elem');
									$('#popup .popupbox .loading').removeClass('hidden_elem');
									$('#popup').fadeOut('fast',function(){
										$('#popup').addClass('hidden_elem');
										$('._li').removeClass('_fixit');
										window.scroll(0,topscroll);
									});
								}
							}
						});
					}
				}
			}
			if(self.hasClass('cancelButton')){
				var closebutton=$(this);
				if(closebutton.hasClass('closePopup')){
					closebutton.parents('.popupbox div:first-child').hide();
					closebutton.parents('.popupbox').css({'height':loadingheight,'width':loadingwidth});
					closebutton.parents('.popupbox').addClass('hidden_elem');
					closebutton.parents('.popupbox div:first-child').remove();
					
					$('#popup').fadeOut('fast',function(){
						$('#popup').addClass('hidden_elem');
						$('._li').removeClass('_fixit');
						window.scroll(0,topscroll);
					});
					$('#popup .popupbox .loading').removeClass('hidden_elem');
				}		
			}
			if(!haspopup && !self.hasClass('tradeLink')){
				var ajaxcall=self.data('ajax');
				if(ajaxcall){
					var ajaxify=self.data('ajaxify');
					var ajax_target=self.data('ajax-target');
					var targetdiv=$('#'+ajax_target);
					targetdiv.addClass('popup_trans');
					if(self.hasClass('modify_elem')){
						var item_code=$('#modify_item_el-0').val();
						datasent+='item_code='+item_code;
					}else if(self.hasClass('bidsub')){
						var bidprice=$('#bid_el-1').val();
						var item_no=$('#handle_items input[name="item_no"]').val();
						var item_price_listed=$('#handle_items input[name="item-price-listed"]').val();
						datasent+='item_no='+item_no+'&bidprice='+bidprice;
						datasent+='&item_price_listed='+item_price_listed;
					}
					$.ajax({
						url:ajaxify,
						type:'POST',
						data:datasent,
						success: function(data){
							var rsp=JSON.parse(data);
							if(self.hasClass('modify_elem'))
								targetdiv.addClass('_899');
							if(self.data('ajax-replace'))
								targetdiv.html(rsp.data);
							else
								targetdiv.prepend(rsp.data);
							if(self.hasClass('bidsub')){
									self.parents('.popupbox div:first-child').hide();
									self.parents('.popupbox').css({'height':loadingheight,'width':loadingwidth});
									self.parents('.popupbox').addClass('hidden_elem');
									self.parents('.popupbox div:first-child').remove();
										$('#popup').fadeOut('fast',function(){
										$('#popup').addClass('hidden_elem');
										$('._li').removeClass('_fixit');
										window.scroll(0,topscroll);	
									});
									$('#popup .popupbox .loading').removeClass('hidden_elem');
									if(targetdiv.parents('.item_auction').hasClass('hidden_elem'))
										targetdiv.parents('.item_auction').removeClass('hidden_elem');
							}
							if(rsp.success==0){
								targetdiv.find('.error_container').removeClass('hidden_elem');	
							}
							clearTimeout(timeout);
							timeout=setTimeout(function(){
								targetdiv.removeClass('popup_trans');
							},700);
						}
					});
				}	
			}
			return false;
		}
	});
	
	
	
	function closePopup(closebutton){
		closebutton.parents('.popupbox div:first-child').fadeOut(1000);
		closebutton.parents('.popupbox').css({'height':loadingheight,'width':loadingwidth});
		closebutton.parents('.popupbox').addClass('hidden_elem');
		closebutton.parents('.popupbox div:first-child').remove();
		$('#popup').addClass('hidden_elem');
		$('#popup .popupbox .loading').removeClass('hidden_elem');
		$('._li').removeClass('_fixit');
	}
})(jQuery)