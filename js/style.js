var navMod = false;
$(document).ready(function() {
	// Header
	$("#nav-bar-btn").click(function() {
		$("#nav-back").show();
		$("#nav-back").animate({"opacity":"0.5"});
		$("header").animate({"top":"-65px"}, function() {
			var navHeight = $("#nav-bar").outerHeight();
			$("#nav-bar").animate({"top":"-" + navHeight.toString()}, 0, function() {
				$(this).show();
			});
			$("#nav-bar").animate({"top": "0px"});
			navMod = true;
		});
	});
	$("#nav-back").click(function() {
		if (!navMod)
			return;
		navMod = false;
		$("#nav-back").animate({"opacity":"0"});
		var navHeight = $("#nav-bar").outerHeight();
		$("#nav-bar").animate({"top":"-" + navHeight.toString()}, function() {
			$(this).hide();
			$("header").animate({"top":"0px"});
			$("#nav-back").hide();
		});
	});
	// Scroll
	if (document.documentElement.scrollTop + document.body.scrollTop > 200) {
		$("header").css("background-color", "rgba(255,255,255,1)");
		$("#back-top").show();
	}
	$(window).scroll(function() {
		if (document.documentElement.scrollTop + document.body.scrollTop > 200) {
			$("header").stop().animate({"background-color":"rgba(255,255,255,1)"});
			$("#back-top").stop().fadeIn(400);
		}
		else {
			$("header").stop().animate({"background-color":"rgba(255,255,255,0.85)"});
			$("#back-top").stop().fadeOut(400);
		}
	});
	$("#back-top").click(function() {
		$("html,body").animate({"scrollTop":"0px"}, 200);
	});
	// Page navigator
	$("a.prev").addClass("su-link");
	$("a.next").addClass("su-link");
	// Wrap table
	$("table").wrap("<div style=\"overflow-x:scroll;\"></div>");
	// High light code
	hljs.highlightAll();
});
