//random number generator between 1 and 6
var randNumber1 = Math.floor(Math.random() * 6) + 1; 

// generating image corresponding to dice roll
var randImageSrc = "images/dice" + randNumber1 + ".png"; 


var img1 = document.querySelectorAll("img")[0];

//changing src to new image
img1.setAttribute("src", randImageSrc);

//sama process for dice 2
var randNumber2 = Math.floor(Math.random() * 6) + 1;

var randImageSrc2 = "images/dice" + randNumber2 + ".png";

document.querySelectorAll("img")[1].setAttribute("src", randImageSrc2);

//if player one wins
if (randNumber1 > randNumber2) {
  document.querySelector("h1").innerHTML = "Player 1 Wins!";
}
//if player 2 wins
else if (randNumber2 > randNumber1) {
  document.querySelector("h1").innerHTML = "Player 2 Wins!";
}
else {
  //if draw
  document.querySelector("h1").innerHTML = "Draw!❌";
}
