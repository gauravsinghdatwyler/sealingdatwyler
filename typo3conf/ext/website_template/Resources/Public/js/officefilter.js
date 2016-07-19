! function($) {		
	
	$.fn.officeFilter = function(options) {
			
		var defaults = $.extend({
			limit : 18,
			searchArea : ".filters"
		}, options);
		

		var batchNb = defaults.limit;
		var batchStart = 0;
		var batchEnd = batchStart + batchNb;
			
		var $selectionFilters = $(this).find(".filter select");
	
	
		// Set variables
		var $officeFinder = $(this);
		
		if ($officeFinder.find('.content-hidden').length == 0) {
			var hiddenContent = $officeFinder.find('.branchOffices').addClass('content-hidden');
			var content = $('<div class="contacts branchOffices content"></div>').insertBefore(hiddenContent);
		}
		
		var $hiddenContainer = $officeFinder.find('.content-hidden');
		/* console.log("hidden Container " +$hiddenContainer.length); */
		var $offices = $hiddenContainer.find('.branchOffice');
		
		
		var industryFilter = $officeFinder.find('.filter .industries select');
		/* console.log(industryFilter.length); */
		
		var $officesContainer = $officeFinder.find(".content");
		/* console.log("Office Container " +$hiddenContainer.length); */
		var $statusMessageBox = $officeFinder.find(".status").empty();
		
		var $loadMoreContainer = $('<div class="loadmore-container"><div class="button"><a id="loadmore-button">Load more</a></div></div>');
		$loadMoreContainer.appendTo($officeFinder);
		
		
		
		
		var doFilter = function() {
					
			/* reset */
			var statusMessage = "";
			$offices.removeClass('exclude').removeClass('hidden');
			$loadMoreContainer.hide();
			
			
			/* get Values of query */
			var query = getSelectValues();
			var activeFilter = {};
			// console.log("Country requested: " + query["country"] + " function requested: " + query["function"]);
			
			
			$.each($offices, function(key, element) {
				
				var $office = $(this);
				var dataAttributes = {};
				dataAttributes["industry"] = $office.data("industry");
				/* console.log("Branch office value " + dataAttributes["industry"]); */
				
				/*
				var dataAttributesArray = dataAttributes["application-type"].split(",");
				console.log("dataAttributesArray"+dataAttributesArray[0]);
				*/
				
					$.each(query, function(key, value) {
							
							// console.log("dataAttributeValue: "+ dataAttributes[key ]);
							// console.log("QueryKey: " + key + " QueryValue: " + value);
							
									
								if (value != "none" && value != undefined) {
									activeFilter[key] = value;  /* for message Box */
									
									/* filter */
									if (dataAttributes[key].indexOf(value) == -1) {
										$office.addClass('exclude');
										/* console.log("Dismatch"); */
									}
								}
							
					});		

			});
			
			var $selection = $offices.not('.exclude');
			var nbResults = $selection.length;
			
			/* console.log('nbResuts: ' + nbResults); */
			/* console.log('batchEnd: ' + batchEnd); */
			if (nbResults > batchEnd) {
				
				$loadMoreContainer.show();
				
				$selection.each(function(index, element) {
						if (index > batchEnd - 1) {
							$(this).addClass('hidden');
						}
				});
			}
			
			/* reset and select of parents elements */
			$offices.closest('.continent').removeClass('selected-ancestor');
			$selection.closest('.continent').addClass('selected-ancestor');
			
			$clonedContent = $hiddenContainer.find('.selected-ancestor').clone(true, true);
			$clonedContent.find('.exclude').remove();
			
			$officesContainer.empty().append($clonedContent);
			
			$statusMessageBox.html("");
				
				
			
			statusMessage = nbResults + " ";
			
			var nbActiveFilters = 0;
			var activeFilters = "";
			
			if(nbResults > 1) {
				statusMessage += " locations/production sites ";
			} else {
				statusMessage += " location/production site ";
			}
			
			if(nbActiveFilters > 0){
				statusMessage += ' <span style="font-size: 0.6em;">( ' +  activeFilters + ')</span>';				
			}
			
			$statusMessageBox.html(statusMessage);
			
		};
		
		
		
		
		
		/**
		/* Event listener
		*/
		
		
	
		$selectionFilters.on("change", function() {
			doFilter();
			resetBatchNb();			
		});
		
		$('#loadmore-button').click(function(e){
			e.preventDefault();
			batchEnd =  batchEnd + batchNb;
			doFilter();				
		});
			
		/**
		/* Functions
		*/
		
		function resetBatchNb() {
			batchEnd = batchNb;			
		}

		function resetSelectValues () {
			
			var textToSelect = "none";
			indusstryFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) { $(this).attr("selected", "selected"); }
			});
			
			industryFilter.trigger('update');		
		}
		
		
		function getSelectValues () {
			
			var data = {};
			data["industry"] = industryFilter.find('option:selected').val();

			/* console.log('Select value '+ data["industry"]); */
			return data;
		}
		
		doFilter();
			
	};
	
}(window.jQuery);
