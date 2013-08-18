/* 140 medley
 * Technically this not longer conforms to the 140 bytes rule, but i like to think it is done in the spirit of the challenge.
 * (c) 2013 - TerriblePlan
 * Licensed under the terms of the BSD license
 * This file is "forked" from https://github.com/honza/140medley
 * This is a micro-framework or a collection of small, helpful utilities for common javascript tasks.
 *  - create DOM elements - m();
 *  - DOM selector - $();
 *  - Get cross-browser xhr - j();
 *  - Execute things when browser is ready - r();
 */
function m(e, t, n) {
	t = document;
	n = t.createElement("p");
	n.innerHTML = e;
	e = t.createDocumentFragment();
	while (t = n.firstChild)
		e.appendChild(t);
	return e;
};

function $(e, t) {
	e = e.match(/^(\W)?(.*)/);
	return (t || document)["getElement"
			+ (e[1] ? e[1] == "#" ? "ById" : "sByClassName" : "sByTagName")]
			(e[2]);
};

function j(e) {
	for (e = 0; e < 4; e++)
		try {
			return e ? new ActiveXObject(
					[ , "Msxml2", "Msxml3", "Microsoft" ][e] + ".XMLHTTP")
					: new XMLHttpRequest;
		} catch (t) {
		}
};

var re = [], rl;

function r(e) {
	var t = "complete";
	if (document.readyState !== t)
		if (rl === 1)
			re.push(e);
		else {
			rl = 1;
			re.push(e);
			var n = setInterval(function() {
				if (document.readyState !== t)
					return;
				clearInterval(n);
				while (re.length)
					re.shift()();
				re = null
			}, 50);
		}
	else
		e();
};

function h(u, c) {
	var q = j();
	q.open("GET", u, true);
	q.onreadystatechange = function() {
		if (q.readyState == 4)
			if (q.status == 200)
				c(JSON.parse(q.responseText));
	}
	q.send();
}