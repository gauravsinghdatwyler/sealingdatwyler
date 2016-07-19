$(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

$(document).ready(function(){
	$(".gray-tabs ul.nav-tabs li").each(function(){
	   $(this).find("a").wrapInner("<span></span>");

	});

	$( ".inner-content" ).children().addClass("text-section");
	$( ".gray-tabs .tab-content .tab-pane" ).children().addClass("text-section");
	//$(".gray-tabs ul.nav-tabs").addClass("text-box-toc");
	$(".gray-tabs .news_press ul.nav-tabs li").eq(0).addClass("active");
	$(".gray-tabs .news_press .tab-content .tab-pane").eq(0).addClass("active");

	if($( "#main #page-intro" ).next().hasClass('text-section')){
		$( "#main #page-intro" ).next('.text-section').css("padding-top","0px");
	}


	/*var $lis = $(".gray-tabs ul.nav-tabs li");
	if ($lis.length > 3) {
		$(".gray-tabs ul.nav-tabs").addClass("expanded");
	}
	else{
		$(".gray-tabs ul.nav-tabs").addClass("expanded");
	}*/




	if($(".news .home_news ul li").size() >=3)
		$(".news .home_news em.button").show();
	if($(".news .home_events  ul li").size() >=3)
		$(".news .home_events em.button").show();



	//indexed search js START//
	$(".tx-indexedsearch .tx-indexedsearch-res:first").wrap("<ol></ol>");
	var cnt = $(".tx-indexedsearch .tx-indexedsearch-res:first").contents();
	$(".tx-indexedsearch .tx-indexedsearch-res:first").replaceWith(cnt);


	//indexed search js END//

	if($(".filter select").length){
		$(".filter select").trigger( "change" );
	}

	$('.gray-tabs .nav-tabs li').each(function(){
		$(this).click(function(){
			if($(this).parents('.tab-v1').find('.tab-content .pdfdownload_section').hasClass('pdfdownload_section')) {
				var $downloads = $(this).parents('.tab-v1').find('.tab-content .pdfdownload_section').find('.public').find('.download .text');
				var $downloadLinks = $downloads.find('span.link');

				setTimeout(function(){
					$downloadLinks.each(function(){
						redefineFontSize($(this), $(this).closest('.download').outerWidth( true ) - 120);
					});
				},200);
			}
		});
	});
	/**
		/* Redefine FontSize for Download links
		*/

		function redefineFontSize(title, maxWidth) {
				for (var i = 0; i < 3; i++) {
				var fontSize = parseInt(title.css("font-size"));
				console.log(title.width() +'--'+ maxWidth +'--'+ fontSize);
				if(title.width()) {
					if(title.width() > maxWidth && fontSize > 10) {
						console.log('here');
						var newFontSize = fontSize - 2;
						title.css("font-size", newFontSize);
					}
				}
			}
		}

});

//Home Tab content
$(document).ready(function(){
	var tabsArea = $(".text-box-toc.expanded");
	var tabsAreaWidth = tabsArea.width();
	var tabs = tabsArea.find("li");
	var nbrOfTabs = tabs.size();
	var margin = 18 + 25;
	var sizeOfOneTab = (tabsAreaWidth / nbrOfTabs) - margin;

	$.each(tabs, function() {
		var currTab = $(this);
		currTab.css({
			"width": sizeOfOneTab + "px",
			"margin": "18px 25px 18px 18px"
		});
	});

	$('.single-item').slick({
	  dots: true,
	  arrows: true,
	  infinite: true,
	  speed: 600,
	  autoplay: true,
      autoplaySpeed: 3000,
	  slidesToShow: 1,
	  slidesToScroll: 1
	});

});

//Powermail(Blind application form) JS START
$(document).ready(function(){

	$("#main form > fieldset textarea").focusin(function(){
		$(this).addClass("textarea-boundry").removeClass("user-error");
	});
	//Powermail(Blind application form) JS END

	//Powermail(application form) JS START

	$("#main .application-form form > fieldset textarea").focusin(function(){
		$(this).removeClass("textarea-boundry");
	});
	//Powermail(application form) JS END
});
//INDEXED SEARCH JS START
/*$(document).ready(function(){
	var output = $(".tx-indexedsearch-browsebox p").text();
	var startPos = output.lastIndexOf(" ")+1;
	var NewText = output.substring(startPos);
	$(".tx-indexedsearch-browsebox p").html('<strong>'+NewText+'</strong>');
	$("#branding-box .pull-btn").click(function(){
		if($(this).hasClass("open")){
			$(this).removeClass("open");
			$("#main-nav").removeClass("open");
		}else{
			$(this).addClass("open");
			$("#main-nav").addClass("open");
		}
	});

	var search_msg=$('.tx-indexedsearch .tx-indexedsearch-whatis').html();
	$('.tx-indexedsearch .tx-indexedsearch-whatis').empty();
	var no_of_search=$('.tx-indexedsearch .tx-indexedsearch-browsebox p').text();
	$('.tx-indexedsearch .tx-indexedsearch-browsebox p').remove();
	$('.tx-indexedsearch .tx-indexedsearch-whatis').append(no_of_search + "&nbsp;" +search_msg);

	//For display "browse" keyword
	if ($(".tx-indexedsearch-browsebox ul").length > 0)
	{
		$( ".tx-indexedsearch .tx-indexedsearch-browsebox" ).prepend( "<h3>browse</h3>" );
	}

	//For display "tooltip"
	var tooltip=(($('ul.browsebox li a').text()).substring(0,($('ul.browsebox li a').text()).indexOf(" ")));
	$("#main .tx-indexedsearch > div > div:nth-child(3) > ul li").attr('title', tooltip);
	$("#main .tx-indexedsearch > div > div:nth-child(5) > ul li").attr('title', tooltip);
	console.log(tooltip);

	//For replace pagination prefix
	$('ul.browsebox li a').each(function(){
		$(this).html($(this).html().replace('Page ', ''));
		$(this).html($(this).html().replace('Seite ', ''));
		$(this).html($(this).text().replace('Next >', ''));
		$(this).html($(this).html().replace('Nächste ', ''));
		$(this).html($(this).text().replace('< Previous', ''));
	});


	//For displaying no more then 10 search result in page
	var result_size = $( ".tx-indexedsearch > div > ol > li" ).size();
	if(result_size > 10)
	{
		var duplicate_result=result_size - 10;
		$('.tx-indexedsearch > div > ol > li').slice(-duplicate_result).remove();
	}
});	*/
//INDEXED SEARCH JS END

//FORM-HANDLER JS START
	$(document).ready(function(){

		//Show-Hide form as per selection of radio button
		var requestvalue = localStorage.getItem("option");

		if(requestvalue == "New product registration" || requestvalue == "Neue Produktregistrierung")
		{
			$("#new_product_div").show();
	  		$("#update_loa_div").hide();
	  		localStorage.setItem("option",null);
		}
	 	$('input[type="radio"]').click(function(){
	        if($(this).attr("value")=="Update LoA for name change" || $(this).attr("value")=="Aktualisierung der Vollmacht wegen Namensänderung")
	        {
	           $("#new_product_div").hide();
	 		   $("#update_loa_div").show();
	 		   localStorage.setItem("option",$(this).attr("value"));
	        }
	        if($(this).attr("value")=="New product registration" || $(this).attr("value")=="Neue Produktregistrierung")
	        {
	          	$("#new_product_div").show();
	  			$("#update_loa_div").hide();
	  			localStorage.setItem("option",$(this).attr("value"));
	        }
 	 	});

 	 	//Displaying error messages
		var counter=0;
		$(".loaform_error").each(function(){
				var temp=$(this).text().trim();
				if(temp != '')
				{
					if(counter==0)
					{
						$("#show_loa_error").append("Error!"+ "<br>");
						counter=1;
					}
					$("#show_loa_error").append($(this).text()+"<br>");
					$("#show_loa_error").show();
				}
		});
		$("#show_loa_error").append("<br>");
		$(".loaform_error").css("display","none");
		$("#show_loa_error").show();
		$("#show_loa_error").attr("style", "display: block !important");
	//FORM-HANDLER JS END

	//Track SuperStructure Page JS START
	var pageurl=window.location.search.substr(1).split('=').pop();
	if(pageurl=="tab2")
	{
		$("#main .gray-tabs .tab-v1 >ul > li").removeClass('active');
		$("#main .gray-tabs .tab-v1 >ul > li:nth-child(2)").addClass('active');
		$("#main .gray-tabs .tab-content >:nth-child(1)").removeClass('active in');
		$("#main .gray-tabs .tab-content >:nth-child(2)").addClass('active in');
	}
	if(pageurl=="tab3")
	{
		$("#main .gray-tabs .tab-v1 >ul > li").removeClass('active');
		$("#main .gray-tabs .tab-v1 >ul > li:nth-child(3)").addClass('active');
		$("#main .gray-tabs .tab-content >:nth-child(1)").removeClass('active in');
		$("#main .gray-tabs .tab-content >:nth-child(3)").addClass('active in');
	}
	if(pageurl=="tab4")
	{
		$("#main .gray-tabs .tab-v1 >ul > li").removeClass('active');
		$("#main .gray-tabs .tab-v1 >ul > li:nth-child(4)").addClass('active');
		$("#main .gray-tabs .tab-content >:nth-child(1)").removeClass('active in');
		$("#main .gray-tabs .tab-content >:nth-child(4)").addClass('active in');
	}
	//Track SuperStructure Page JS END
});

$(function(){
	//$('select.hasCustomSelect').customSelect();
	var select_width = $(".top .meta-language").width();
	$(".top .meta-language select") .css("width", select_width + "px");
	});
	$(window).resize(function(){
		var select_width = $(".top .meta-language").width();
	$(".top .meta-language select") .css("width", select_width + "px");

	var select_width = $(".tx-powermail .select-container").width();
	$(".tx-powermail .select-container select") .css("width", select_width + "px");
	});
	$(window).resize(function(){
		var select_width = $(".tx-powermail .select-container").width();
	$(".tx-powermail .select-container select") .css("width", select_width + "px");

	var select_width = $(".filters .filter").width();
	$(".filters .filter select") .css("width", select_width + "px");
	});
	$(window).resize(function(){
		var select_width = $(".filters .filter").width();
	$(".filters .filter select") .css("width", select_width + "px");
	
	

});


/*$(document).ready(function(){
	$("#branding-box .pull-btn").click(function(){
		if($(this).hasClass("open")){
			$(this).removeClass("open");
			$("#main-nav").removeClass("open");
		}else{
			$(this).addClass("open");
			$("#main-nav").addClass("open");
		}
	});

	$("#main-nav ul li.submenu").each(function() {
		$(this).children("a").after("<span class='arrow-Icon1'><em class='fa fa-chevron-up'></em></span>");
    });
	$(".arrow-Icon1").click(function(){
		if($(this).next("ul").is(":visible"))
		{
			$(this).children(".fa").removeClass("fa-chevron-down");
			$(this).children(".fa").addClass("fa-chevron-up");
			$(this).next("ul").slideUp();
		}
		else
		{
			$(this).children(".fa").removeClass("fa-chevron-up");
			$(this).children(".fa").addClass("fa-chevron-down");
			$("ul .level1").slideUp();
			$(this).next("ul").slideDown();
		}
	});
});*/



//REGISTRATION FORM JS START
  //(email validation using AJAX)
	function validateEmail(sEmail) {
		var filter = /^([\w\.-]+@((?!gmail|yahoo|hotmail|outlook|asdfasdfmail|dfoofmail|asdooeemail|asooemail|rtotlmail|qwkcmail|mail|yandex|anaptanium|tom).)[\w\.-]+\.\w{2,4})?$/;
		if (filter.test(sEmail)) {
			return true;
		}
		else {
			return false;
		}
	}
$(document).ready(function(e) {
	var languageid=0;
	if (window.location.href.indexOf("/de/") > -1)
	{
		languageid=1;
	}
	$("#tx-srfeuserregister-pi1-submit").click(function(e) {

		$('input[required="required"]').each(function(){
				if($(this).val().length == 0){
					$( this ).addClass('user-error');
					return false;
				} else {
					$( this ).removeClass('user-error');
				}
		});

		var sEmail = $("#tx-srfeuserregister-pi1-email").val();
		if(sEmail!="")
			{
				if (!validateEmail(sEmail))
				{
					e.preventDefault();
					if(languageid==1)
					{
						$(".email_error").hide();
						$(".email_error_de").show();
					}
					else
					{
						$(".email_error").show();
						$(".email_error_de").hide();
					}
					$("#tx-srfeuserregister-pi1-email").addClass("user-error form-ui-invalid");

				}
				return;
			}
	});

	$(".powermail_submit").click(function(e) {
			if( !$( "#powermail_field_uploadyourdocuments" ).hasClass('user-success' )){
				$( "div.powermail_fieldwrap_file" ).addClass('user-error');
			}else{
				$( "div.powermail_fieldwrap_file" ).removeClass('user-error');
			}
	});

});
//REGISTRATION FORM JS END

