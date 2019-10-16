/*jQuery(document).ready(function(a){function d(b){var c=b;a(function(){a("img.lazy").lazyload({event:"alphasort"})});setTimeout(function(){a("img.lazy").trigger("alphasort")},50);a(".alphachosen").removeClass("alphachosen"),a(".integrations-wrapper").find(".integration-item").show(),a(".noresultsdiv").removeClass("hnores"),a(".integration-item").each(function(){var b=a(this).attr("data-integration");b.toUpperCase().indexOf(c.toUpperCase())!=-1?(a(this).show(),a(".noresultsdiv").addClass("hnores")):a(this).hide()})}var b=[];a(".alphalist a").on("click",function(c){c.preventDefault(),a(".noresultsdiv").addClass("hnores"),a(function(){a("img.lazy").lazyload({event:"alphasort"})});setTimeout(function(){a("img.lazy").trigger("alphasort")},50);b=[],a("#intg-search-input").val(""),a(".alphachosen").removeClass("alphachosen"),a(this).addClass("alphachosen");var e=a(this).attr("data-letter");b.push(e),a(".integrations-wrapper").find(".integration-item").hide();for(var f=0;f<b.length;f++){var g=b[f];"ALL"==g?a(".integrations-wrapper").find(".integration-item").show():a(".integrations-wrapper").find("[data-letter='"+g+"']").show()}});var c=null;a("#intg-search-input").keyup(function(a){clearTimeout(c),c=setTimeout(d.bind(void 0,a.target.value),300)})});*/


jQuery(document).ready(function (a) {
	function d(b) {
		var c = b;
		var counter098 = 0;
		a(function () {
			a("img.lazy").lazyload({
				event: "alphasort"
			})
		});
		setTimeout(function () {
			a("img.lazy").trigger("alphasort")
		}, 50);
		a(".alphachosen").removeClass("alphachosen"), a(".integrations-wrapper").find(".integration-item").show(), a(".noresultsdiv").removeClass("hnores"), a(".integration-item").each(function () {
			var b = a(this).attr("data-integration");
 
			b.toUpperCase().indexOf(c.toUpperCase()) != -1 ? (a(this).show(), a(".noresultsdiv").addClass("hnores")) : a(this).hide()

			b.toUpperCase().indexOf(c.toUpperCase()) != -1 ? (a(this).addClass('active-int')) : a(this).removeClass('active-int')		
			console.log(a('.integrations-wrapper').find('.active-int').length);
			if(a('body').find('.show-all-integration').length > 0){
			if(a('.integrations-wrapper').find('.active-int').length > 12){
				load_more_int_fun();
				a('.show-all-integration').show();
			}
			else{
				a('.show-all-integration').hide();
			}
			}

		})
	}
	var b = [];
	a(".alphalist a").on("click", function (c) {
		c.preventDefault(), a(".noresultsdiv").addClass("hnores"), a(function () {
			a("img.lazy").lazyload({
				event: "alphasort"
			})
		});
		setTimeout(function () {
			a("img.lazy").trigger("alphasort")
		}, 50);
		b = [], a("#intg-search-input").val(""), a(".alphachosen").removeClass("alphachosen"), a(this).addClass("alphachosen");
		var e = a(this).attr("data-letter");
		b.push(e), a(".integrations-wrapper").find(".integration-item").hide();
		for (var f = 0; f < b.length; f++) {
			var g = b[f];
			"ALL" == g ? a(".integrations-wrapper").find(".integration-item").show() : a(".integrations-wrapper").find("[data-letter='" + g + "']").show()
		}
	});
	var c = null;
	a("#intg-search-input").keyup(function (a) {
		clearTimeout(c), c = setTimeout(d.bind(void 0, a.target.value), 300)
	});


a('.show-all-integration a').click(function () {
	load_more_int_fun();
});
function load_more_int_fun(){
	a(".integration-item.active-int").hide();
        size_li = a(".integration-item.active-int").size();
        x=12;
        a('.integration-item.active-int:lt('+x+')').show();
        a('.show-all-integration a').click(function () {
        x= (x+12 <= size_li) ? x+12 : size_li;
        a('.integration-item.active-int:lt('+x+')').show();
        if(x == size_li){
            a('.show-all-integration').hide();
        }
        });
}
});