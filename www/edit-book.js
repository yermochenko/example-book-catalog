var authors = {};
window.onload = function() {
	var listElement = document.getElementById("author-field");
	listElement.oninput = oninputlistener;
};
function oninputlistener() {
	if(authors[this.value] === undefined) {
		var request = new XMLHttpRequest();
		request.timeout = 1000;
		var uri = "author.php?" + encodeURIComponent(this.value);
		request.open("GET", uri);
		request.onreadystatechange = function() {
			if(request.readyState != 4) {
				return;
			}
			if(request.status == 200) {
				var result = JSON.parse(request.responseText);
				authors = {};
				var list = document.getElementById("author-list-field");
				clear(list);
				for(var i = 0; i < result.length; i++) {
					authors[result[i].id] = result[i];
					var option = document.createElement("OPTION");
					option.value = result[i].id;
					option.appendChild(document.createTextNode(result[i].name + " " + result[i].surname));
					list.appendChild(option);
				}
			}
		};
		request.send(null);
	} else {
		document.getElementById("author-id-field").value = this.value;
		this.value = authors[this.value].name + " " + authors[this.value].surname;
	}
}
function clear(element) {
	while(element.firstChild) {
		element.removeChild(element.firstChild);
	}
}