$(document).ready(function() {
	ProductFinder.doFilter();
	
	
	var button = $("whateverbutton");
	
	button.click(function() {
		var query = button.parent().find("input[type=text]").attr("value");
		ProductFinder.doFilter(query);
	});
	
	
	var selectionFilters = $(".filter > selection");
	
	selectionFilters.onChange(function() {
		changedFilter = $(this).attr("value");
		ProductFinder.doFilter(changedFilter);
	});
	
});

var ProductFinder = (function($, _this) {
	
	var products = $(".product");
	
	_this.doFilter = function(query) {
		$.each(products, function(key, product) {
			product = $(product);
			var material = getMaterial(product);
			var applicationTypes = getApplicationTypes(product);
			var data = [material, applicationTypes];

			$.each(data, function(key, value) {
				if (value.indexOf(query)) {
					showProduct(product);
				}
			});
		});
	};
	
	function showProduct(product) {
		product.show();
	}
	
	function getMaterial(product) {
		
	}
	
	function getApplicationTypes(product) {
		// return Array
	}
	
	function getType(product) {
		
	}

	function getDimension(product) {
		
	}

	return _this;
	
}(jQuery, {}));
