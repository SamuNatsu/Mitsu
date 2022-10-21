/*! animate.js - Mitsu - v0.0.1 */

const Animate = {
	console: {
		in: (element, text, time, min)=>{
			if (element.$Animate !== undefined) {
				clearTimeout(element.$Animate);
				element.$Animate = undefined;
				element.$AnimateResolve();
			}

			element.innerHTML = "";
			time = Math.min(time / text.length, min ?? 100);
			return new Promise((resolve)=>{
				let str = "";
				let callback = ()=>{
					str += text[str.length];

					element.innerHTML = Html.escape(str);
	
					if (str.length < text.length)
						element.$Animate = setTimeout(callback, time);
					else {
						resolve();
						element.$Animate = undefined;
					}
				};
				element.$AnimateResolve = resolve;
				element.$Animate = setTimeout(callback, time);
			});
		},
		out: (element, text, time, min)=>{
			if (element.$Animate !== undefined) {
				clearTimeout(element.$Animate);
				element.$Animate = undefined;
				element.$AnimateResolve();
			}

			element.innerHTML = Html.escape(text);
			time = Math.min(time / text.length, min ?? 100);
			return new Promise((resolve)=>{
				let str = text;
				let callback = ()=>{
					str = str.substr(0, str.length - 1);
					element.innerHTML = Html.escape(str);

					if (str.length)
						element.$Animate = setTimeout(callback, time);
					else {
						resolve();
						element.$Animate = undefined;
					}
				};
				element.$AnimateResolve = resolve;
				element.$Animate = setTimeout(callback, time);
			});
		}
	},
	fade: {
		in: (element, time, ease)=>{
			return Html.animate(element, {
				opacity: "1",
				transition: "opacity " + (time / 1000) + "s " + (ease ?? "")
			});
		},
		out: (element, time, ease)=>{
			return Html.animate(element, {
				opacity: "0",
				transition: "opacity " + (time / 1000) + "s " + (ease ?? "")
			});
		}
	}
};
