! function($) {		
	
	$.fn.jobFilter = function(options) {
			
		var defaults = $.extend({
			limit : 18,
			searchArea : ".filters"
		}, options);
		

		var batchNb = defaults.limit;
		var batchStart = 0;
		var batchEnd = batchStart + batchNb;
			
		var $selectionFilters = $(this).find(".filter select");
	
	
		// Set variables
		var $jobFinder = $(this);
		
		if ($jobFinder.find('.content-hidden').length == 0) {
			var hiddenContent = $jobFinder.find('.content').clone(true, true);
			hiddenContent.removeClass('content').addClass('content-hidden');
			$jobFinder.append(hiddenContent);
		}
		
		var $hiddenContainer = $jobFinder.find('.content-hidden');
		// console.log("hidden Container " +$hiddenContainer.length);
		var $jobs = $hiddenContainer.find('.job, .list-item');
		
		
		var countryFilter = $jobFinder.find('.countries').find('select');
		var functionFilter = $jobFinder.find('.function').find('select');
		// console.log(countryFilter.length);
		
		var $jobsContainer = $jobFinder.find(".content");
		var $statusMessageBox = $jobFinder.find(".status").empty();
		
		var $loadMoreContainer = $('<div class="loadmore-container"><div class="button"><a id="loadmore-button">Load more</a></div></div>');
		$loadMoreContainer.appendTo($jobFinder);
		
		
		
		
		var doFilter = function() {
					
			/* reset */
			var statusMessage = "";
			$jobs.removeClass('exclude').removeClass('hidden');
			$jobs.closest('div').removeClass('selected-ancestor');
			$loadMoreContainer.hide();
			
			
			/* get Values of query */
			var query = getSelectValues();
			var activeFilter = {};
			// console.log("Country requested: " + query["country"] + " function requested: " + query["function"]);
			
			
			$.each($jobs, function(key, country) {
				
				var $job =  $(this);
				var dataAttributes = {};
				
				dataAttributes["function"] = $(this).data('function');
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
										$job.addClass('exclude');
									}							
								}
							
					});		
				
				
				
			});
			
			var $selection = $jobs.not('.exclude');
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
			
			
			var $selection = $jobs.not('.exclude, .hidden');
			
			/* select of parents elements */
			$selection.each(function(){
				$(this).closest('div').addClass('selected-ancestor');
			});
			
			$clonedContent = $hiddenContainer.find('.selected-ancestor').clone(true, true);
			$clonedContent.find('.exclude').remove();
			
			$jobsContainer.empty().append($clonedContent);
			
			$statusMessageBox.html("");
				
				
			
			statusMessage = nbResults + " ";
			
			var nbActiveFilters = 0;
			var activeFilters = "";
			
			if(nbResults > 1) {
				statusMessage += " jobs ";
			} else {
				statusMessage += " job ";
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
			countryFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) { $(this).attr("selected", "selected"); }
			});
			functionFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) $(this).attr("selected", "selected");
			});
			
			countryFilter.trigger('update');
			functionFilter.trigger('update');			
		}
		
		
		function getSelectValues () {
			
			var data = {};
			
			data["country"] = countryFilter.find('option:selected').val();
			data["function"] = functionFilter.find('option:selected').val();
			// console.log("countryFilter.find('option:selected').val()" + countryFilter.find('option:selected').val());
			// console.log("functionFilter.find('option:selected').val()" + functionFilter.find('option:selected').val());
			
			return data;
		}
		
		doFilter();
			
	};
	
}(window.jQuery);
