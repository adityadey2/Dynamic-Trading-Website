// JavaScript Document

function createimgpopup(){
	var imgpop=document.createElement('div');
	
	imgpop.className='_999 bgb _cap-entire _mk4 hidden_elem';
	imgpop.id='imgpopup';
	imgpop.innerHTML='<div class="_998"><div class="popupbox"></div></div>';	
	document.getElementById('body').appendChild(imgpop);
}
function destroyimgpopup(){
	var imgpop=document.getElementById('imgpopup');
	imgpop.parentNode.removeChild(imgpop);
}
	