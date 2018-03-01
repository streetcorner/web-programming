
// to distinguish between the first
// click and the second click of two
// consecutive clicks
var first_click = true;
// the first image clicked
var first_image;
// if not_finished is true, there
// are still images to swao
var not_finished = true;
// process the click on the image
var num=0;
function click_on(image) {
	if(first_click){ //save info of first_click
		first_image=image;
		first_click=false;
	}
	else{//change two images
		first_click=true;
		var tmp_name = first_image.name;//can't directly change image with first_image
		var tmp_src = first_image.src;//need to change the name and src
		first_image.name = image.name;
		first_image.src = image.src;
		image.name = tmp_name;
		image.src = tmp_src;
		num++; //the total number of steps
	}
	is_finished();
}
// returns true if the puzzle is solved
function is_finished() {
	var img = document.getElementsByTagName("img");
	for(var i=1; i<(img.length-1); i++){
		if(img[i].name>img[i+1].name){
			break;
		}
		if(i===(img.length-2)){
			not_finished=false;
		}
	}
	var result = document.getElementById("result");
	if(!not_finished){
		result.style.visibility="visible";
		not_finished=true;
		alert("Congretulations! You solved the puzzle by "+num+" steps.");
	}
}