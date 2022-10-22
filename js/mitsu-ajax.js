/*! mitsu-ajax.js - Mitsu - v0.0.1 */

const Ajax = {
	makeQueryString: (data)=>{
		if (data === undefined)
			return "";

		let str = "";
		data.forEach((k, v)=>{
			if (str !== "")
				str += "&";
			str += encodeURI(k) + "=" + encodeURI(v);
		});
		return str;
	},
	stateChangeHook: (xhr, resolve, reject)=>{
		if (xhr.readyState == 4) {
			if (xhr.status >= 200 && xhr.status < 300)
				resolve(xhr.response);
			else 
				reject(xhr.status);
		}
	},
	get: (url, data)=>{
		return new Promise((resolve, reject)=>{
			let qstr = Ajax.makeQueryString(data);
			let xhr = new XMLHttpRequest();
			xhr.onreadystatechange = ()=>Ajax.stateChangeHook(xhr, resolve, reject);
			xhr.open("GET", url + "?" + qstr, true);
			xhr.send();
		});
	},
	post: (url, data)=>{
		return new Promise((resolve, reject)=>{
			let qstr = Ajax.makeQueryString(data);
			let xhr = new XMLHttpRequest();
			xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = ()=>Ajax.stateChangeHook(xhr, resolve, reject);
			xhr.open("POST", url, true);
			xhr.send(qstr);
		});
	}
};
