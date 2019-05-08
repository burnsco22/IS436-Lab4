"use strict";

/*This page is used to display the search results.
By: Courtney Burns
Last modified: Dec 18, 2018 2:18pm*/

window.onload=pageLoad;
function pageLoad(){
	document.getElementById("majorSearch").onmouseover=preferenceAlert;
	document.getElementById("majorSearch").onmouseout=preferenceAlert;
	document.getElementById("interestSearch").onmouseover=preferenceAlert;
	document.getElementById("interestSearch").onmouseout=preferenceAlert;
	document.getElementById("preferencesApply").onmouseover=preferenceAlert;
	document.getElementById("preferencesApply").onmouseout=preferenceAlert;
	document.getElementById("majorInput").onclick=majorComplete;
	document.getElementById("interestInput").onclick=interestComplete;
};

//This case fires when the user mouses over the search buttons to give hints describing what each search does
function preferenceAlert() {
		var searchHint;
	if ((event.type == "mouseover")) {
		switch(event.target.id){
			case "majorSearch":
				document.getElementById("majorSearch").style.backgroundColor = '#073763ff';
				document.getElementById("majorSearch").style.color = 'orange';
				searchHint = 0;
				break;
			case "interestSearch":
				document.getElementById("interestSearch").style.backgroundColor = '#073763ff';
				document.getElementById("interestSearch").style.color = 'orange';
				searchHint = 1;
				break;
			case "preferencesApply":
				document.getElementById("preferencesApply").style.backgroundColor = '#073763ff';
				document.getElementById("preferencesApply").style.color = 'orange';
				searchHint = 2;
				break;
		}
	}
	//if the mouse isn't on a button, it goes back to normal
	else if (event.type == "mouseout"){
		document.getElementById("majorSearch").style.backgroundColor = 'orange';
		document.getElementById("majorSearch").style.color = '#073763ff';
		document.getElementById("interestSearch").style.backgroundColor = 'orange';
		document.getElementById("interestSearch").style.color = '#073763ff';
		document.getElementById("preferencesApply").style.backgroundColor = 'orange';
		document.getElementById("preferencesApply").style.color = '#073763ff';
		searchHint = 3;
	}
	//these are the messages that are displayed when each case is fired
	var hints = [
		"Type the name of a major that you would like to learn more about.",
 		"Type an interest of yours that you would like your major to be related to.",
		"By clicking this button, you will choose to use your chosen interests from your profile to search for majors.",
 		""]

	document.getElementById("messageBox").innerHTML = hints[searchHint]; 
}

//This is an autocompleter that will offer the names of the majors in our database
function majorComplete() {
	new Autocompleter.Local(
	    "majorInput", //element where user is entering text that needs to be matched
	    "alertBox", //element to fill with matches
	    ["American Studies", "Biochemistry", "Computer Science", "Information Systems"], //array of matches
	    {}
	  );
}
//This is an autocompleter that will offer the names of the interests relating to majors in our database
function interestComplete() {
	new Autocompleter.Local(
	    "interestInput", //element where user is entering text that needs to be matched
	    "alertBox", //element to fill with matches
		["computers", "chemistry", "policy", "education", "science","medicine", "cooking", "problem-solving", "data", "mathematics", "design", "management", "economics", "construction", "social work", "culture", "business", "architecture", "dentistry", "research"], //array of matches
	    {}
	  );
}