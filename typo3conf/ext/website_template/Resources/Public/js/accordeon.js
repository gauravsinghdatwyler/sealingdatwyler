! function($) {		
	
	
	$.fn.accordeon = function(options) {
		
		this.each(function() {
			
			var settings = $.extend({
				speed : 500,
				accordeon : $(this),
				panelSelector : $(this).find('.teaser-accordeon'),
				minVisibleHeight : "56px"
			}, options);
			
			
			var init = function() {
				settings.panelSelector.trigger('close.panel');

				$(document).ready(function() {
					
					/*=== Added By Developer ===*/
					
					setTimeout(function(){
						var scrollToTop = $('.news-elem').offset().top;

						$('html, body').stop().animate({
							'scrollTop': scrollToTop
						}, 500);
				     }, 2000);
				     
				     /*=== Added By Developer ===*/
					
					settings.panelSelector.trigger('close.panel');

					if(settings.panelSelector.length == 1) {
						var firstAccordeonTeaser = settings.panelSelector.first().trigger('close.panel');
						var contentHeight = firstAccordeonTeaser.find('.info').outerHeight() + firstAccordeonTeaser.find('.content').outerHeight();
						firstAccordeonTeaser.addClass('open').animate({height: contentHeight});
					}

					handleLinkParam();
					
					
				     
				});
				
			};

			var handleLinkParam = function() {
				var wantedKey = getURLParameter("key");
				var accordionElements = $(".teaser-accordeon");

				$.each(accordionElements, function(key, element) {
					element = $(element);
					var teaserKey = element.data("accordionkey");

					if (wantedKey == teaserKey) {
						element.trigger('open.panel');
					}
				});
			};

			var getURLParameter = function(sParam) {
				var paramName = "";
				var sPageURL = window.location.search.substring(1);
				var sURLVariables = sPageURL.split('&');

				for (var i = 0; i < sURLVariables.length; i++) {
					var sParameterName = sURLVariables[i].split('=');
					if (sParameterName[0] == sParam) {
						paramName = sParameterName[1];
					}
				}

				return paramName;
			};

			var open = function() {
				var contentHeight = $(this).find('.info').outerHeight() + $(this).find('.content').outerHeight();

				$(this).addClass('open').animate({
					height: contentHeight
				}, settings.speed, function() {
					var scrollToTop = $(this).offset().top;

					$('html, body').stop().animate({
						'scrollTop': scrollToTop
					}, settings.speed);
				});
			};

			var close = function(e) {
				var closedHeight = $(this).find('.info h2').outerHeight();
				if (closedHeight == undefined) { 
					closedHeight = 56;
				}
				$(this).removeClass('open').animate({height: closedHeight});
				
			};

			settings.panelSelector.on('open.panel', open);
			settings.panelSelector.on('close.panel', close);

			init();
		});
	};


}(window.jQuery);
