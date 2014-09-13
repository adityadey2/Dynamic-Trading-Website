// JavaScript Document
(function($){
	$(document).on('submit','form',function(){
		var form=$(this);
		var submitbtn=form.find('button[type="submit"]');
		var ajaxsub=submitbtn.data('ajax');
		if(ajaxsub){
			var ajaxlocation=submitbtn.data('ajaxify');
			var formname=form.attr('name');
			var datasent='';
			var errormsg='';
			if(formname=='add_item'){
				var title=$('#add_item_el-1').val();
				var category=$('#add_item_el-2').val();
				var location=$('#add_item_el-5').val();
				var price=$('#add_item_el-6').val();
				var description=$('#add_el_3').val();
				var imagewrapper=$('#dtupc158 ._dupwrapper');
				var imagepath='';
				imagewrapper.each(function(index, element) {
                    imagepath+=imagewrapper.eq(index).find('.temp_image_container').find('.img').data('imagename')+'-';
                });
				datasent+='action=add_item&title='+title+'&category='+category+'&location='+location+'&price='+price+'&description='+description+'&imagepath='+imagepath;
				alert(datasent);
				if(title=='' || category=='' || location=='' || price=='' || description=='' || imagepath==''){
					errormsg+='Please fill all the field specified.';	
					form.find('.error_container .error_inner').html(errormsg);
					form.find('.error_container').removeClass('hidden_elem');
				}else{
					$.ajax({
						url:ajaxlocation,
						type:'POST',
						data:datasent,
						timeout:1000,
						success: function(data){
							form.find('input').val('');
							form.find('textarea').val('');
							form.find('select').find('option[value="-1"]').attr('selected','selected');
							$('#dtupc158 .dtupw159').html('');
							
						},
						error: function(request,status,err){
							
						}
					});
						
				}
				
					
			}
			return false;
		}
	});
	
	
	$(document).on('change','#add_item_el-4',function(){
		if(this.checked){
			$('#add_item_el-6').val('');
			$('#add_item_el-6').parent('.field').removeClass('hidden_elem').hide().fadeIn(200,function(){
				$('#add_item_el-6').focus();	
			});
		}else{
			$('#add_item_el-6').parent('.field').fadeOut(200,function(){
				$('#add_item_el-6').parent('.field').addClass('hidden_elem');
				$('#add_item_el-6').val('0');
			});
		}
	});
	
	$(document).on('click','.imgrefer',function(){
		var self=$(this);
		var referplace='#'+ self.data('refer');
		var imgno=self.data('imgno');
		//var selectedimg=$(referplace+ ' img.selected');
		var imgwrapper=$(referplace+ ' .imgwrapper.selected');
		if(!$(referplace).find('.imgwrapper:eq('+imgno+')').hasClass('selected')){
			$(referplace).find('.imgwrapper:eq('+imgno+')').removeClass('hidden_elem').addClass('selected');
			imgwrapper.addClass('_zon').fadeOut(400,function(){
				imgwrapper.addClass('hidden_elem').removeClass('selected').show().removeClass('_zon');
			});
		}
		return false;
	});
	var interval;
	
	$(document).on('mouseover','._it_i-',function(e) {
		var self=$(this);
          var imgwrapper=self.find('.imgwrapper');
        	var length=imgwrapper.find('img').length;
			var i=0;
			//clearInterval(interval);
			interval=setInterval(function(){
				var selectedimg=imgwrapper.find('img.selected');
				if(i+1>=length) i=0;
				else i++;
				var href=self.find('a').attr('href');
				var refinedhref=href.lastIndexOf('=');
				refinedhref=href.substr(0,refinedhref+1);
				refinedhref+=i;
				self.find('a').attr('href',refinedhref);
				if(!imgwrapper.find('img:eq('+i+')').hasClass('selected')){
					imgwrapper.find('img:eq('+i+')').removeClass('hidden_elem').addClass('selected');
					selectedimg.addClass('_zon').fadeOut(400,function(){
						selectedimg.addClass('hidden_elem').removeClass('selected').show().removeClass('_zon');
					});
				}
			},1500);  

    }).on('mouseout','._it_i-',function(){
		clearInterval(interval);
	});
	
	
})(jQuery)