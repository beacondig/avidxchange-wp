(function($) {

    var newsletterHtml = $(".event-newsletter").detach();
    //console.log(newsletterHtml);
    var paginationLimit = 12;
    var startPage = 1;
    var endPage = paginationLimit;


    pagination();
    eventClear();
    eventNewsletter();

    var eventSelections = [];
    // EVENT MENU CATEGORY CLICK
    $(".event-cat-menu a").on("click", function(e) {
        e.preventDefault();
		
		//show 'no results' section until a event is found
		if(!($(this).attr("data-event-category") == 'most-recent')) {
			$(".noresultsdiv").removeClass('hnores');
		}
		
		//REMOVE SEARCH FIELD CONTENT
		$('#event-search-input').val("");

        // ADD TOGGLE CLASS
        $(this).toggleClass("e-cat-active");

        // GET CATEGORY NAME
        var eventSelection = $(this).attr("data-event-category");
        if (eventSelections.indexOf(eventSelection) == -1) {
            // DOESN'T EXIST ADD TO ARRAY
            eventSelections.push(eventSelection);
        }
        else {
            // EXISTS -- REMOVE FROM ARRAY
            eventSelections.splice(eventSelections.indexOf(eventSelection), 1);
        }


        // HIDE EVENTS
        $(".event-wrapper").find(".event").hide();
		$(".event").removeClass('oneexists');

        // SHOW EVENTS BASED ON SELECTION
        for (var i = 0; i < eventSelections.length; i++) {
            var eventType = eventSelections[i];

			$(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();
			$(".event-wrapper").find("[data-event-cat='" + eventType + "']").addClass('oneexists');
			
            if($(".oneexists").length > 0) {
				$(".noresultsdiv").addClass('hnores');	
			}

        }


        // IF NO SELECTIONS EXISTS, SHOW ALL EVENTS
        if (eventSelections.length <= 0) {
			//hide 'no results' section as all results are showing
			$(".noresultsdiv").addClass('hnores');
			//show all
            $(".event-wrapper").find(".event").show();
        }



        // IF MOST RECENT IS ACTIVE SORT BY DATE
        if (eventSelections.indexOf("most-recent") != -1) {

            if (eventSelections.length === 1) {
                $(".event-wrapper").find(".event").show();
            }

            $(".event").sort(function(a, b) {
                return $(a).attr("data-event-date") < $(b).attr("data-event-date");
            }).each(function() {
                $(".event-wrapper").prepend(this);
            });


        }
        else {

            $(".event").sort(function(a, b) {
                return $(a).attr("data-event-id") < $(b).attr("data-event-id");
            }).each(function() {
                $(".event-wrapper").prepend(this);
            });

        }



        eventClear();
        eventNewsletter();
        pagination();



    });

    // EVENT SEARCH
	$("#event-search").on("submit", function(e) {
        e.preventDefault();
        var searchText = $(this).find("input").val();

        // KEEP CATEGORY SELECTIONS IN PLACE WHEN SEARCHING
        for (var i = 0; i < eventSelections.length; i++) {
            var eventType = eventSelections[i];

            $(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();

        }

        if (eventSelections.length <= 0) {
            $(".event-wrapper").find(".event").show();

        }

		//Make no results display show until a result is found
		$(".noresultsdiv").removeClass('hnores');
        // FIND EACH VISIBLE DIV AND SEARCH
        $('.event:visible').each(function() {
            if ($(this).text().toUpperCase().indexOf(searchText.toUpperCase()) != -1) {
                $(this).show();
				$(".noresultsdiv").addClass('hnores');
            }
            else {
                $(this).hide();
            }
        });

        eventClear();
        eventNewsletter();
        pagination();

    });
	
	var timeoutED = null;
	function findEVENT(str) {
        var searchText = str;

        // KEEP CATEGORY SELECTIONS IN PLACE WHEN SEARCHING
        for (var i = 0; i < eventSelections.length; i++) {
            var eventType = eventSelections[i];

            $(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();

        }

        if (eventSelections.length <= 0) {
            $(".event-wrapper").find(".event").show();

        }

		//Make no results display show until a result is found
		$(".noresultsdiv").removeClass('hnores');
        // FIND EACH VISIBLE DIV AND SEARCH
        $('.event:visible').each(function() {
            if ($(this).text().toUpperCase().indexOf(searchText.toUpperCase()) != -1) {
                $(this).show();
				$(".noresultsdiv").addClass('hnores');
            }
            else {
                $(this).hide();
            }
        });

        eventClear();
        eventNewsletter();
        pagination();
	}
    
	
	$('#event-search').keyup(function(e) {
		clearTimeout(timeoutED);
		timeoutED = setTimeout(findEVENT.bind(undefined, e.target.value), 300);
	});


	//determine modulus number
	function setupMods () {
	  var mdo;
	  if ( window.innerWidth <= 991 ) {
		  mdo = 2;
	  } else {
		  mdo = 3;
	  }
	  return mdo;
	}

    // SPACING FOR EVENTS
    function eventClear() {
        $(".clear-events").remove();


        $('.event').filter(':visible').each(function(i) {
			var mdo = setupMods();
			
            var modulus = (i + 1) % mdo;
            if (modulus === 0) {
                /* $(this).after("<div class='clear-events'></div>"); */
            }
        });
    }

	// EVENTS NEWSLETTER SECTION FUNCTION
    function eventNewsletter() {
		var mdo = setupMods();
		
        $(".event-newsletter").remove();
        $('.event').filter(':visible').each(function(i) {
            var modulus = (i + 1);
            if (modulus === mdo) {
                $(this).after(newsletterHtml);
            }
        });
    }


    // PAIGNATION
    function pagination() {
        var eventsItem = $(".event:visible");
        var visibleEvents = $(".event:visible").length;
        var numberOfPages = Math.ceil(visibleEvents / paginationLimit);
        var paginationBar = '';
        var paginationCounter = 0;
        var paginationData = 1;
        $(".event").removeAttr("data-pagination-set");


        $(".event-pagination-bar").empty();

        // IF VISIBLE EVENTS IS GREATER THEN PAGINATION LIMIT - SHOW PAG
        if (visibleEvents > paginationLimit) {

            $(".event:visible").each(function(index) {
                paginationCounter++;
                $(this).attr("data-pagination-set", paginationData);

                if (paginationCounter == paginationLimit) {

                    paginationData = paginationData + 1;
                    paginationCounter = 0;
                }

            });

            $(".event-wrapper").find("[data-pagination-set='1']").show();
            $(".event-wrapper > .event").not("[data-pagination-set='1']").hide();



            // BUILD PAGINATION BAR
			paginationBar += '<ul class="pagination">';
            for (i = 1; i <= numberOfPages; i++) {
				if(i == 1){ 
					onecl = ' active-pag'; 
				} else onecl = '';
                paginationBar += '<li><a><span class="event-pag' + onecl + '" data-pagination-num="' + i + '">' + i + '</span></a></li>';
            }
			paginationBar += '</ul>';

            $(".event-pagination-bar").html(paginationBar);


        }



    }


    // EVENT PAGINATION NUMBER CLICKS
    $(".event-pagination-bar").on("click", ".event-pag", function() {
        var paginationNum = $(this).attr("data-pagination-num");

        $(".event-wrapper").find("[data-pagination-set='" + paginationNum + "']").show();
        $(".event-wrapper > .event").not("[data-pagination-set='" + paginationNum + "']").hide();

        eventNewsletter();

        $(".event-pag").removeClass("active-pag");
        $(this).addClass("active-pag");
		$(window).scrollTop(0);


    });



})(jQuery);