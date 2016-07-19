$(document).ready(function() {

	var doAjax = function() {
		var country=jobfunction=psetconf=0;
		country = $("#country").val();
		jobfunction = $("#jobfunction").val(); 
		psetconf = $("#psetconf").val();
		
		$.ajax({
		    url:'index.php',
		    type:'POST',
			dataType:'html',
		    data:{
		        eID:'ajaxJobsFinder',
				tx_jobs_pi1: {
					action:'searchAjax',
					controller:'Jobs',
					arguments: {
						country: country,
						jobfunction: jobfunction,
						psetconf: psetconf
					}
				},
		    },
		    success:function(result) {			
				$(".jobfinder").find(".content").html(result);
				$(".status.filter").html($(document).find("#jobsResCnt").text());
		    },
			error:function(error) {
				console.log(error);
	       }
		});
	};

	$(".jobs_filter .filter select").on("change",function(e) {
		e.preventDefault();
		doAjax();
	});
});
