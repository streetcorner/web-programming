window.onload = function() {

	// to store the element to edit
	var editable;

	// to build the "editor"
	var editor = document.createElement("div");
	var textarea = document.createElement("textarea");
	var paragraph = document.createElement("p");

	var saveButton = document.createElement("input");
	saveButton.type = "button";
	saveButton.value = "save";

	var cancelButton = document.createElement("input");
	cancelButton.type = "button";
	cancelButton.value = "cancel";

	paragraph.appendChild(textarea);
	editor.appendChild(paragraph);
	editor.appendChild(saveButton);
	editor.appendChild(cancelButton);

	editor.setAttribute("id", "editor");
	document.querySelector("body").appendChild(editor);
	editor.style.visibility = "hidden";

	saveButton.onclick = function() {
		var new_content= textarea.value;
		var id= editable.getAtrribute("data-id");
		new SimpleAjax("edit.php","post","id="+id+"&content=" +encodeURI(new_content));
		editable.innerHTML = new_content;
		textarea.value="";
		editor.style.visibility = "hidden";
	};

	cancelButton.onclick = function() {
		textarea.value="";
		editor.style.visibility = "hidden";
	};

	function openEditor(obj) {
		editable=obj;
		textarea.value=obj.innerHTML;
		editor.style.visibility="visible";

	}

	// set the onclick event and title attribute to all editable elements
	var editables=document.querySelectorAll(".editable");
	for(var i = 0; i<editables.length; i++){
		editables[i].onclick = function(){
			openEditor(this);
		}
		editables[i].setAttribute("title","click to edit");
	}
};
