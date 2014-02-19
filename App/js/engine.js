/* Add one more question up to 10 */
function addQ() {
	var n = getNumAnswers();
	var target = document.getElementById('answers');
	if (n < 10) {
		var field = document.createElement("fieldset");
		field.id = "answer-"+n;
		var legend = document.createElement("legend");
		legend.innerHTML= "Answer " + (n+1);
		field.appendChild(legend);
		
		var labelName = document.createElement("label");
		labelName.htmlFor= "answers[" + n + "][name]";
		labelName.appendChild(document.createTextNode("Name"));
		field.appendChild(labelName);
		
		var inputName = document.createElement("input");
		inputName.required = true;
		inputName.size = 3;
		inputName.name = "answers[" + n + "][name]";
		inputName.maxlength = 3;
		inputName.type = "text";
		var tmp = "a";
		inputName.placeholder = String.fromCharCode(tmp.charCodeAt(0) + n);
		inputName.title = "Your custom enumeration";
		field.appendChild(inputName);
		
		var labelDesc = document.createElement("label");
		labelDesc.htmlFor= "answers[" + n + "][desc]";
		labelDesc.appendChild(document.createTextNode("Description"));
		field.appendChild(labelDesc);
		
		var textarea = document.createElement("textarea");
		textarea.rows = 4;
		textarea.cols = 50;
		textarea.required = true;
		textarea.name = "answers[" + n + "][desc]";
		textarea.placeholder = "The answer's description";
		field.appendChild(textarea);
		
		var button = document.createElement("button");
		button.type = "button";
		button.onclick = function() {removeQ(n)};
		button.appendChild(document.createTextNode("Delete this answer"));
		field.appendChild(button);
		
		target.insertBefore(field, target.lastChild.previousSibling);
		setNumAnswers(n+1);
	}
	updateButtons();
	return false;
}

/* Delete last question at least leave 2 */
function removeQ(i) {
	var n = getNumAnswers();
	if (n > 2 && i >= 2) {
		var e = document.getElementById('answer-'+i);
		e.parentNode.removeChild(e);
		setNumAnswers(n-1);
	}
	updateButtons();
	return false;
}

function getNumAnswers() {
	return parseInt(document.getElementById('num_answers').value);
}

function updateButtons() {
	var buts = document.getElementsByTagName('button');
	for (var i = 0; i < buts.length; i++) {
		buts[i].disabled = (i < (buts.length - 2)); 
	}
}

function setNumAnswers(n) {
	document.getElementById('num_answers').value = n;
}