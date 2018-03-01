
// the array of the path of the images
var array = [];
var img = document.images;
// if clicked[i] is true, array[i] is visible
var clicked = [];
for(var i =0 ; i < img.length; i++){
	clicked[i]=false;
}
// to distinguish between the first
// click and the second click of two
// consecutive clicks
var first_click = true;

// the index in the array of the first image clicked
var first_index = 0;

// the total number of pairs of clicks
var clicks_number = 0;

// the number of good pairs of clicks
// (i.e. clicks which revealed two identical images)
var good_clicks_number = 0;

// change the content of the attribute src of the two
// images at index i and j to the question mark image
function hide(i, j) {
	img[i].src ="question-mark.png";
	img[j].src ="question-mark.png";
}

// process the click on image at index n
function click_image(n) {
	//document.write("namni");
	//alert(clicked[n]);
	if(!clicked[n]){
		img[n].src = array[n];//visible after click on the picture

		if(first_click){//save the information of first
			first_click =false;
			first_index = n;
			//document.write("1");
		}
		else{//the second click
			//document.write("2");
			first_click =true;
			clicks_number++;
			if(n!=first_index && array[n]===array[first_index]){ //matching
				good_clicks_number++;
				clicked[n]=true;
				clicked[first_index]=true;
			}
			else if(n===first_index || array[n]!==array[first_index]){
				//hide(first_index,n);
				setTimeout(function(){hide(n,first_index);},500);//don't forget""
				//document.write("inequality");
			}
		}

		/*if(img.length === good_clicks_number *2)*/
		for(var i= 0; i < img.length; i++){
			if(!clicked[i])
				break;
			if(i==(img.length-1))
			{
				/*document.write("succ");*/
				var result = document.getElementById("result");
				result.innerHTML="Good Memory!";
				result.style.visibility ="visible";//don't forget ""
				alert("You solved within "+clicks_number+" clicks!")
			}	
		}
	}
}
// fill the array with the content of the name
// attribute of the images
function fill_array() {
	for(var i=0; i< img.length; i++){
		array.push(img[i].name);
	}
}

// to fill the array before the game starts
window.onload = fill_array;

