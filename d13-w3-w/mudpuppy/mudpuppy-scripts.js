var tick = 30;
var alive = 1;
var image_prefix = '';
var image = 'default.gif';

function oneTick(){
	hunger -= 1;
	love -= 1;
	energy += 50;		
	if (hunger < 25){
		fat -= 1;
		love = love - 1;
	}
	else {
		hunger -= 1;
	}
	if (love < 25){
		fat -= 1;
	}
    checkHealth();
}

function printStats(){
	document.getElementById('puphere').innerHTML = "<p>Name: " + name + "</p>\n";
	document.getElementById('puphere').innerHTML += "Love: " + love + "</p>";
	document.getElementById('puphere').innerHTML += "Hunger: " + hunger + "</p>";
	document.getElementById('puphere').innerHTML += "Fatness: " + fat + "</p>";
	document.getElementById('puphere').innerHTML += "Energy: " + energy + "</p>";
	
}

function feed(){
	if (hunger < 100){
		love += 10;
		hunger += 50;
		energy += 5;
		document.getElementById('puphere').innerHTML = "<p>" + name + " eats the food.</p>\n";
		if (hunger > 100) {
			document.getElementById('puphere').innerHTML += "<p>" + name + " looks very full.</p>\n";
			extra = hunger - 100;
			hunger = hunger - extra;
			fat = fat + Math.round(extra/2);
		}	
	}
	else {
		document.getElementById('puphere').innerHTML = "<p>" + name + " ignores the food and looks unhappy.</p>\n";
		love = love -10;
	}
	checkHealth();
}

function play(){
	if ((hunger > 50) && (energy > 10)) {
		love += 10;
		fat -= 5;
		hunger -= 15;
		energy -= 20;
		document.getElementById('puphere').innerHTML = "<p>" + name + " plays merrily.</p>\n";
	}
	else {
		document.getElementById('puphere').innerHTML = "<p>" + name + " won't play!</p>\n";
		love -= 5;
	}
	checkHealth();
}

function death(){
    var buttons = document.getElementsByTagName('input');
    for (var i =0; i<buttons.length; i++){
        buttons[i].value = 'end game';
        buttons[i].setAttribute('onclick', 'saveGame()');
        //buttons[i].style.color = 'red';
    }
}

function checkHealth(){
	
	image_prefix = '';
	image = 'default.gif';
	
	if (fat>75){
		image_prefix = "obese_";
	}
	if (love > 75) {
		image = 'love.gif';
	}
	if (love < 25) {
		image = 'sad.gif';
	}
	if (hunger < 25){
		image_prefix = '';
		image = 'hungry.gif';
	}
	if (energy < 0){
		energy = 0;
		document.getElementById('puphere').innerHTML += "<p>" + name + " is exhausted.</p>\n";
	}
	else if (energy < 25){
		document.getElementById('puphere').innerHTML += "<p>" + name + " is very tired.</p>\n";
	}
	if (energy > 100) {
		energy = 100;
	}
	if (fat<0) {
		fat = 0;
	}
	if (love>100) {
		love = 100;
	}
	if (love< 0 || hunger<0 || fat >100){
		if(love < 0){
			document.getElementById('puphere').innerHTML += "<p>" + name + " has died of a broken heart.</p>\n";
		}
		if(hunger<0){
			document.getElementById('puphere').innerHTML += "<p>" + name + " has starved to death.</p>\n";
		}
		if(fat > 100){
			document.getElementById('puphere').innerHTML += "<p>" + name + " has become too fat to survive.</p>\n";
		}
        alive = 0;
        image = 'dead.gif';
        death();
	}
	document.getElementById('pupimg').setAttribute('src', '/mudpuppy/images/' + image_prefix + image);
}

function saveGame(){
	document.getElementById('puphere').innerHTML += "<form id='hiddenform' method='post' action='index.html' style='position: fixed; top: -1000;'></form>";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='alive' value='" + alive + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='pup_id' value='" + pup_id + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='name' value='" + name + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='hunger' value='" + hunger + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='fat' value='" + fat + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='love' value='" + love + "' />";
	document.getElementById('hiddenform').innerHTML += "<input type='hidden' name='energy' value='" + energy + "' />";
	document.getElementById('hiddenform').innerHTML += "</form>";
	document.getElementById('hiddenform').submit();
}

function startClock(){
	checkHealth();
	if (alive){
		alert("This happened.");
		var oldticks = Math.floor(time/tick);
		var curticks = Math.floor(curtime/tick);
		for (var i=0; i<(curticks-oldticks); i++){
			oneTick();
		}
		setTimeout(function(){oneTick(); setInterval(oneTick, tick * 1000)}, (curtime-time)*1000);
	}
}


