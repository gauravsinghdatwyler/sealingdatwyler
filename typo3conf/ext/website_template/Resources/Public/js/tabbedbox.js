! function($) {		
	
	$.fn.tabbedbox = function(options) {
		
		this.each(function() {
			
			var settings = $.extend({
				speed : 500,
				tabbedelement : $(this),
				tabs : $(this).find('.text-box-toc li a'),
				panelcontainer : $(this).find('.text-box-section-group'),
				minVisibleHeight : "56px",
				selection : "standard"
			}, options);
		
		
			var selectionMode = settings.selection;
		
			var init = function() {
				
				/* set height of the panels to the same value */
				
				/*
				var maxPanelHeight = 0;
				
				settings.panelcontainer.find('> div').each(function(){
					var thatHeight = $(this).outerHeight(); 
					if (thatHeight > maxPanelHeight) {
						maxPanelHeight = thatHeight;
					}
				});
				
				settings.panelcontainer.find('> div').css("height", maxPanelHeight);
				*/
				
				
				/* Display first tab */
				
				settings.tabs.first().trigger('open.panel');
				
				if(selectionMode == "random") {
					var nbTabs = settings.tabs.length;
					var activeTabIndex = Math.floor(Math.random()*nbTabs);
					settings.tabs.eq(activeTabIndex).trigger('open.panel');
				}
				else {
					settings.tabs.first().trigger('open.panel');
				};		
			};
		
			var open = function(e) {
				e.preventDefault();
				settings.tabs.removeClass('active');
				$(this).addClass('active');
				
				var id = $(this).attr('href');
				// console.log("trigger open: " + id);
				
				var activePanel = settings.panelcontainer.find(id);
				activePanel.siblings().hide();
				activePanel.fadeIn(500);
			};
		
			var close = function(e) {
				e.preventDefault();
				$(this).removeClass('active');
				var id = $(this).attr('href');
				settings.panelcontainer.find(id).fadeOut(1000);
			};
			
			
			settings.tabs.on('click', open);
			settings.tabs.on('open.panel', open);
			settings.tabs.on('close.panel', close);
			
			init();
		
		});
	};


}(window.jQuery);
