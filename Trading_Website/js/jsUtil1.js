// JavaScript Document
$(function(){
	//HexaCube-------------------------------------------------------------
	var hexa, hexa_pid = -1,
        text1 = 'SMART'.split(''),
		text2 = 'NETWORK'.split(''),
        settings = {
            size: 50,
            margin: 5,
            fontSize: 35,
            perspective: 3250
        },
        makeObject = function(a){
            var o = {};
            for(var i = 0, l = a.length; i < l; i++){
                o['letter' + i] = a[i] + a[i] + a[i] + a[i];
            }
            return o;
        },
        getSequence = function(a, reverse, random){
            var o = {}, p;
            for(var i = 0, l = a.length; i < l; i++){
                if(reverse){
                    p = l - i - 1;
                }else if(random){
                    p = Math.floor(Math.random() * l);
                }else{
                    p = i;
                }
                o['letter' + i] = a[p];
            }
            return o;
        };
  
	//--------------------------------------------------------------------------------------
	
		
	$(document).on('keydown','._12mau ._12max',function(e){
		var self=$(this);
		setTimeout(function(){
		if(self.val()!="")
			self.parent('.placeholderInput').removeClass('placeholderInputEmpty');
		else
			self.parent('.placeholderInput').addClass('placeholderInputEmpty');
		},0);
	});
	var timeout;
	$(document).on('mouseenter','._12mau .field i',function(){
		var self=$(this);
		var description=self.find('input[type="hidden"]').val();
		var top=self.position().top;
		var left=self.position().left;
		clearTimeout(timeout);
		timeout=setTimeout(function(){
			$('#tooltip._tip_size_a').css({'top':top+100,'left':left-200});
			$('#tooltip._tip_size_a .destip').html(description);
			$('#tooltip._tip_size_a').removeClass('hidden_elem');
		},200);
	});
	$(document).on('mouseleave','._12mau .field i',function(){
		clearTimeout(timeout);
		timeout=setTimeout(function(){
			$('#tooltip._tip_size_a').addClass('hidden_elem');
		},10);
	});
	
	$(document).on('change','#reg_el_7',function(){
		if(this.checked)
			$('#reg_submit').removeClass('blur').removeAttr('disabled');
		else
			$('#reg_submit').addClass('blur').attr('disabled','disabled');
	});
	//Registration Form submission
	
	$(document).on('submit','#registration',function(e){
		var form=$(this);
		var name=$('#reg_el_1').val();
		var email=$('#reg_el_2').val();
		var password=$('#reg_el_3').val();
		var repassword=$('#reg_el_4').val();
		var gender=form.find('input[name="sex"]').val();
		var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
	    var errormsg="";
		var f=0;
		if(name=="" || email=="" || password=="" || repassword==""){
			errormsg+="Please fill up every field with proper information."; f=1;
		}
		else if(!pattern.test(email)){
			errormsg+="Provide a valid email address."; f=1;
		}
		else if(password.length<8){
			errormsg+="Password must contain atleast 8 letter"; f=1;
		}
		else if(password!=repassword){
			errormsg+="Password mismatch"; f=1;
		}
		if(f==1){
			$('#reg_error_inner').text(errormsg);
			$('#registration_err').removeClass('hidden_elem');
		}else{
			form.submit();
		}
		return false;
	});
	// Back button avoid trick

	$(document).ready(function(){
		var input=$('input[type="text"]');
		input.val('');
		return false;
	});
	
	
	//---------------------------------------------------
	
	 $(document).ready(function() {
			$("#logop1").html('<div id="hexaflip1" class="logoInner"></div>');
			$("#logop2").html('<div id="hexaflip2" class="logoInner"></div>');
        	hexa1 = new HexaFlip(document.getElementById('hexaflip1'), makeObject(text1), settings);
			hexa2 = new HexaFlip(document.getElementById('hexaflip2'), makeObject(text2), settings);
        	setTimeout(function(){
                hexa1.setValue(getSequence(text1, true));
				hexa2.setValue(getSequence(text2, true));
            }, 0);
			setTimeout(function(){
                setInterval(function(){
                    hexa1.setValue(getSequence(text1, false, true));
					hexa2.setValue(getSequence(text2, false, true));
                }, 500);
            }, 500);
		});	
})(jQuery)