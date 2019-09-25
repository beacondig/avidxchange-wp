jQuery(document).ready(function($) {
	
	var alphaSelections = [];
	$(".alphalist a").on("click", function(e) {
        e.preventDefault();
		
		//hide 'no results' section as only letters with results are options
		$(".noresultsdiv").addClass('hnores');
		$(".intgbg").addClass('hnores');
		
		//Load immediately so it doesn't wait until scroll
		$(function() {
			$("img.lazy").lazyload({
				event : "alphasort"
			});
		});
		var timeout = setTimeout(function() {
			$("img.lazy").trigger("alphasort")
		}, 50);
		
		//CLEAR ARRAY OF CHOSEN LETTERS
		alphaSelections = [];
		
		//REMOVE SEARCH FIELD CONTENT
		$('#intg-search-input').val("");

        // REMOVE ALL CLASSES THEN ADD TOGGLE CLASS
		$(".alphachosen").removeClass("alphachosen");
        $(this).addClass("alphachosen");

        // GET ALPHA NAME
        var alphaSelection = $(this).attr("data-letter");
		alphaSelections.push(alphaSelection);
		
		// HIDE INTEGRATIONS
        $(".integrations-wrapper").find(".integration-item").hide();

        // SHOW INTEGRATIONS BASED ON SELECTION
        for (var i = 0; i < alphaSelections.length; i++) {
            var alphaType = alphaSelections[i];
			if(alphaType == 'ALL') {
				$(".integrations-wrapper").find(".integration-item").show();
			} else {
            	$(".integrations-wrapper").find("[data-letter='" + alphaType + "']").show();
			}
        }
		
	});
	
	
	  // INTEGRATIONS SEARCH
	  var timeoutID = null;
	
		function findIntg(str) {
			var searchText = str;
		
		//Load immediately so it doesn't wait until scroll
		$(function() {
		  $("img.lazy").lazyload({
			event : "alphasort"
		  });
		});
		var timeout = setTimeout(function() {
		  $("img.lazy").trigger("alphasort")
		}, 50);
		
		// REMOVE ALL CLASSES THEN ADD TOGGLE CLASS
		$(".alphachosen").removeClass("alphachosen");
		
			// SHOW ALL INTEGRATIONS TO START
			// $(".integrations-wrapper").find(".integration-item").show();
			
			//Make no results display show until a result is found
			$(".noresultsdiv").removeClass('hnores');
			$(".intgbg").removeClass('hnores');
			
			// FIND EACH VISIBLE DIV AND SEARCH
			$('.integration-item').each(function() {
		  //GET THE CURRENT ITEM NAME
		  var searchShow = $(this).attr("data-integration");
				if (searchShow.toUpperCase().indexOf(searchText.toUpperCase()) != -1) {
					$(this).show();
					$(".noresultsdiv").addClass('hnores');
				}
				else {
					$(this).hide();
				}
			});
	
		}
	
		$('#intg-search-input').keyup(function(e) {
		  clearTimeout(timeoutID);
		  timeoutID = setTimeout(findIntg.bind(undefined, e.target.value), 300);
		});
	
		$('#intg-search-input').blur(function()
		{
    			tmpval = $(this).val();
				if(tmpval == '') {
        			$(".intgbg").addClass('hnores');
				}
       
		});
	
});