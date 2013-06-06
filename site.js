function replaceContent(input) {
	$(".content").html(input);
}
function changeColor(input) {
	$("body").css("background-color",input);
}
function loadAnother() {
	$.getJSON(beg + "index.php?q=-1&c=color", function (data) {
		replaceContent(data.content);
		changeColor(data.color);
	});
	return false;
}