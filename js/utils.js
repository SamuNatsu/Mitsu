/*! utils.js - Mitsu - v0.0.1 */

// DOMContentLoaded hook
let DOMContentLoadedCallbackList = [];
document.addEventListener("DOMContentLoaded", function() {
	document.removeEventListener("DOMContentLoaded", arguments.callee, false);
	DOMContentLoadedCallbackList.forEach((callback) => {
		callback();
	});
});

// Add DOMContentLoaded callback
function onDOMContentLoaded(callback) {
	if (typeof callback != "function")
		return;
	DOMContentLoadedCallbackList.push(callback);
}

// Make Object iterable
Object.prototype.forEach = function(callback) {
	let keys = Object.keys(this);
	for (let i = 0; i < keys.length; ++i)
		callback(keys[i], this[keys[i]], this);
};

// Delay
const delay = (ms)=>{
	return new Promise((resolve)=>{
		setTimeout(resolve, ms);
	});
};

// Ease in quad
const easeInQuad = (t, b, c, d)=>c * (t /= d) * t + b;
// Ease out quad
const easeOutQuad = (t, b, c, d)=>-c * (t /= d) * (t - 2) + b;
// Ease out quint
const easeOutQuint = (t, b, c, d)=>c * ((t = t / d - 1) * t * t * t * t + 1) + b;
