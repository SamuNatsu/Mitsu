/*! mitsu-sidebar.j - Mitsu - v0.0.1 */

const Sidebar = {
	data: {},
	init: function() {
		this.data.elFront = Html.select(".sidebar")[0];
		this.data.elBack = Html.select(".sidebar-background")[0];

		let w = window.getComputedStyle(this.data.elFront).width;
		Html.appendStyle(".sidebar{left:-" + w + "}");

		this.data.elBack.addEventListener("click", ()=>this.hide());
	},
	show: function() {
		this.data.elFront.classList.remove("sidebar-show");
		this.data.elFront.classList.add("sidebar-show");

		this.data.elBack.classList.remove("sidebar-background-show", "sidebar-background-hide");
		window.getComputedStyle(this.data.elBack).left;
		this.data.elBack.classList.add("sidebar-background-show");
	},
	hide: function() {
		this.data.elFront.classList.remove("sidebar-show");

		this.data.elBack.classList.remove("sidebar-background-hide");
		this.data.elBack.classList.add("sidebar-background-hide");
	}
};
