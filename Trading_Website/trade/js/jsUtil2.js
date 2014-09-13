// JavaScript Document
(function($){
	
		var iBytesUploaded = 0;
		var iBytesTotal = 0;
		var iPreviousBytesLoaded = 0;
		var oTimer = 0;
		var sResultFileSize = '';

		function sec_to_time(secs){
			var hr = Math.floor(secs / 3600);
    		var min = Math.floor((secs - (hr * 3600))/60);
   			var sec = Math.floor(secs - (hr * 3600) -  (min * 60));
    		if (hr < 10) {hr = "0" + hr; }
    		if (min < 10) {min = "0" + min;}
    		if (sec < 10) {sec = "0" + sec;}
   		 	if (hr) {hr = "00";}
    			return hr + ':' + min + ':' + sec;
		};
		function bytesToSize(bytes) {
    		var sizes = ['Bytes', 'KB', 'MB'];
    		if (bytes == 0) return 'n/a';
    		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    		return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
		};
        function handleFileSelect(files){
			document.getElementById('dtupc158').style.display='inline-block';
			var submitButton=document.getElementById('submit_add_item');
			submitButton.setAttribute('disabled','disabled');
			for (var i = 0, f; f = files[i]; i++) {
      		// Only process image files.
      			if (!f.type.match('image.*')) {
       				 continue;
      			}
	  			var reader=new FileReader();
	  			reader.onload=(function(thisFile){
		  			return function(e){
						var div=document.createElement('div');
						div.classList.add('_dupwrapper');
			 			var span=document.createElement('span');
						span.classList.add('wrapper');
						if(parseInt(thisFile.size)>1024*1024)
							var size=parseFloat(parseInt(thisFile.size)/(1024*1024)).toFixed(2) + 'MB';
						else if(parseInt(thisFile.size)>1024)
							var size=parseFloat(parseInt(thisFile.size)/(1024)).toFixed(2) + 'KB';
						else
							var size=parseInt(thisFile.size)+'B';
						var name=escape(thisFile.name);
						var name=name.replace(/%20/gi," ");
			 			span.innerHTML=['<div style="position:absolute; top:0px; left:0px; display:none; height:40px; padding:16px 0px; text-align:center; background-color:rgba(255,255,255,0.7); width:73px;" class="_snld158"><img src="../site_icons/snld157581.gif" height="40" /></div><a class="cancel_upload cancel_progress" data-url="ajax/tempimageactions.php" data-action="cancelupload"><i></i></a><span class="inner1">',name,'</span><span class="inner2">',size,'</span>'].join(''); 
						div.appendChild(span);
						document.getElementById('dtupc158').querySelector('.dtupw159').appendChild(div);
						var divouter=document.createElement('div');
						divouter.classList.add('progressbar');
						var divinner=document.createElement('div');
						divinner.classList.add('progressbarinner');
						divouter.appendChild(divinner);
						span.appendChild(divouter);
						var divprogress_info=document.createElement('div');
						divprogress_info.classList.add('progress_info');
						var divprogress_speed=document.createElement('div');
						divprogress_speed.classList.add('progress_speed');
						divprogress_info.appendChild(divprogress_speed);
						var divbytesuploaded=document.createElement('div');
						divbytesuploaded.classList.add('bytesuploaded');
						divprogress_info.appendChild(divbytesuploaded);
						var divuploadtimeleft=document.createElement('div');
						divuploadtimeleft.classList.add('uploadtimeleft');
						divprogress_info.appendChild(divuploadtimeleft);
						var divpercentuploaded=document.createElement('div');
						divpercentuploaded.classList.add('percentuploaded');
						divprogress_info.appendChild(divpercentuploaded);
						span.appendChild(divprogress_info);
						iPreviousBytesLoaded = 0;
						divpercentuploaded.innerHTML='';
						divinner.style.width='0px';
			
						var XHR= new XMLHttpRequest();
						XHR.upload.addEventListener('progress', function(e){
							if (e.lengthComputable) {
        						iBytesUploaded = e.loaded;
        						iBytesTotal = e.total;
        						var iPercentComplete = Math.round(e.loaded * 100 / e.total);
        						var iBytesTransfered = bytesToSize(iBytesUploaded);
        						divpercentuploaded.innerHTML = iPercentComplete.toString() + '%';
        						divinner.style.width = (iPercentComplete).toString() + '%';
        						divbytesuploaded.innerHTML = iBytesTransfered;
								oTimer = setInterval(function(){
									var iCB = iBytesUploaded;
    								var iDiff = iCB - iPreviousBytesLoaded;
									iPreviousBytesLoaded = iCB;
    								// if nothing new loaded - exit
    								 if(iDiff <= 0) return false;
    									
    									iDiff = iDiff * 2;
   										var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    									var secondsRemaining = iBytesRem / iDiff;
										
    									// update speed info
    									/*var iSpeed = iDiff.toString() + 'B/s';
										var mb=(1024*1024);
										var kb=1024;
    									if (iDiff >mb) {
											var temp=(iDiff);
											temp=temp/mb;
											temp=temp.toFixed(2);
        									iSpeed = temp.toString() + 'MB/s';
    									} else if (iDiff > 1024) {
											var temp=(iDiff);
											temp=temp/kb;
											temp=temp.toFixed(2);
        									iSpeed =  temp.toString() + 'KB/s';
    									} */
										iSpeed=bytesToSize(iDiff);
    									divprogress_speed.innerHTML = iSpeed;
    									divuploadtimeleft.innerHTML =sec_to_time(secondsRemaining);
									
								},500);
							/*
        					if (iPercentComplete == 100) {
            					var oUploadResponse = document.getElementById('upload_response');
            					oUploadResponse.innerHTML = '<h1>Please wait...processing</h1>';
            					oUploadResponse.style.display = 'block';
        					}*/
    						}else{
        						divinner.innerHTML = 'Unable to compute';
    						}
						}, false);
						XHR.addEventListener('load', function(e){
							divprogress_speed.innerHTML='0.00';
    						divpercentuploaded.innerHTML = '100%';
    						divinner.style.width ='100%';
    						divuploadtimeleft.innerHTML = '00:00:00';
   		 					clearInterval(oTimer);
						}, false);
						XHR.addEventListener('error', uploadError, false);
						XHR.addEventListener('abort', uploadAbort, false);
						XHR.onreadystatechange=function(){
							if(XHR.status==200 && XHR.readyState==4){
								var rsp=JSON.parse(XHR.responseText);
								divouter.classList.add('hidden_elem');
								divprogress_info.classList.add('hidden_elem');
								span.querySelector('.inner1').classList.add('hidden_elem');
								span.querySelector('.inner2').classList.add('hidden_elem');
								var div=document.createElement('div');
								div.classList.add('temp_image_container');
								div.innerHTML=rsp.img;
								span.appendChild(div);
								span.querySelector('a.cancel_upload').classList.remove('cancel_progress');
								if($('#dtupc158 ._dupwrapper').length==8){
									$('#add_item_container ._76hop').addClass('hidden_elem');
								}
								submitButton.removeAttribute('disabled');
							}
						}
						XHR.open('POST','photo_uploader.php',true);
						var data=new FormData();
						data.append('file',thisFile);
						XHR.send(data);
						XHR.setRequestHeader("Content-Type", "multipart/form-data");
						XHR.setRequestHeader("X-File-Name", thisFile.name);
						XHR.setRequestHeader("X-File-Size", thisFile.size);
						XHR.setRequestHeader("X-File-Type", thisFile.type); 
						
						oTimer = setInterval(function(){
							var iCB = iBytesUploaded;
    						var iDiff = iCB - iPreviousBytesLoaded;
    						// if nothing new loaded - exit
    						if (iDiff == 0)
        						return;
 
    						iPreviousBytesLoaded = iCB;
    						iDiff = iDiff * 2;
   							var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    						var secondsRemaining = iBytesRem / iDiff;
    						// update speed info
    						var iSpeed = iDiff.toString() + 'B/s';
    						if (iDiff > 1024 * 1024) {
        						iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
    						} else if (iDiff > 1024) {
        						iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
    						}
    						divprogress_speed.innerHTML = iSpeed;
    						divuploadtimeleft.innerHTML =sec_to_time(secondsRemaining);
						},300);
		  			};
	  			})(f);
				reader.readAsDataURL(f);
			}
		}
		
		function uploadError(e) { // upload error
    		/*document.getElementById('error2').style.display = 'block';*/
    		clearInterval(oTimer);
		} 
 
		function uploadAbort(e) { // upload abort
    		/*document.getElementById('abort').style.display = 'block';*/
   		 	clearInterval(oTimer);
		}


 		$(document).on('change','#add_files',function(e){
			
			var files=e.target.files;
			handleFileSelect(files);
		});
		
		
		
		
		var dropZoneVisible=true;
		var dropZoneTimer;
		$(document).on('dragstart dragenter dragover', function(event) {    
    		// Only file drag-n-drops allowed, http://jsfiddle.net/guYWx/16/
    		if ($.inArray('Files', event.originalEvent.dataTransfer.types) > -1) {
        	// Needed to allow effectAllowed, dropEffect to take effect
        		event.stopPropagation();
       		 	// Needed to allow effectAllowed, dropEffect to take effect
        		event.preventDefault();
				if($('#dtupc158').css('display')=='none')
					$('#dtupc158').css('display','inline-block');
				$('#dtupc158 .dtupw159').css('opacity','0.2');
				$('.drop_area_header .drop_message').html('Drag files here');
				$('.drop_area_header').css('display','inline-block');
				if($('.drop_area_header').hasClass('drop_area_header_ondragover'))
					$('.drop_area_header').removeClass('drop_area_header_ondragover');
        		     // Hilight the drop zone
        		dropZoneVisible= true;
			
       	 		// http://www.html5rocks.com/en/tutorials/dnd/basics/
        		// http://api.jquery.com/category/events/event-object/
        		event.originalEvent.dataTransfer.effectAllowed= 'none';
        		event.originalEvent.dataTransfer.dropEffect= 'none';

         		// .dropzone .message
        		if($(event.target).hasClass('drop_area_header') || $(event.target).hasClass('drop_message')) {
            		event.originalEvent.dataTransfer.effectAllowed= 'copyMove';
            		event.originalEvent.dataTransfer.dropEffect= 'move';
					if(!$('.drop_area_header').hasClass('drop_area_header_ondragover'))
						$('.drop_area_header').addClass('drop_area_header_ondragover');
					$('.drop_area_header .drop_message').html('Drop here');
					
        		} 
    		}
		}).on('dragleave dragend', function (event) {  
    		dropZoneVisible= false;

    		clearTimeout(dropZoneTimer);
    		dropZoneTimer= setTimeout( function(){
        		if( !dropZoneVisible ) {
            		$('.drop_area_header').hide(); 
					if($('#dtupc158').css('display')!='none'){
						if($('._dupwrapper').length==0)
							$('#dtupc158').hide();
					}
					$('#dtupc158 .dtupw159').css('opacity','1');
				}
    		}, 70); // dropZoneHideDelay= 70, but anything above 50 is better
		}).on('drop',function(event){
			if($(event.target).hasClass('drop_area_header') || $(event.target).hasClass('drop_message')) {
					event.preventDefault();
					event.stopPropagation();
            		var files=event.originalEvent.dataTransfer.files;
					$('.drop_area_header').hide(); 
					$('#dtupc158 .dtupw159').css('opacity','1');
					handleFileSelect(files);
					
        	}else{
				dropZoneVisible= false;
				clearTimeout(dropZoneTimer);
    			dropZoneTimer= setTimeout( function(){
        			if( !dropZoneVisible ) {
            			$('.drop_area_header').hide(); 
        			}
    			}, 70); 
			}
		});
   
	
})(jQuery)