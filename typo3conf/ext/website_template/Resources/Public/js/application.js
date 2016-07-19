! function($) {		

	
	/**
	 * MOBILE DETECTION 
	 */	
	 
	var mobileBreakPoint = 600;
	
	function isMobile(){
		return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|ipad|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
	}
	
	var isMobile = isMobile();
	
	if(isMobile && $(window).outerWidth() < mobileBreakPoint) {
		
		
		var orientation = "vertical";
		
		function getWindowOrientation() {
		
			if (typeof window.orientation == "undefined") {
				orientation = "vertical";
			}
			else if (window.orientation == 90 || window.orientation == -90 || window.orientation == '90' || window.orientation == '-90') {
				orientation = "horizontal";
			}
			else {
				orientation = "vertical";
			}
			
			return orientation;
		}
		
		/*
		
		function refreshViewport() {
		  
		  var viewportmeta = document.querySelector('meta[name="viewport"]');
		  orientation = getWindowOrientation();
		  
			  if(isMobile && orientation == "horizontal") {
					viewportmeta.content = viewportmeta.content.replace(/ maximum-scale=[^,]+/, ' maximum-scale=1.0');
			  }
			  else {
					viewportmeta.content = viewportmeta.content.replace(/ maximum-scale=[^,]+/, ' maximum-scale=5.0');
			  }
		}
		
		refreshViewport(); // by firstload
		
		window.document.addEventListener('orientationchange', function() {
			
			refreshViewport();
			
			if(orientation == "horizontal") {
				window.location.reload();
			}
			
		}, false);
		*/
	}
		
		
		
	$(document).ready(function(){
		
		/**
		/* Mobile version navigation
		*/
		
		if ($(window).width() < mobileBreakPoint && $('html').hasClass('touch')) {
			
			var $mainNav = $('#main-nav');
			
			var $pullDownBtn = $('.pull-btn');
			
			$pullDownBtn.on("click", function(){
				if($pullDownBtn.hasClass('open')) {
					$(this).removeClass('open');
					$mainNav.removeClass('open');
				}
				else {
					$(this).addClass('open');
					$mainNav.addClass('open');
				}
			});
			
			
			if($('body').hasClass('corporate')) {
					
				$mainNavFirstLevelLi = $mainNav.find('> ul > li');
				$mainNavFirstLevelLi.removeClass('open');
				$mainNavFirstLevelLinks = $mainNavFirstLevelLi.find('> a');
				
				$mainNavFirstLevelLinks.on("click", function(e) {
					e.preventDefault();
					if($(this).siblings('ul').length > 0) {
						$(this).parent().toggleClass('open').siblings('li').removeClass('open');
					}
					else {
						window.location = "http://" + document.location.hostname + $(this).attr("href");
					}
				});
				
				$mainNavFirstLevelLinks.on("dblclick", function(e) {
					window.location = "http://" + document.location.hostname + $(this).attr("href");				
				});
				
			}
		
		
			/* on hold event */
		
			var _timeoutId = 0;
		
			var _startHoldEvent = function(e) {
				var item = $(this);
				_timeoutId = setInterval(function() {
					window.location = "http://" + document.location.hostname + item.attr("href");
				}, 400);
			};
		
			var _stopHoldEvent = function() {
				clearInterval(_timeoutId );
			};
		
			$mainNavFirstLevelLinks.on('touchstart', _startHoldEvent).on('touchend', _stopHoldEvent);
		
		}
		
		/**
		/* LoA-requestForm, nextStep
		*/
		
		/*
			
		var loaForm = $('#loa-request-form');
		var $loaFieldset = $('#loa-request-form').find('> fieldset');
		$loaFieldset.last().addClass('last-fieldset');
		
		$loaFieldset.each(function(index, element){
			var fieldsetClassName = "fieldset-" + index; 
			$(this).addClass(fieldsetClassName);
			
			if(!$(this).hasClass('last-fieldset')) {
				var nextStepButton = $(this).find('input[type="submit"]').eq(0).addClass('nextStep');	
				nextStepButton.click(function(e){
					e.preventDefault();
					$(this).slideUp().queue(function(next){
						$(this).closest('fieldset').next('fieldset').slideDown();
						next();
					});					
				});
			}
			if($(this).hasClass('last-fieldset')) {
				$(this).hide();
			}
		});
		
		*/
		
		/**
		/* Gray-tabs
		*/
	
		$('.gray-tabs').tabbedbox();
		$('.tabbed-box').tabbedbox({ selection: "random" });
		
		
		/**
		/* Expandable function
		*/
	
		$expandable = $('.text-section').filter('.download, .expandable');
		
		$expandable.each(function(){
			var expandableElement = $(this);
			
			if(expandableElement.find('.hidden').find('> p, > ul').text().trim(" ") == ""){
				expandableElement.find('.more').hide();
			}
				
			expandableElement.on("click",".more",function(){
					$(this).fadeOut("slow").queue(function(next){
						expandableElement.find('.hidden').slideDown();
						next();
					});
			});
				
			expandableElement.on("click",".less",function(){
					expandableElement.find('.hidden').slideUp().queue(function(next){
						expandableElement.find('.more').fadeIn("slow");
						next();
					});
			});
		});
			
			
		/**
		/* Styling plugins init
		*/
		
		/*	
		$('input[type="radio"], input[type="checkbox"]').addClass('styled');
		Custom.init();
		*/
		
		$('select').customSelect();
	
		$productFinder = $('.product-finder');
		if ($productFinder.length > 0) { $productFinder.productFilter(); }
		
		var $jobFinder = $('.jobfinder-provisory, .jobfinder');
		if ($jobFinder.length > 0) { $jobFinder.jobFilter(); }
		
		var $contactFinder = $('.contact-finder');
		if ($contactFinder.length > 0) { $contactFinder.contactFilter(); }

		var $officeFinder = $('#worldmap').has('.filter');
		if ($officeFinder.length > 0) { $officeFinder.officeFilter(); }
		
		$('.accordeon-teaser.events').find('.info').wrapInner('<h2/>');
		$('.accordeon-teaser.news').find('.info').wrapInner('<h2/>');
		
		$('.accordeon-teaser.events').find('.content').wrapInner('<div class="inner-wrapper"/>');
		$('.accordeon-teaser.news').find('.content').wrapInner('<div class="inner-wrapper"/>');
		
		$('.accordeon-teaser').accordeon();
		
		$('.accordeon-teaser .teaser-accordeon').find('h3, h2').children('a').attr("href","");
		
		$('.accordeon-teaser').find('.teaser-accordeon').on('click', 'h3 a, h2', function(e){
			e.preventDefault();
			var clickedPanel = $(this).closest('.teaser-accordeon');
			
			if (clickedPanel.hasClass('open')) {
			clickedPanel.trigger('close.panel');
			} else {
			clickedPanel.trigger('open.panel');
			clickedPanel.siblings('.open').trigger('close.panel');
			}
		});
		
		/*
		$('.accordeon-teaser').find('.teaser-accordeon').trigger('close.panel');
		
		$('.accordeon-teaser').find('.teaser-accordeon').first().trigger('open.panel');
		*/

		$('.teaser-accordeon .info > a').on("click", function(e){
			e.preventDefault();
		});
		
				
		/**
		/* Searchbox
		*/
		
		var $searchBoxActivator = $('#search-box');
		var $searchBoxFormResultsPage = $('#search-results #search-box');
		
		
		$searchBoxActivator.on("click", function(event) {
			
			if ($(event.target).is($searchBoxActivator) ) {
				
					if($searchBoxActivator.hasClass('box-active')){
						$searchBoxActivator.addClass('box-inactive').removeClass('box-active');	
					} else {
						$searchBoxActivator.addClass('box-active').removeClass('box-inactive');
					}
					
			}
			
		});
		
		$searchBoxActivator.on("mouseout", function(event) {
			if ($(event.target).is($searchBoxActivator) ) {
				$searchBoxActivator.removeClass('box-inactive');
			}
		});
		
		$searchBoxFormResultsPage.addClass('box-active');

		/**
		/* Content Slider
		*/
		$.fn.slideshow = function(options) {
		
		this.each(function() {
			
			var o = $.extend({
				slider : $(this),
				speed : 5000,
				status: "play"
			}, options);
			
		var slider = o.slider;
		var status = o.status;
		
			var nextSlide = function(){
				var paginationLis = $('.content-slider').find('.pagination li');
				var $nextLi =  paginationLis.filter('.on').next();
					
				if ($nextLi.length == 0) {
					$nextLi = paginationLis.first();
				}
				$nextLi.trigger("click");
			};
		
			var start = function() {
				status = "play";
				$('.content-slider').find('.pagination li').first().trigger("click");
				// console.log("start");
			}
			var stop = function() {
				status = "pause";
				// console.log("stop");
			}
			var pause = function() {
				status = "pause";
				// console.log("pause");
			}
			var play = function() {
				status = "play";
				// console.log("play");
			}
			
			var slideshowStatus = function() {
				if (status == "play") {
					nextSlide();
				}
				// console.log("test status "+ status);
			}
			
			var init = function(){
				start();
				setInterval(slideshowStatus, o.speed);
			}
			
			init();
			
			slider.on('play.slideshow', play);
			slider.on('pause.slideshow', pause);
			slider.on('stop.slideshow', stop);
			slider.on('mouseenter', pause);
			slider.on('mouseleave', play);
		});
	};
	
		/*	Initialize slider Interval */
		$('.content-slider .pagination li:first-child').trigger("click");
		
		$('.meta-slider').on("click", function(event) {
			event.stopPropagation();
	
			if($(this).hasClass('slider-active')){
				$(this).addClass('slider-inactive').removeClass('slider-active');
				$('body').addClass('slider-inactive').removeClass('slider-active');
				$('.content-slider').trigger("stop.slideshow");
				
			} else {
				$(this).addClass('slider-active').removeClass('slider-inactive');
				$('body').addClass('slider-active').removeClass('slider-inactive');
				
				$('.content-slider').each(function(){
				
				if ($(this).hasClass('started'))  {
					$(this).trigger("play.slideshow");
				}
				else {
					$(this).addClass('started').slideshow();
				}
				
				});
			}
		});
		
		$('.meta-slider').on("mouseout", function(event) {
			$(this).removeClass('slider-inactive');
		});


		$('.meta-language').on('click', function(){
			var langContainer = $(this);
			if (langContainer.hasClass('box-active')) {
				langContainer.removeClass('box-active').addClass('box-inactive');
			} else {
				langContainer.removeClass('box-inactive').addClass('box-active');
			}
		});
		$('.meta-language').on('mouseout', function(){
			var langContainer = $(this);
			langContainer.removeClass('box-inactive');
		});


		/**
		/* Searchlabel modification
		*/
		
		var $searchBox = $('#search-box, #site-info-box-right');
		// console.log("nb searchbox "+ $searchBox.length );
		$searchBox.each(function(){
			var searchField = $(this).find('#searchbar');
			var searchLabel = $(this).find('label');
			var searchLabeltext = searchLabel.text();
			// console.log(searchLabeltext);
		
			if(searchField.val() != "") {
				searchLabel.text("");
			}
		
			searchField.on("focus", function(){
				searchLabel.text("");
			});
		
			searchField.on("blur", function(){
				if($(this).val() == "") {
					searchLabel.text(searchLabeltext);
				}
			});
		});
			
		
		/**
		 /* Gray tabs
		 */
		
		var $grayTabs = $('.gray-tabs');
		
		$grayTabs.each(function() {
			
			$(this).find('.text-box-toc a');
			
			$(this).find('.text-box-toc a').data("href");
			
			$(this).find('.text-box-section-group');
			
		});
		
		
		
		/**
		/* News-events teaser
		*/
		
		var $newsEventsContainer = $('.news-event');
		
		$newsEventsContainer.each(function(){
		
			var $newsEventsTabs = $(this).find('.tabbs ul li, .tabs ul li');
			var $newsEventsPanels = $(this).find('.content div');
			
			if ($(this).hasClass('only-events')) {
				$newsEventsTabs.filter('.news').hide().siblings('.events').addClass('active');
				$newsEventsPanels.filter('.news').hide().siblings('.events').addClass('active');
			} 
			else if ($(this).hasClass('only-news')) {
				$newsEventsTabs.filter('.events').hide().siblings('.news').addClass('active');
				$newsEventsPanels.filter('.events').hide().siblings('.news').addClass('active');
			} 
			else {	
				$newsEventsPanels.hide();
				$newsEventsTabs.first().addClass('active');
				$newsEventsPanels.first().fadeIn().addClass('active');
				
				$newsEventsTabs.click(function() {
					if (!$(this).hasClass('active')) {
						$(this).addClass('active').siblings().removeClass('active');
					
						if($(this).hasClass('news')) {
							$newsEventsPanels.filter('.events').fadeOut().removeClass('active');
							$newsEventsPanels.filter('.news').fadeIn().addClass('active');
						}
					
						if($(this).hasClass('events')) {
							$newsEventsPanels.filter('.news').fadeOut().removeClass('active');
							$newsEventsPanels.filter('.events').fadeIn().addClass('active');
						}
					};
				});
			}
		});
		
		
		/**
		/* Mediaplayer adaptation
		*/
		
		var $mediaPlayer = $('.mediaplayer');
		
		window.setTimeout( function() {
			$mediaPlayer.each(function(){
				var $flashMovie = $(this).find('object');
				var intialWidth = $flashMovie.width();
				var initialHeight = $flashMovie.height();
				
				var newWidth = $(this).width();
				var newHeight = newWidth * initialHeight / intialWidth;
				$flashMovie.css("width", newWidth + "px");
				$flashMovie.css("height", newHeight + "px");
					
			});
		}, 1000);
	
	});

}(window.jQuery);
