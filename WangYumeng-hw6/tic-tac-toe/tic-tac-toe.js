"use strict";
// the grid is 3x3
var size = 3;

// if grid[i][j] == -1, the cell (i,j) is empty, else grid[i][j]
// is the player number who ticked that cell (0 or 1)
var grid = [[-1, -1, -1], [-1, -1, -1], [-1, -1, -1]];

// the name of the players
var player_name = ["", ""];

// the image for each player
var player_image = ["O.png", "X.png"];

// the current player
var current_player = 0;

// the total number of clicks
var clicks = 0;

// if play is false, the clicks are disabled
var play = false;

// return the other player
function next(player) {
	return ((player + 1) % 2);
}

// checks if the player filled the row
function winning_row(player, row) {
	for(var j= 0; j< size ; j++){
		if(grid[row][j]!= player)//
			break;
		if(j ==size-1){
			//play= false;
			return 1;
		}
	}
	return 0;
}

// checks if the player filled the column
function winning_column(player, column) {
	for(var j= 0; j< size ; j++){
		if(grid[j][column]!= player)//-1
			break;
		if(j ==size-1){
			return 1;
		}
	}
	return 0;
}

// checks if the player filled the downward diagonal
function winning_diagonal_down(player) {
	for(var i = 0; i < size; i++){
		if (grid[i][i] !=player)
			break;
		if(i== size-1)
			return 1;
	}
	return 0;
}

// checks if the player filled the upward diagonal
function winning_diagonal_up(player) {
	for(var i =0; i< size; i++){
		if(grid[i][size-1-i]!=player)
			break;
		if(i==size-1)
			return 1;
	}
	return 0;
}

// checks if the player filled one of the two diagonals
function winning_diagonal(player) {
	if(winning_diagonal_down(player) || winning_diagonal_up(player)){
		return 1; 
	}
	else return 0;
}

// checks if the player filled a row, a coloumn or a diagonal
function is_winner(player) {
	for(var i =0; i < size; i++){
		if(winning_row(player,i)){//1
			play=false;//stop click
		}
		if(winning_column(player,i)){//1
			play=false;
		}
	}
	if(winning_diagonal(player)) play=false;

	if(!play) return true;
}

// display the result about the winner
function and_the_winner_is(player) {
	return "The winner is "+ player_name[current_player];
}

// process the click on the object image
// in the cell (row,column) in the grid, 
function click_at(row, column, image) {
	if(play){ //play allowed
		if(grid[row][column]==-1){
			grid[row][column]= current_player;//fill in the array by player id
			image.src = player_image[current_player];
			clicks++;
			if(is_winner(current_player) || clicks ==size*size){
				var final = document.getElementById("final");
				final.style.visibility ="visible";
				var winner = document.getElementById("winner");
				if(is_winner(current_player))
					winner.innerHTML = and_the_winner_is(current_player);
				else
					winner.innerHTML = "It's a draw."
			}
			else{
				current_player=next(current_player);
				msg(current_player);
			}

		}
		
	}
}

// display a message in the element of ID "msg"
function msg(message) {
	var msg =document.getElementById("msg");
	msg.innerHTML = player_name[message] + " is playing...";
}

// set the name of the players
function set_players() {
	var player1 = document.getElementById("player1");
	var player2 = document.getElementById("player2");
	player_name.pop();
	player_name.pop();
	player_name.unshift(player2.value);//top
	player_name.unshift(player1.value);
	//choose who start
	var start = document.getElementById("start");
	start.style.visibility="visible";

	var first_player= document.getElementById("first_player");
	var second_player = document.getElementById("second_player");
	first_player.innerHTML = player_name[0];
	second_player.innerHTML = player_name[1];
}

// allow the game to start
function start_game() {
	play=true;
	var check_second= document.getElementById("check_second");
	if(check_second.checked){
		current_player=1;
	}
	msg(current_player);
}

// process the play-again action
function play_again() {
	window.location.href = "index.html";
}

// process the quit action
function quit() {
	window.location.href = "../index.php";
}

