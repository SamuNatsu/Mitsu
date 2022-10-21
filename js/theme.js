/*! theme.js - Mitsu - v0.0.1 */

// On load
onDOMContentLoaded(()=>{
	// Initialize modules
	Hitokoto.init();
	Progress.init();
	Sidebar.init();

	// Title animation
	let el = Html.select(".header-title")[0];
	Animate.console.in(el, el.innerHTML, 1000);
});

// Scroll top
let scrollAnimateId = null;
const scrollTop = ()=>{
	if (scrollAnimateId !== null) {
		cancelAnimationFrame(scrollAnimateId);
		scrollAnimateId = null;
	}

	let offset = window.scrollY;
	let start = new Date().getTime();
	let scrollAnimate = ()=>{
		scrollAnimateId = requestAnimationFrame(scrollAnimate);

		let now = new Date().getTime();
		if (now - start >= 500 || window.scrollY < 1) {
			window.scrollTo(0, 0);
			cancelAnimationFrame(scrollAnimateId);
			scrollAnimateId = null;
			return;
		}
		window.scrollTo(0, offset - easeOutQuint(now - start, 0, offset, 500));
	}
	scrollAnimate();
};
onDOMContentLoaded(()=>Html.select("#side-btn-top")[0].addEventListener("click", ()=>scrollTop()));

// Pjax handling
let pjax = null;
const pjaxInit = ()=>{
	// Initialize pjax
	pjax = new Pjax({
		elements: 'a[href^="' + siteUrl + '"]:not(a[target="_blank"],a[no-pjax]), a[href^="?"]',
		selectors: [
			"title",
			".top-bar-nav",
			".header-title",
			"#main"
		],
		switches: {
			".header-title": async function (oldEl, newEl) {
				if (oldEl.innerHTML === newEl.innerHTML) {
					this.onSwitch();
					return;
				}

				let el = Html.select(".header-title")[0];
				Animate.console.out(el, el.innerHTML, 1000).then(()=>Animate.console.in(el, newEl.innerHTML, 1000).then(()=>{}));
				this.onSwitch();
			},
			"#main": async function (oldEl, newEl) {
				if (!pjax._modified) {
					this.onSwitch();
					return;
				}

				Animate.fade.out(oldEl, 500).then(()=>{
					oldEl.innerHTML = newEl.innerHTML;
					oldEl.setAttribute("data-cid", newEl.getAttribute("data-cid"));
					pjax.refresh();
					Animate.fade.in(oldEl, 500).then(()=>{});
				});
				this.onSwitch();
			}
		},
		scrollTo: false
	});
	pjax._fadeAnimate = null;

	// Set event listener
	document.addEventListener("pjax:send", ()=>{
		Progress.start();
		pjax._lastURL = window.location.href.split("?")[0];
		pjax._modified = true;
	});
	document.addEventListener("pjax:complete", ()=>Progress.end());
	document.addEventListener("pjax:success", ()=>scrollTop());
	document.addEventListener("pjax:error", (e)=>{
		window.location.href = e.request.responseURL;
	});

	// Handle response
	pjax._handleResponse = pjax.handleResponse;
	pjax.handleResponse = (responseText, request, href, options)=>{
		if (href.split("?")[0] === pjax._lastURL)
			pjax._modified = false;
		pjax._handleResponse(responseText, request, href, options);
	};

	// Output log
	console.log("[Mitsu:Pjax] Initialized");
};
onDOMContentLoaded(pjaxInit);
