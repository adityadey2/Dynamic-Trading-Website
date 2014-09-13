(function($){
//PushMenu---------------------------------------------------------------

	//new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );

//HexaCube-------------------------------------------------------------
	var hexa,images = [
                './icons/mainlogo.png',
				'./icons/mainlogo.png',
				'./icons/mainlogo.png',
				'./icons/mainlogo.png',
				'./icons/mainlogo.png',
				'./icons/mainlogo.png',  
            ];

		
	//---------------------------------------------------
	
	$(document).ready(function() {
        hexa = new HexaFlip(document.getElementById('logo'), {set: images},{
				horizontalFlip: true,
				size: 100
            });
        setTimeout(function(){
            hexa.flipBack();
        }, 0);
		var c=0,temp=Math.floor((Math.random()*10)+1),flag=0;
		setTimeout(function(){
            setInterval(function(){
					if(c==temp){ c=0;temp=Math.floor((Math.random()*5)+1); if(flag==0)flag=1; else flag=0;}
					if(flag==0)
						hexa.flip();
					else
						hexa.flipBack();
					c++;
					
            }, 900);
        }, 1100);
		
	});

	$(document).on('keydown','._hm43 ._hid .inputTextarea',function(){
		var self=$(this);
		var inplaceDiv=self.parent('.innerWrap').find('.inplaceText');
		var text='';
		setTimeout(function(){
			text=self.val();
			inplaceDiv.find('span').html(text);
		},0);
	});
})(jQuery)