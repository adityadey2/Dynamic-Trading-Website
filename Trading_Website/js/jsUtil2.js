(function($){

	var loadingheight,loadingwidth;
	$(document).ready(function(){
		loadingheight=$('.popupbox .loading').height();
		loadingwidth=$('.popupbox .loading').width();
		$('.popupbox').css({'width':loadingwidth,'height':loadingheight});
	});
	var timeout,topscroll;
	$(document).on('click','a',function(){
		var self=$(this); 
		var haspopup=self.data('haspopup');
		if(haspopup){
			var coverfullscreen=self.data('coverfullscreen');
			var ajaxify=self.data('ajaxify');
			if(coverfullscreen){
				topscroll=window.scrollY;
				bodywidth=$('._li').width();
				$('._li').addClass('_fixit').css({'width':bodywidth,'top':-topscroll+'px'});
				$('#popup').removeClass('hidden_elem').css('display','none').fadeIn('fast');
				$('#popup .popupbox').removeClass('hidden_elem');
				$.ajax({
					url:ajaxify,
					type:'POST',
					timeout:1000,
					success: function(data){
					
						$('#popup .popupbox .loading').addClass('hidden_elem');
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
					},
					error: function(request,status,err){
						if(status=='timeout'){
							$('#popup .popupbox').addClass('hidden_elem');
							$('#popup').fadeOut('fast',function(){
								$('#popup').addClass('hidden_elem');
								$('._li').removeClass('_fixit');
								window.scroll(0,topscroll);
							});
							$('#popup .popupbox .loading').removeClass('hidden_elem');
						}
					}
				});
			}
		}
		if(self.hasClass('cancelButton')){
			var closebutton=$(this);
			if(closebutton.hasClass('closePopup')){
				closebutton.parents('.popupbox div:first-child').fadeOut(1000);
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
		
		return false;
	});


})(jQuery)