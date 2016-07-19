$(function(){
	if($('p').hasClass('subscribed_newsletter')){
		$('html, body').scrollTop($(document).height()-$(window).height());
	}
});

function get_name(){
	var e = 'Das ist ein Pflichtfeld';
	var title =  jQuery.trim(document.getElementById("ag_name").value);
	if(title == ""){
			jQuery('.error_name').text(e).css({'color':'red' });
			return false;
		}else{
			jQuery('.error_name').text('');
			return true;
		}
}


function get_email(){
	var e1 = 'Bitte geben Sie eine gültige E-Mailadresse ein!';
    var  emailStr =  jQuery.trim(document.getElementById("ag_email").value);

    var regex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
	
	 if( regex.test(emailStr) ){
			 jQuery('.error_email').text('');
			 return true;
	 }else{

			jQuery('.error_email').text(e1).css({ 'color':'red' });
			//jQuery('.error_email').show();
			return false;	
  	}
}

/* Form validation */
function validateFields(){
	var e = 'Das ist ein Pflichtfeld';
	if( get_email() && get_name() ){
		return true;
	}else{
		jQuery('.errors').text(e).css({ 'color':'red' });		
		get_email();
		get_name();
		return false;
	}
}


/* Edit Email Form validation */
function validateEmailFields(){
	var e = 'Das ist ein Pflichtfeld';
	if( get_email() ){
		return true;
	}else{
		jQuery('.errors').text(e).css({ 'color':'red' });		
		get_email();		
		return false;
	}
}