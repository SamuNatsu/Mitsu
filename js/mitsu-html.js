/*! html.js - Mitsu - v0.0.1 */

const Html = {
	data: {
		escapeList: {
			'<': "&lt;", 
			'>': "&gt;", 
			'&': "&amp;", 
			'"': "&quot;"
		},
		unescapeList: {
			"lt": '<', 
			"gt": '>', 
			"amp": '&', 
			"quot": '"'
		},
	},
	escape: function(str) {
		return str.replace(/[<>&"]/g, (char)=>this.data.escapeList[char]);
	},
	unescape: function(str) {
		return str.replace(/&(lt|gt|amp|quot);/ig, (all, char)=>this.data.unescapeList[char]);
	},
	appendStyle: (str)=>{
		let el = document.createElement("style");
		el.innerHTML = str;
		document.querySelector("head").appendChild(el);
	},
	select: (selector)=>{
		return document.querySelectorAll(selector);
	},
	css: (el, data)=>{
		if (el instanceof NodeList) {
			el.forEach((e)=>Html.css(e, data));
			return;
		}

		if (!(el instanceof Node))
			throw "Not a Node object";

		data.forEach((k, v)=>{
			el.style[k] = v;
		});
	},
	animate: (el, data)=>{
		if (!(el instanceof Node))
			throw "Not a Node object";

		return new Promise((resolve)=>{
			el.addEventListener("transitionend", resolve, {once: true});
			Html.css(el, data);
		});
	}
};
