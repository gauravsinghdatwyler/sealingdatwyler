! function($) {		
	
	$.fn.contactFilter = function(options) {
			
		var defaults = $.extend({
			limit : 18,
			searchArea : ".filters"
		}, options);
		

		var batchNb = defaults.limit;
		var batchStart = 0;
		var batchEnd = batchStart + batchNb;
			
		var $selectionFilters = $(this).find(".filter select");
	
	
		// Set variables
		var $contactFinder = $(this);
		
		if ($contactFinder.find('.content-hidden').length == 0) {
			var hiddenContent = $contactFinder.find('.content').clone(true, true);
			hiddenContent.removeClass('content').addClass('content-hidden');
			$contactFinder.append(hiddenContent);
		}
		
		var $hiddenContainer = $contactFinder.find('.content-hidden');
		// console.log("hidden Container " +$hiddenContainer.length);
		var $vcards = $hiddenContainer.find('.vcard');
		
		
		var continentsFilter = $contactFinder.find('.country').find('select');
		// console.log(continentsFilter.length);
		
		var $vcardsContainer = $contactFinder.find(".content");
		var $statusMessageBox = $contactFinder.find(".status").empty();
		
		var $loadMoreContainer = $('<div class="loadmore-container"><div class="button"><a id="loadmore-button">Load more</a></div></div>');
		$loadMoreContainer.appendTo($contactFinder);
		
		
		
		
		var doFilter = function() {
					
			/* reset */
			var statusMessage = "";
			$vcards.removeClass('exclude').removeClass('hidden');
			$vcards.closest('div').removeClass('selected-ancestor');
			$loadMoreContainer.hide();
			
			
			/* get Values of query */
			var query = getSelectValues();
			var activeFilter = {};
			// console.log("continent requested: " + query["continent"]);
			
			
			$.each($vcards, function(key, continent) {
				
				var $vcard = $(this);
				var dataAttributes = {};
				
				dataAttributes["country"] = $(this).data('country');
				
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
										$vcard.addClass('exclude');
									}							
								}
							
					});		
				
				
				
			});
			
			var $selection = $vcards.not('.exclude');
			var nbResults = $selection.length;
			
			// console.log('nbResuts: ' + nbResults);
			// console.log('batchEnd: ' + batchEnd);
			if (nbResults > batchEnd) {
				
				$loadMoreContainer.show();
				
				$selection.each(function(index, element) {
						if (index > batchEnd-1) {
							$(this).addClass('hidden');
						}
				});
			}
			
			$clonedContent = $selection.clone(true, true);
			$clonedContent.find('.exclude').remove();
			
			$vcardsContainer.empty().append($clonedContent);
			
			$statusMessageBox.html("");
				
				
			
			statusMessage = nbResults + " ";
			
			var nbActiveFilters = 0;
			var activeFilters = "";
			
			if(nbResults > 1) {
				statusMessage += " contacts ";
			} else {
				statusMessage += " contact ";
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
			
			continentsFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) $(this).attr("selected", "selected");
			});
			
			continentsFilter.trigger('update');		
		}
		
		
		function getSelectValues () {
			
			var data = {};
			
			data["country"] = continentsFilter.find('option:selected').val();
			// console.log("continentFilter.find('option:selected').val()" + continentsFilter.find('option:selected').val());
			
			return data;
		}
		
		doFilter();
			
	};
	
}(window.jQuery);
