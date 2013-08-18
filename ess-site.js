function replaceContent(input) {
	$(".content")[0].innerHTML = input;
}
function changeColor(input) {
	document.body.style.background = input;
}
function loadAnother() {
	h(beg + "index.php?q=-1&c=color", function (data) {
		replaceContent(data.content);
		changeColor(data.color);
	});
	return false;
}