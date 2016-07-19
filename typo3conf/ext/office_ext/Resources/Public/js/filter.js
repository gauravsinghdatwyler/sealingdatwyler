$(document).ready(function() {

	$('#breadcrumb li a').each(function(){
		var breadText = $(this).text();
		breadText = $.trim(breadText);
		$(this).text(breadText);
	});

	$('#main').on('change','#officeFilter', function(){
		var openDiv = $(this).val();
		if(openDiv != ''){
			$('.contact').fadeOut(0);
			$('.contact').parent().fadeOut(0);
			$("[data-industry='"+openDiv+"']").fadeIn(0);
			$("[data-industry='"+openDiv+"']").parent().fadeIn(0);
		}else{
			$('.contact').fadeIn(0);
			$('.contact').parent().fadeIn(0);
		}
	});



 	// Branch Document File Types
 	$('#main .file-link').each(function(result){
		var fileName = $(this).attr('href');
		var ind = fileName.lastIndexOf('.');
		var fileNameWithExt = $(this).find('span.title').text();
		if(ind < 0){var ext='DOC'}else{ind = ind+1; var ext = fileName.substring(ind).toUpperCase();}
		$(this).find('.extension').html(ext+' Download');
		$(this).find('.link').html(fileNameWithExt+'.'+ext.toLowerCase());
	});


	// Query Form Validations
	/*$('#addQuery').on('click', function(event){
		if(validateForm()){return true;}
		else{return false;}
	});*/

	// Contacts Industry Wise Filtering
 	$('#contactFilter').mixItUp();

 	// Contacts Country Wise Filtering
 	var countryList = [];
 	$('#contFilter option').each(function(){
 		if($(this).val()!='null'){
			countryList.push($(this).val());
		}
	});
	$('.filter').click(function(){
		var counterCountry = 0,i=0;
		var data = '';
		$('#contFilter option').each(function(){if($(this).val()!='null'){$(this).remove();}});
		$('#contFilter .customSelectInner').text('Country');
		$('.country-option #contFilter').prop('selectedIndex',0);
		var spantext = $('.country-option #contFilter option[value=null]').text();
		$('.country-option .customSelectInner').html(spantext);
		var activeIndustry = $(this).attr('data-filter');

		$.each(countryList, function(key, value){
			var country = value;
			$(activeIndustry).each(function(){
				if($(this).hasClass(country)){counterCountry = counterCountry+1;}
			});
			if(counterCountry > 0){
				data = data+'<option value="'+country+'">'+country+'</option>';
				counterCountry=0;i++;
			}
		});
		$('#contFilter').append(data);
		if(i>1){$('#contFilter').show();$('.country-option span.customSelect').show();}
		else{$('#contFilter').hide();$('.country-option span.customSelect').hide();}
	});
	$('.country-option').on('change','#contFilter', function(){
		var activeClass='mix';
		var country=$(this).val();
		var element='';
		if($('#main .nav-tabs .filter').hasClass('active')){
			activeClass = $('.nav-tabs .active').attr('data-filter');
			activeClass = activeClass.substring(1);
			element = '.'+country+'-'+activeClass;
		}else{
			element = '.'+country;
		}
		if(country != 'null'){
			$('.mix').hide(500);
			$(element).delay(400).show(500);
		}else{
			$('.'+activeClass).show(500);
		}
	});

	// Load More Container Dissable
	$('.contact-finder .loadmore-container').css({'display':'none'});
});