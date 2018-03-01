
window.onload = function() {
	
	// to save time :)
	function gebi(id) {
		return document.getElementById(id);
	}
	
	// trim, convert in lower-case all letters but the first
	// of the string name and return the new string
	function normalize(name) {

	}

	// save the current list of participants on the server
	// using an Ajax request
	function save() {

	}
	
	// remove a participant from the list
	function remove() {

	}
	
	// add a new participant to the list
	function add() {

	}
	
	// unobstrusive JavaScript!
	
	document.querySelector("section#new > input").onclick = add;
	var lis = document.querySelectorAll("#list li");
	for ( var i = 0; i < lis.length; i++ ) {
		lis[i].onclick = remove;
	}
};
