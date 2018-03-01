window.onload = function() {

	// to save time :)
	function gebi(identifier) {
		return document.getElementById(identifier);
	}

	// add an error message as the new content of
	// the element 'tooltip'and make that element visible
	function on_failure(request) {
		var tt = gebi("tooltip");
		tt.innerHTML = "OOPS, SOMETHING WENT WRONG!";
		tt.style.visibility = "visible";
	}

	// add the result of the AJAX request as the new content
	// of the element 'tooltip' and make that element visible
	function on_success(request) {
		var tt = gebi("tooltip");
		tt.innerHTML = request.responseText;
		tt.style.visibility = "visible";
	}

	// empty the content of the element
	// of ID 'tooltip' and hide that element
	function tooltip_hide() {
		var tt = gebi("tooltip");
		tt.style.visibility = "hidden";
		tt.innerHTML = "";
	}

	// do the AJAX request with the current selection and
	// * call 'on_success' after the request succeeded
	// * call 'on_failure' after the request failed
	function tooltip_show() {
		var sel = window.getSelection().getRangeAt(0);
		var pars = 'word=' + sel;
		var myAjax = new SimpleAjax('dico.php', 'get', pars, on_success, on_failure);
	}

	// creates a new 'div' element with ID attribute
	// equal to 'tooltip', set the 'onclick' event on that
	// element to 'tooltip_hide' and add it as the new last
	// child of the body

	var adiv = document.createElement("div");
	adiv.id = "tooltip";
	adiv.onclick = tooltip_hide;
	adiv.title = "CLICK TO CLOSE";
	document.querySelector("body").appendChild(adiv);
	document.querySelector("body").ondblclick = tooltip_show;
};
