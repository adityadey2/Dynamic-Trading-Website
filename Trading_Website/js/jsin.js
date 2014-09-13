// JavaScript Document
(function($){
	var timeout;
	
	
	// ScrollBar related javascript
	
	$(document).ready(function(e) {
      	function fixPageXY(e) {
  			if (e.pageX == null && e.clientX != null ) {
    			var html = document.documentElement
    			var body = document.body
    			e.pageX = e.clientX + (html.scrollLeft || body && body.scrollLeft || 0)
    			e.pageX -= html.clientLeft || 0
    			e.pageY = e.clientY + (html.scrollTop || body && body.scrollTop || 0)
    			e.pageY -= html.clientTop || 0
  			}	
		}
		var _timeout1,_timeout2,flag=0;
		$(document).on('mouseenter','.uiScrollableArea',function(){
			
			if(flag!=1){
			var self=$(this);
			var scrollcontainer=self.find('.uiScrollableAreaWrap');
			var scrollbody=self.find('.uiScrollableAreaBody');
			var track=self.find('.uiScrollableAreaTrack');
			var gripper=track.find('.uiScrollableAreaGripper');
			var countainerboundary=new Array();
			countainerboundary['left']=self.position().left;
			countainerboundary['top']=self.position().top;
			countainerboundary['bottom']=countainerboundary['top']+self.height();
			countainerboundary['right']=self.position().left+self.width();
			
			//Horizontal Scrolling
			
			if(self.hasClass('horizontal')){
				var containerparam=scrollcontainer.width();
				var bodyparam=scrollbody.width();
				var gripperparam=(containerparam*100)/bodyparam;
				clearTimeout(_timeout1);
				
				if(gripperparam>=100){
					gripper.addClass('hidden_elem');
				}else{
					gripper.css('width',gripperparam+'%');
				}
				track.removeClass('invisible_elem').addClass('fullopc');
				_timeout1=setTimeout(function(){
					track.removeClass('fullopc');
				},1500);
				
				//Vertical Scrolling
				
			}else if(self.hasClass('vertical')){
				var containerparam=scrollcontainer.height();
				var bodyparam=scrollbody.height();
				var gripperparam=(containerparam*100)/bodyparam;
				clearTimeout(_timeout1);
				if(gripperparam>=100){
					gripper.addClass('hidden_elem');
				}else{
					gripper.css('height',gripperparam+'%');
				}
				track.removeClass('invisible_elem').addClass('fullopc');
				_timeout1=setTimeout(function(){
					track.removeClass('fullopc');
				},1500);
			}
			track.on('mouseenter',function(){
				clearTimeout(_timeout1);
				clearTimeout(_timeout2);
				_timeout2=setTimeout(function(){	
					if(!self.hasClass('uiScrollableAreaTrackOver') && flag!=1){
						self.addClass('uiScrollableAreaTrackOver');	
						track.removeClass('fullopc');	
					}
				},100);
			}).on('mouseleave',function(){
				if(flag!=1){
					clearTimeout(_timeout2);
					_timeout2=setTimeout(function(){
						if(self.hasClass('uiScrollableAreaTrackOver') && flag!=1)
							self.removeClass('uiScrollableAreaTrackOver');
					},0);
				}
			});
			gripper.on('mousedown',function(e){
				e.preventDefault();
				self.addClass('uiScrollableAreaDragging');
				flag=1;
				if(self.hasClass('horizontal')){
					var trackparam=track.width();
					var range=trackparam-gripper.width();
					var ini=e.pageX;
					var gripperpos=gripper.position().left;
				}else if(self.hasClass('vertical')){
					var trackparam=track.height();
					var range=trackparam-gripper.height();
					var ini=e.pageY;
					var gripperpos=gripper.position().top;
				}
				var proportion=(bodyparam-containerparam)/range;
				
				document.onmousemove=function(e){
					e=e || event;
					fixPageXY(e);
					if(self.hasClass('horizontal')){	
						var fin=e.pageX;
					}else if(self.hasClass('vertical')){
						var fin=e.pageY;
					}
					var diff=fin-ini;
					if(diff+gripperpos>=0 && diff+gripperpos<=range){
						if(self.hasClass('horizontal')){
							gripper.css('left',diff+gripperpos);
							scrollcontainer.scrollLeft(proportion*(diff+gripperpos));
						}else if(self.hasClass('vertical')){
							gripper.css('top',diff+gripperpos);
							scrollcontainer.scrollTop(proportion*(diff+gripperpos));
						}
					}
					else if(diff+gripperpos<0){
						if(self.hasClass('horizontal')){
							gripper.css('left',0);
							scrollcontainer.scrollLeft(0);
						}else if(self.hasClass('vertical')){
							gripper.css('top',0);
							scrollcontainer.scrollTop(0);
						}
					}
					else{
						if(self.hasClass('horizontal')){
							gripper.css('left',range);
							scrollcontainer.scrollLeft(proportion*range);
						}else if(self.hasClass('vertical')){
							gripper.css('top',range);
							scrollcontainer.scrollTop(proportion*range);
						}
					}
						
					//alert(e.pageX);
				}
				document.onmouseup=function(e){
					document.onmousemove=null
					self.removeClass('uiScrollableAreaDragging');
					flag=0;
					var xpos=e.pageX,ypos=e.pageY;
					if(xpos<countainerboundary['left'] || xpos>countainerboundary['right'] || ypos<countainerboundary['top'] || ypos>countainerboundary['bottom']){
						track.addClass('invisible_elem');
						if(self.hasClass('uiScrollableAreaTrackOver'))
							self.removeClass('uiScrollableAreaTrackOver');
					}
					if(self.hasClass('horizontal')){
						if(ypos<countainerboundary['bottom']-12){
							if(self.hasClass('uiScrollableAreaTrackOver'))
								self.removeClass('uiScrollableAreaTrackOver');
								
						}
					}else if(self.hasClass('vertical')){
						if(xpos<countainerboundary['right']-12){
							if(self.hasClass('uiScrollableAreaTrackOver'))
								self.removeClass('uiScrollableAreaTrackOver');
						}
					}
				}
			});
			}
		}).on('mouseleave','.uiScrollableArea',function(){
			if(flag!=1){
			var self=$(this);
			clearTimeout(_timeout1);
			_timeout1=setTimeout(function(){
				self.find('.uiScrollableAreaTrack').addClass('invisible_elem');
			},0);
			}
		});
		
	
		//document.getElementById('uiScrollableAreaGripper').ondragstart = function() { return false }
    });
	
	// End ScrollBar Javascript
	
	
	
	
	
	
	

	
	$(document).on('click','.uiSelectorButton,.toggleTrigger',function(){
		var self=$(this);
		var uiToggle=self.parents('.uiToggle');
		if(uiToggle.hasClass('openToggler')){
			uiToggle.removeClass('openToggler');
		}else{
			uiToggle.addClass('openToggler');
		}
		return false;
	});
	$(document).on('click','.itemAnchor',function(){
		var self=$(this);
		if(self.hasClass('trigger')){
			var triggerlevel=self.data('trigger-level');
			var ulmenu=self.parents('.uiMenu').find('.uiMenuInner');
			ulmenu.each(function(index, element) {
        	    var level=ulmenu.eq(index).data('level');
				if(level==triggerlevel){
					ulmenu.eq(index).addClass('menuOpen');
					return false;	
				}
        	});
			self.parents('.uiMenuInner').removeClass('menuOpen');
		}else{
			var uiToggle=self.parents('.uiToggle');
			if(uiToggle.hasClass('openToggler')){
				uiToggle.removeClass('openToggler');
			}
		}
		return false;
	});
	
	
	
	
	var topscroll;
	$(document).on('click','.img.zoomin,._spc_ ._spc_a',function(){
		createimgpopup();
		var self=$(this);
		if(self.hasClass('_spc_a')){
			var imgsrc=self.parents('._spc_').find('.imgwrapper.selected img').attr('src');
		}else
			var imgsrc=self.attr('src');
		var imgcontainer='<div style="background:transparent"><img src='+imgsrc+' style="height:500px; width:auto;"/></div>';
		topscroll=window.scrollY;
		bodywidth=$('._li').width();
		$('._li').addClass('_fixit').css({'width':bodywidth,'top':-topscroll+'px'});
		$('#imgpopup').removeClass('hidden_elem').css('display','none').fadeIn('fast',function(){
			$('#imgpopup .popupbox').html(imgcontainer).find('img').hide().fadeIn(100);;
		});
		$('#imgpopup .popupbox').removeClass('hidden_elem');
		
	});
	$(document).on('keyup','body',function(event){
		if(!$('#imgpopup').hasClass('hidden_elem')){
			var key=event.which;
			if(key=='27'){
				$('#imgpopup .popupbox').html('');
				$('#imgpopup').fadeOut('fast',function(){
					$('#imgpopup').addClass('hidden_elem');
					$('._li').removeClass('_fixit');
					window.scroll(0,topscroll);
					destroyimgpopup();
				});	
			}
		}
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
})(jQuery)