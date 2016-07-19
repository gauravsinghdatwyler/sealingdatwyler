$(document).ready(function() {

	var doAjax = function() {
		var application=type=dimension=material=psetconf=0, query="";
		var loadingLabel = "Loading...";
		query = $("#inquery").val();
		application = $("#selapplication").val(); type = $("#seltype").val();
		dimension = $("#seldimension").val(); material = $("#selmaterial").val();
		psetconf = $("#psetconf").val();

		var searchedString = '';
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedString += '(';
		}
		if(application!="") {
			searchedString += ' '+ $("#selapplication option:selected").text();
		}
		if(type!="") {
			searchedString += ' '+ $("#seltype option:selected").text();	
		}
		if(dimension!="") {
			searchedString += ' '+ $("#seldimension option:selected").text();	
		}
		if(material!="") {
			searchedString += ' '+ $("#selmaterial option:selected").text();	
		}
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedString += ' )';
		}

		$.ajax({
		    url:'index.php',
		    type:'POST',
			dataType:'html',
		    data:{
		        eID:'ajaxProductFinder',
				tx_productfinder_pi1: {
					action:'searchAjax',
					controller:'Products',
					arguments: {
						query: query,
						application: application,
						type: type,
						dimension: dimension,
						material: material,
						psetconf: psetconf
					}
				},
		    },
			beforeSend: function() {
				$(".status.filter").html(loadingLabel);
			},
		    success:function(result) {
				$(".product-finder").find(".content").html(result);
				$(".status.filter").html($(document).find("#productFinderResCnt").text() + " <span style='font-size: 0.6em;'>"+searchedString+"</span>");
		    },
			complete:function() {
                if($(".status.filter").html()==loadingLabel) {
                	$(".status.filter").html('');
                }
            },
			error:function(error) {
				console.log(error);
	       }
		});
	};

	$(".product_finder .filter select").on("change",function(e) {
		e.preventDefault();
		doAjax();
	});

	$("#searchAjax").on("submit",function(e) {
		e.preventDefault();
		doAjax();
	});

	$("#resetbtn").on("click",function(e) {
		doAjax();
	});

	$(function() {
		var application=type=dimension=material=0;	
		application = $("#selapplication").val(); type = $("#seltype").val();
		dimension = $("#seldimension").val(); material = $("#selmaterial").val();
		var searchedStringL = '';
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedStringL += '(';
		}
		if(application!="") {
			searchedStringL += ' '+ $("#selapplication option:selected").text();
		}
		if(type!="") {
			searchedStringL += ' '+ $("#seltype option:selected").text();	
		}
		if(dimension!="") {
			searchedStringL += ' '+ $("#seldimension option:selected").text();	
		}
		if(material!="") {
			searchedStringL += ' '+ $("#selmaterial option:selected").text();	
		}
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedStringL += ' )';
			doAjax();
			$(".loadmore-container").hide();
		}
		$(".status.filter").html($(document).find("#productFinderResCntL").text() + " <span style='font-size: 0.6em;'>"+searchedStringL+"</span>");
	});

	$("#loadmore-button").on("click",function() {

		var application=type=dimension=material=0;	
		application = $("#selapplication").val(); type = $("#seltype").val();
		dimension = $("#seldimension").val(); material = $("#selmaterial").val();
		var searchedStringL = '';
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedStringL += '(';
		}
		if(application!="") {
			searchedStringL += ' '+ $("#selapplication option:selected").text();
		}
		if(type!="") {
			searchedStringL += ' '+ $("#seltype option:selected").text();	
		}
		if(dimension!="") {
			searchedStringL += ' '+ $("#seldimension option:selected").text();	
		}
		if(material!="") {
			searchedStringL += ' '+ $("#selmaterial option:selected").text();	
		}
		if(application!="" || type!="" || dimension!="" || material!="") {
			searchedStringL += ' )';
		}
		$(".status.filter").html($(document).find("#productFinderResCntL").text() + " <span style='font-size: 0.6em;'>"+searchedStringL+"</span>");
	});
});