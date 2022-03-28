/*! style.js | Mitsu | v0.0.5 */
const mitsuSidebar = {
	lock: false,
	showed: false,
	show: function() {
		if (mitsuSidebar.lock || mitsuSidebar.showed) 
			return;
		mitsuSidebar.lock = true;
		$("#darkback").css({
			"backdrop-filter": "blur(2px)",
			"background-color": "rgba(0,0,0,.5)", 
			"z-index": "750"
		});
		$("#sidebar").animate(
			{left: "0px"}, 
			400, 
			function() {
				mitsuSidebar.showed = true;
				mitsuSidebar.lock = false;
			}
		);
	},
	hide: function() {
		if (mitsuSidebar.lock || !mitsuSidebar.showed) 
			return;
		mitsuSidebar.lock = true;
		$("#darkback").css({
			"backdrop-filter": "blur(0)",
			"background-color": "rgba(0,0,0,0)"
		});
		$("#sidebar").animate(
			{left: (-$("#sidebar").outerWidth()).toString() + "px"}, 
			400, 
			function() {
				$("#darkback").css("z-index", "-2");
				mitsuSidebar.showed = false;
				mitsuSidebar.lock = false;
			}
		);
	},
	register: function() {
		$("#darkback").click(mitsuSidebar.hide);
		$("#more").click(mitsuSidebar.show);
		$("#header-more").click(mitsuSidebar.show);
		$("#sidebar").css("left", (-$("#sidebar").outerWidth()).toString() + "px").show();
		$("#sidebar-back").click(mitsuSidebar.hide);
	}
};

const mitsuStorage = {
	get: function(key) {
		try {
			return JSON.parse(localStorage.getItem(key));
		}
		catch {
			return undefined;
		}
	},
	set: function(key, val) {
		localStorage.setItem(key, JSON.stringify(val));
	}
};

const mitsuLike = {
	currentID: NaN,
	localCheck: function(bypass) {
		mitsuLike.currentID = NaN;
		if ($("#like")[0] == undefined)
			return undefined;
		mitsuLike.currentID = parseInt($("#main-frame").attr("currentID"));
		var ls = mitsuStorage.get("like");
		if (ls == undefined)
			ls = [];
		ls = new Set(ls);
		if (ls.has(mitsuLike.currentID))
			return true;
		if (bypass)
			return false;
		ls.add(mitsuLike.currentID);
		mitsuStorage.set("like", Array.from(ls));
		return false;
	},
	sendLike: function() {
		if (mitsuLike.localCheck(false))
			return;
		$.post(
			mitsuAPI + "Like.php",
			{cid: mitsuLike.currentID},
			function(data) {
				$("#like").addClass("liked").text("👍 " + data);
			}
		);
	},
	preProcess: function() {
		if (mitsuLike.localCheck(true))
			$("#like").addClass("liked").attr("onclick", "");
	}
};

function updView() {
	if (isNaN(mitsuLike.currentID))
		return;
	var ls = mitsuStorage.get("view");
	if (ls == undefined)
		ls = [];
	ls = new Set(ls);
	if (!ls.has(mitsuLike.currentID)) {
		ls.add(mitsuLike.currentID);
		mitsuStorage.set("view", Array.from(ls));
		$.post(
			mitsuAPI + "View.php",
			{cid: mitsuLike.currentID},
			function(data) {
				$("#view").text(data);
			}
		);
	}
}

const mitsuScroll = {
	status: -1,
	process: function() {
		if (document.documentElement.scrollTop + document.body.scrollTop > 200) {
			if (mitsuScroll.status == 0)
				return;
			mitsuScroll.status = 0;
			$("#header").stop()
				.animate(
					{"background-color":"rgba(255,255,255,1)"}, 
					"fast"
				);
			$("#top").stop().fadeIn(400, function() {
				mitsuScroll.status = -1;
			});
		}
		else {
			if (mitsuScroll.status == 1)
				return;
			mitsuScroll.status = 1;
			$("#header").stop()
				.animate(
					{"background-color":"rgba(255,255,255,.85)"}, 
					"fast"
				);
			$("#top").stop().fadeOut(400, function() {
				mitsuScroll.status = -1;
			});
		}
	},
	scroll: function() {
		$("html,body").animate({"scrollTop":"0px"}, 300);
	},
	register: function() {
		$(window).scroll(mitsuScroll.process);
		$("#top").click(mitsuScroll.scroll);
	},
	preProcess: function(toTop) {
		if (toTop)
			mitsuScroll.scroll();
		mitsuScroll.process();
	}
};

function preprocess() {
	// Page/archive navigator
	$("a.prev").addClass("alnk");
	$("a.next").addClass("alnk");
	// Table warp
	$("#contents table").wrap("<div style=\"overflow-x:auto\"></div>");
	// Metas
	$("#main-tags a").addClass("alnk");
	$("#main-cate a").addClass("alnk");
	// High light code
	hljs.highlightAll();
	// Like
	mitsuLike.preProcess();
	// View
	updView();
	// KaTeX
	if ($("#main-frame").attr("currentID") != undefined)
		renderMathInElement(document.body, {
			delimiters: [
				{left:'$', right:'$', display:false},
				{left:'$$', right:'$$', display:true}
			]
		});
	// Anchor
	$("a").each(function() {
		if (/^#/.test($(this).attr("href"))) {
			$(this).click(function() {
				$("html,body").animate({scrollTop: $("a[name=\"" + $(this).attr("href").substr(1) + "\"]").offset().top - 80}, 300);
			});
		}
	});
	$("#cancel-comment-reply-link").click(function() {
		$("html,body").animate({scrollTop: $("#" + $(".respond").attr("id")).offset().top - 80}, 300);
	});
	// Comment
	if ($("#main-frame").attr("currentID") != undefined) {
		$("#main").css("margin-bottom", "30px");
		$("#more").css("bottom", "20%");
		$("#top").css("bottom", "30%");
		$("#comment").off().click(function() {
			$("html,body").animate({scrollTop: $("a[name=\"anchor-comments\"]").offset().top - 80}, 300);
		}).show();
		$("#comments").show();
		$("#cancel-comment-reply-link").addClass("alnk").click(function() {
			$(".respond").css("border-bottom", "dashed gray 3px");
		});
		$(".comment-author>a").addClass("alnk a-blue");
		$(".comment-meta>span>a").addClass("alnk").attr("no-pjax", "").click(function() {
			$(".respond").css("border-bottom", "dashed gray 3px");
			if ($(this).parent().parent().parent().parent().parent().parent().hasClass("comment-parent"))
				$(".respond").css("border-bottom", "none");
		});
	}
	else {
		$("#main").attr("style", "");
		$("#more").attr("style", "");
		$("#top").attr("style", "");
		$("#comment").hide();
		$("#comments").hide();
	}
}

// Ready
let pjax = null;
$(document).ready(function() {
	// Hello
	console.log('Theme Mitsu | Simple and pure, but powerful');
	// Pre process
	preprocess();
	// mitsuSidebar
	mitsuSidebar.register();
	// Scroll
	mitsuScroll.preProcess(false);
	mitsuScroll.register();
	// Pjax
	pjax = new Pjax({
		elements: "a:not([target='_blank']):not([name]):not([no-pjax])",
		selectors: [
			"title",
			"meta[name='description']",
			"#main",
			"#comments"
		],
		timeout: 20000,
		cacheBust: false,
		scrollRestoration: true
	});
	$(document).on('pjax:send', function() {
		mitsuSidebar.hide();
		topbar.show();
	});
	$(document).on('pjax:success', function() {
		preprocess();
		mitsuScroll.preProcess(true);
		topbar.hide();
	});
	$(document).on('pjax:error', function(event) {
		window.location.href = event.originalEvent.request.responseURL;
	});
});
