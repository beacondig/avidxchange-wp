jQuery(document).ready(function($) {
	
    var newsletterHtml = $(".event-newsletter").detach();
    //console.log(newsletterHtml);
    var paginationLimit = 12;
    var startPage = 1;
    var endPage = paginationLimit;
	var resList = new Array();
	
	$('.event').each(function(i, obj) {
		resList.push($(this).attr("data-event-drop"));
	});

    pagination();
    eventClear();
    eventNewsletter();

    var eventSelections = [];
	var filterSelections = [];
	var hideList = [];
	
	
	//HASH LOADED DROPDOWN1 ITEMS
    function dd1Preload() {
		
		while(hash.charAt(0) === '#')
    		hash = hash.substr(1);
		
		filterSelections = [];
		$('.resdropdown1').val(hash);
		var filterSelection1 = hash
		if(filterSelection1 != '') {
        	filterSelections.push(filterSelection1);
		}
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}
        }
		//SHOW TITLE IN H2 TAG	
		hash = hash.replace(/\-/g, " ");
		document.getElementById('pageTitle').innerHTML = hash;
		
        eventClear();
        eventNewsletter();
        pagination();

    };
	
	//HASH LOADED DROPDOWN2 ITEMS
    function dd2Preload() {
		
		while(hash.charAt(0) === '#')
    		hash = hash.substr(1);
		
		filterSelections = [];
		$('.resdropdown2').val(hash);
		var filterSelection2 = hash
		if(filterSelection2 != '') {
        	filterSelections.push(filterSelection2);
		}
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}
        }
		//SHOW TITLE IN H2 TAG	
		hash = hash.replace(/\-/g, " ");
		document.getElementById('pageTitle').innerHTML = hash;
		
        eventClear();
        eventNewsletter();
        pagination();

    };
	
	//HASH LOADED DROPDOWN3 ITEMS
    function dd3Preload() {
		
		while(hash.charAt(0) === '#')
    		hash = hash.substr(1);
		
		filterSelections = [];
		$('.resdropdown3').val(hash);
		var filterSelection3 = hash
		if(filterSelection3 != '') {
        	filterSelections.push(filterSelection3);
		}
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}
        }
		//SHOW TITLE IN H2 TAG	
		hash = hash.replace(/\-/g, " ");
		document.getElementById('pageTitle').innerHTML = hash;
		
        eventClear();
        eventNewsletter();
        pagination();

    };
	
	//HASH LOADED ITEMS, PRESET THE DISPLAY
	function catPreload(hash) {
		// ADD TOGGLE CLASS
		$(".allon").removeClass("e-cat-active");
		$(hash).toggleClass("e-cat-active");
	
		// GET CATEGORY NAME
		var eventSelection = $(hash).attr("data-event-category");
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
	
		// SHOW EVENTS BASED ON SELECTION
		for (var i = 0; i < eventSelections.length; i++) {
			var eventType = eventSelections[i];
	
			$(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();
		}
		
		while(hash.charAt(0) === '#') {
    		hash = hash.substr(1);
		}
		//SHOW TITLE IN H2 TAG	
		if(hash == 'whitepapers-guides') { hash = 'Whitepapers'}
		else if(hash == 'case-studies-testimonials') { hash = 'Testimonials'}
		else {
			hash = hash.replace(/\-/g, " ");
		}
		document.getElementById('pageTitle').innerHTML = hash;
	
		eventClear();
		eventNewsletter();
		pagination();
	}
	
	//NO HASH, CLEAR THE SUBTITLE
	function clearh2() {
		document.getElementById('pageTitle').innerHTML = "&nbsp;";
	}
	
	
	
    // RESOURCE MENU CATEGORY CLICK
    $(".event-cat-menu a.caton").on("click", function(e) {
        e.preventDefault();

        // ADD TOGGLE CLASS
		//ADDED TO REMOVE THE MULTIPLE CAT SELECT FEATURE
		$(".caton").removeClass("e-cat-active");
        //$(this).toggleClass("e-cat-active");
		/////////////////////////////////////////////////
		
		//ADD HASH TO THE URL WITH JUMPING ON THE PAGE
		var newHash = $(this).attr("id");
		var id = $(this).attr("id");
		$(this).removeAttr('id');
		window.location.hash = "#" + newHash;
		$(this).attr('id',id);
		
		//CALL FUNCTION TO UPDATE THE BANNER H2
		hash = window.location.hash;
		checkHash(hash);
		
		$(hash).addClass("e-cat-active");
		
        // GET CATEGORY NAME
        var eventSelection = $(this).attr("data-event-category");
		//ADDED TO REMOVE THE MULTIPLE CAT SELECT FEATURE
		eventSelections = [];
		/////////////////////////////////////////////////
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

        // SHOW EVENTS BASED ON SELECTION
        for (var i = 0; i < eventSelections.length; i++) {
            var eventType = eventSelections[i];

            $(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();

        }
		
		if(eventSelections.length == 0) {
			$(".allon").addClass("e-cat-active");	
		}else{
			$(".allon").removeClass("e-cat-active");
		}


        // IF NO SELECTIONS EXISTS, SHOW ALL EVENTS
        if (eventSelections.length <= 0) {
            $(".event-wrapper").find(".event").show();

        }
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}
        }

        eventClear();
        eventNewsletter();
        pagination();

    });
	
	
	//ALL BUTTON CLICKED
	$(".allon").on("click", function(e) {
		$(".caton").removeClass("e-cat-active");
        $(".allon").addClass("e-cat-active");
		
		//CHANGE HASH IN URL
		window.location.hash = "all";
		hash = '#all';
		
		checkHash(hash);
		
		$(".event-wrapper").find(".event").show();
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}


        }
		
		eventSelections = [];
		
		eventClear();
        eventNewsletter();
        pagination();
	});
	
	
	// RESOURCE DROPDOWN FILTER CLICK
    $(".resdropdown1,.resdropdown2,.resdropdown3").on("change", function(e) {
        e.preventDefault();

        // HIDE EVENTS
        $(".event-wrapper").find(".event").hide();

        // SHOW EVENTS BASED ON SELECTION
        for (var i = 0; i < eventSelections.length; i++) {
            var eventType = eventSelections[i];

            $(".event-wrapper").find("[data-event-cat='" + eventType + "']").show();

        }
        // IF NO SELECTIONS EXISTS, SHOW ALL EVENTS
        if (eventSelections.length <= 0) {
            $(".event-wrapper").find(".event").show();

        }
		
		filterSelections = [];
		var filterSelection1 = $('.resdropdown1').val();
		var filterSelection2 = $('.resdropdown2').val();
		var filterSelection3 = $('.resdropdown3').val();
		if(filterSelection1 != '') {
        	filterSelections.push(filterSelection1);
		}
		if(filterSelection2 != '') {
        	filterSelections.push(filterSelection2);
		}
		if(filterSelection3 != '') {
        	filterSelections.push(filterSelection3);
		}
		
		// SHOW EVENTS BASED ON DROPDOWN SELECTION
		for (var i = 0; i < filterSelections.length; i++) {
            var resourceType = filterSelections[i];
            
			//HIDE ONES THAT AREN'T IN THE FILTER
			var arrayLength = resList.length;
			for (var i = 0; i < arrayLength; i++) {
				if(resList[i].indexOf(resourceType) >= 0) {
					//alert(i);
				} else {
					$(".event-wrapper").find("[data-event-id='" + i + "']").hide();	
				}
			}


        }
		
        eventClear();
        eventNewsletter();
        pagination();

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


	
	 //Check if the footer links that have hashes were clicked		
    $(".footResClick a").on("click", function(e) {	
        e.preventDefault();		
        var nextVal = $(this).attr("href");		
        var hash = nextVal.substr(nextVal.indexOf("#"))		
        //clear the board		
        $(".caton").removeClass("e-cat-active");		
        $(".event-wrapper").find(".event").show();		
        eventSelections = [];		
        checkHash(hash);		
        window.location.hash = hash;		
        $(window).scrollTop(0);		
    });


	//CHECK FOR A HASH PAGE MARKER
	var hash = window.location.hash;
	
	function checkHash(hash) {
		if(hash != '') { 
			if((hash == '#webinars') || (hash == '#product-info') || (hash == '#short-videos') || (hash == '#ebooks') || (hash == '#whitepapers-guides') || (hash == '#case-studies-testimonials')) {
				catPreload(hash);
			} else if((hash == '#association-management') || (hash == '#property-management') || (hash == '#medical') || (hash == '#energy') || (hash == '#construction') || (hash == '#law')) {
				dd1Preload(hash);
			} else if((hash == '#ap-manager') || (hash == '#cfo') || (hash == '#controller') || (hash == '#vendor') || (hash == '#partner')) {
				dd2Preload(hash);
			} else if((hash == '#accounts-payable') || (hash == '#ap-efficiency') || (hash == '#approval-workflow') || (hash == '#automated-payments') || (hash == '#electronic-invoicing') || (hash == '#payment-best-practices') || (hash == '#payment-trends')) {
				dd3Preload(hash);
			} else {
				clearh2();	
			}
		}
	}
	checkHash(hash);


});