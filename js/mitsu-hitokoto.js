/*! hitokoto.js - Mitsu - v0.0.1 */

const Hitokoto = {
	data: {},
	init: async function() {
		let el = Html.select("#header-desc")[0];
		if (el === null || (typeof el.dataset.hitokoto) !== "string") {
			console.log("[Mitsu:Hitokoto] Service disabled");
			return;
		}

		this.data.element = el;
		this.data.url = el.dataset.hitokoto;

		let callback = async ()=>{
			await this.refresh();
			setTimeout(callback, 10000);
		}
		callback();

		console.log("[Mitsu:Hitokoto] Service enabled");
	},
	fetch: async function() {
		if (this.data.element === undefined)
			return null;

		try {
			let result = JSON.parse(await Ajax.get(this.data.url));
			result.from = result.from.replace("《", "〈").replace("》", "〉");
			result = "《" + result.from + "》" + (result.from_who === null ? "" : result.from_who + " | ") + result.hitokoto;

			return result;
		}
		catch (err) {
			console.log("[Mitsu:Hitokoto] Fetch fail: " + err);
			return null;
		}
	},
	refresh: async function() {
		if (this.data.element === undefined)
			return;

		let text = await this.fetch();
		Animate.console.out(this.data.element, 1000, async ()=>{
			await delay(200);
			Animate.console.in(this.data.element, text, 2000);
		});
	}
};
