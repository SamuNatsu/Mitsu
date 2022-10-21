/*! mitsu-progress.js - Mitsu - v0.0.1 */

// Z-index: 20000
const Progress = {
	data: {
		style: ".progress-bar{background-image:linear-gradient(to right,#ff0000,#ff0047,#ff0082,#eb00c2,#9d00ff);box-shadow:grey 1px 1px 10px;height:5px;left:0;opacity:0;position:fixed;top:0;width:0%;z-index:20000;}.progress-bar-start{width:90%;opacity:1;transition:width 10s cubic-bezier(0.05,1,0.25,1)}.progress-bar-end{opacity:0;width:100%;transition:width .5s,opacity .2s ease .5s}"
	},
	init: function() {
		this.data.element = document.querySelector(".progress-bar");
		if (this.data.element === null) {
			console.log("[Mitsu:Progress] Service disabled");
			return;
		}

		Html.appendStyle(this.data.style);

		console.log("[Mitsu:Progress] Service enabled");
	},
	start: function() {
		if (this.data.element === null)
			return;

		this.data.element.classList.remove("progress-bar-start", "progress-bar-end");
		window.getComputedStyle(this.data.element).left;
		this.data.element.classList.add("progress-bar-start");
	},
	end: function() {
		if (this.data.element === null)
			return;

		this.data.element.classList.remove("progress-bar-end");
		this.data.element.classList.add("progress-bar-end");
	}
};
