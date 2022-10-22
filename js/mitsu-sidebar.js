/*! mitsu-sidebar.j - Mitsu - v0.0.1 */

const Sidebar = {
	data: {},
	init: function() {
		// Get elements
		this.data.elBar = Html.select("#sidebar")[0];
		this.data.elBack = Html.select("#sidebar-background")[0];

		// Set sidebar offset
		let w = window.getComputedStyle(this.data.elBar).width;
		Html.appendStyle("#sidebar{left:-" + w + "}");

		// Sidebar show/hide event listener
		Html.select("#side-btn-bar")[0].addEventListener("click", ()=>this.show());
		this.data.elBack.addEventListener("click", ()=>this.hide());
	},
	show: function() {
		// Show sidebar
		this.data.elBar.classList.remove("sidebar-show");
		this.data.elBar.classList.add("sidebar-show");

		// Show background
		this.data.elBack.classList.remove("sidebar-background-show", "sidebar-background-hide");
		window.getComputedStyle(this.data.elBack).left;
		this.data.elBack.classList.add("sidebar-background-show");
	},
	hide: function() {
		// Hide sidebar
		this.data.elBar.classList.remove("sidebar-show");

		// Hide background
		this.data.elBack.classList.remove("sidebar-background-hide");
		this.data.elBack.classList.add("sidebar-background-hide");
	}
};
