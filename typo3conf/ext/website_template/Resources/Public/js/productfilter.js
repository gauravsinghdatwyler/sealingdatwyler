! function($) {		
	

	$.fn.productFilter = function(opts) {
			
		var defaults = {
			batchNb : 18,
			searchArea : ".filters"
		};
		
		var opts = $.extend(defaults, opts);
		
		var batchNb = 18;
		var batchStart = 0;
		var batchEnd = batchStart + batchNb;
			
		var $selectionFilters = $(this).find(".filter select");
	
		// Set variables
		var applicationFilter = $(this).find('.application-type').find('select').addClass('.application-types').removeClass('.application-type'); /* Robert */
		var typeFilter = $(this).find('.type').find('select');
		var dimensionFilter = $(this).find('.dimension').find('select');
		var materialFilter = $(this).find('.material').find('select');
		var searchBox = $(this).find('.search');
		var searchInput = $(this).find('.search').find('input[type="text"]');
		var searchSubmit = $(this).find('.search').find('input[type="submit"]');
		var $productsContainer = $(this).find(".content");
		var $statusMessageBox = $(this).find(".status").empty();
		var $products = $(this).find('.products .product');
		
		
		$productFinder = $(this);
		var $loadMoreContainer = $('<div class="loadmore-container"><div class="button"><a id="loadmore-button">Load more</a></div></div>');
		$loadMoreContainer.appendTo($productFinder);
		
		var doFilter = function() {
			
			var searchQuery = getSearchQuery();
			
			function getSearchQuery(){
				if(searchBox.hasClass('active')) {
					return searchInput.val();
				} else {
					return "undefined";	
				}
			};
			// console.log("var searchQuery: " + searchQuery);
			
			/* reset */
			var statusMessage = "";
			$products.removeClass('exclude').removeClass('hidden');
			$loadMoreContainer.hide();
			var query = getSelectValues();
			/*var searchString = searchInput.val();*/
			var activeFilter = {};
			// console.log("query: application types: " + query["application-type"]);
			
			
			
			
			
			
			$.each($products, function(key, product) {
				
				
				var $product = $(this);
				var dataAttributes = {};
				
				dataAttributes["application-types"] = $product.data("application-types");
				dataAttributes["type"] = $product.data("type");
				dataAttributes["dimension"] = $product.data("size");
				dataAttributes["material"] = $product.data("material");
				dataAttributes["name"] = $product.data("name");
				dataAttributes["description"] = $product.data("description");
				
				/*
				var dataAttributesArray = dataAttributes["application-type"].split(",");
				console.log("dataAttributesArray"+dataAttributesArray[0]);
				*/
				
				if(searchQuery != "undefined" && searchQuery != "") {
						
						var $thisProduct = $(this);
						
						var productText = "";
						productText += dataAttributes["application-types"] + dataAttributes["type"] + dataAttributes["dimension"] + dataAttributes["material"] + dataAttributes["name"];
						productText += productText.toLowerCase();
						productText += $thisProduct.data("description");
						
						/*
						var reg = new RegExp(" ", "g");
						productText = productText.replace(reg,"").toLowerCase();
						*/
						
						/*
						console.log("productText: "+productText);
						console.log("searchQuery: "+searchQuery);
						*/
						
						if (productText.indexOf(searchQuery) > -1) {
							
							$thisProduct.removeClass('exclude');
							/* $product.addClass(key+'-selected'); */
						} 
						else {
							$thisProduct.addClass('exclude'); // console.log("searchQuery dismatches !");
						}
						
					
						$.each(query, function(key, value) {
							/* console.log("QueryKeyValue: "+ value); console.log("dataAttributeValue: "+ dataAttributes[key]);	*/
									
								if (value != "none" && value != undefined) {
									
									/* filter */
									if (dataAttributes[key].indexOf(value) > -1) {
										/* $product.addClass(key+'-selected'); */
									} else {
										$product.addClass('exclude');
									}
									activeFilter[key] = value; /* console.log("activeFilter"+activeFilter[key]); */  // message Box^
								}
						});
						
						
				}
				
				
				

					$.each(query, function(key, value) {
						/* console.log("QueryKeyValue: "+ value); console.log("dataAttributeValue: "+ dataAttributes[key]);	*/
								
							if (value != "none" && value != undefined) {
								
								/* filter */
								if (dataAttributes[key].indexOf(value) > -1) {
									/* $product.addClass(key+'-selected'); */
								} else {
									$product.addClass('exclude');
								}
								
								activeFilter[key] = value;
								/* console.log("activeFilter"+activeFilter[key]); */
								/* message Box */
								
							}
					});
					
					
			});
			
			
			var $selection = $products.not('.exclude');
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
			
			var $selection = $products.not('.exclude, .hidden').clone(true);
			
			$productsContainer.empty().append($selection);
			$statusMessageBox.html("");
				
				
			
			statusMessage = nbResults + " ";
			
			var nbActiveFilters = 0;
			var activeFilters = "";
			
			$.each(activeFilter, function(key, value) {
				// console.log("key pour message: " + key);
				if(key == "application-type" && value != "none") {
					statusMessage += value;					
				} else {
					activeFilters += value + " ";
					nbActiveFilters ++;
				}
			});
			
			if(nbResults > 1) {
				statusMessage += " products ";
			} else {
				statusMessage += " product ";
			}
			
			if(nbActiveFilters > 0){
				statusMessage += ' <span style="font-size: 0.6em;">( ' +  activeFilters + ')</span>';				
			}
			
			$statusMessageBox.html(statusMessage);
			
			
			/* console.log(query); */
		};
		
		
		
		
		
		/**
		/* Event listener
		*/
		
		
	
		$selectionFilters.on("change", function() {
			doFilter();
			resetBatchNb();			
		});
		
		searchInput.keyup(function(event) {

			event.stopPropagation();
			var keynum;
	
			if (window.event) // IE
				keynum = event.keyCode;
			if (event.which) // Other browser
				keynum = event.which;
			// console.log("Keynum: " + keynum);
			switch (keynum)
			{
			case 13:
				event.preventDefault();
				event.stopPropagation();
				if (searchInput.val() != "") {
					resetBatchNb();
					searchBox.addClass('active');
					validateQuery();
				}
				break;
			default:	
			}; // Endof Switch
		});
		
		searchSubmit.click(function(e) {
			e.stopPropagation();
			if(searchBox.hasClass('active')) {
				resetBatchNb();
				searchBox.removeClass('active');
				searchInput.val("");	
				doFilter();
			} else {
				batchEnd = batchNb;
				searchBox.addClass('active');
				validateQuery();
			}
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
		
		function displayProducts() {
			
			var $selection = $products.not('.exclude').clone(true);
			$productsContainer.empty().append($selection);	
			
		}



		function resetSelectValues () {
			
			var textToSelect = "none";
			applicationFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) { $(this).attr("selected", "selected"); }
			});
			typeFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) $(this).attr("selected", "selected");
			});
			dimensionFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) $(this).attr("selected", "selected");
			});
			 materialFilter.find('option').each(function (i, el) {
				if ($(this).val() == textToSelect ) $(this).attr("selected", "selected");
			});
			
			applicationFilter.trigger('update');
			typeFilter.trigger('update');
			dimensionFilter.trigger('update');
			materialFilter.trigger('update');
			
		}
		
		
		function getSelectValues () {
			
			var data = {};
			data["application-types"] = applicationFilter.find('option:selected').val();
			data["type"] = typeFilter.find('option:selected').val();
			data["dimension"] = dimensionFilter.find('option:selected').val();
			data["material"] = materialFilter.find('option:selected').val();
			
			return data;
		}
		
		function validateQuery() {
				var queryInput = searchInput.val();
				// console.log("search clicked, queryInput: " + queryInput);
				if(queryInput.length > 3) {
					$statusMessageBox.html("");
					doFilter();
				} else if (queryInput.length == 0){
					$statusMessageBox.html("");
					doFilter();
				} else {
					$statusMessageBox.html("Give at least 4 Characters");
				}
		};
			
	};
	

}(window.jQuery);
