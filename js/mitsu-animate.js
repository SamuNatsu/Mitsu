/*! mitsu-animate.js - Mitsu - v0.0.1 */

const Animate = {
	console: {
		in: (element, text, time, callback)=>{
			if ((typeof element.$animateConsole) === "number") {
				cancelAnimationFrame(element.$animateConsole);
				element.$animateConsole = null;
			}

			element.innerHTML = "";
			time = Math.min(time / text.length, 100);
			let last = new Date().getTime();
			let str = "";
			let animate = ()=>{
				element.$animateConsole = requestAnimationFrame(animate);

				let now = new Date().getTime();
				if (now - last >= time) {
					str += text[str.length];
					element.innerHTML = Html.escape(str);
					if (str.length >= text.length) {
						cancelAnimationFrame(element.$animateConsole);
						element.$animateConsole = null;
						if ((typeof callback) === "function")
							callback();
						return;
					}
					last = new Date().getTime();
				}
			};
			animate();
		},
		out: (element, time, callback)=>{
			if ((typeof element.$animateConsole) === "number") {
				cancelAnimationFrame(element.$animateConsole);
				element.$animateConsole = null;
			}

			let str = Html.unescape(element.innerHTML);
			time = Math.min(time / str.length, 100);
			let last = new Date().getTime();
			let animate = ()=>{
				element.$animateConsole = requestAnimationFrame(animate);

				let now = new Date().getTime();
				if (now - last >= time) {
					str = str.substr(0, str.length - 1);
					element.innerHTML = Html.escape(str);
					if (str.length === 0) {
						cancelAnimationFrame(element.$animateConsole);
						element.$animateConsole = null;
						if ((typeof callback) === "function")
							callback();
						return;
					}
					last = new Date().getTime();
				}
			};
			animate();
		}
	},
	fade: {
		in: (element, time, ease, callback)=>{
			if ((typeof element.$animateFadeId) === "number") {
				cancelAnimationFrame(element.$animateFadeId);
				element.$animateFadeId = null;
			}

			let start = new Date().getTime();
			let b = parseFloat(element.style.opacity === "" ? "0" : element.style.opacity);
			let t = b * time;
			let animate = ()=>{
				element.$animateFadeId = requestAnimationFrame(animate);

				let now = new Date().getTime();
				if (t + now - start >= time) {
					element.style.opacity = "1";
					cancelAnimationFrame(element.$animateFadeId);
					element.$animateFadeId = null;
					if ((typeof callback) === "function")
						callback();
					return;
				}
				element.style.opacity = (ease(t + now - start, b, 1 - b, time)).toString();
			};
			animate();
		},
		out: (element, time, ease, callback)=>{
			if ((typeof element.$animateFadeId) === "number") {
				cancelAnimationFrame(element.$animateFadeId);
				element.$animateFadeId = null;
			}

			let start = new Date().getTime();
			let b = parseFloat(element.style.opacity === "" ? "1" : element.style.opacity);
			let t = (1 - b) * time;
			let animate = ()=>{
				element.$animateFadeId = requestAnimationFrame(animate);

				let now = new Date().getTime();
				if (t + now - start >= time) {
					element.style.opacity = "0";
					cancelAnimationFrame(element.$animateFadeId);
					element.$animateFadeId = null;
					if ((typeof callback) === "function")
						callback();
					return;
				}
				element.style.opacity = (b - ease(t + now - start, 0, b, time)).toString();
			};
			animate();
		}
	}
};
