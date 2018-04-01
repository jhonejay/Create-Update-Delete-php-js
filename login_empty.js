function isempty () {

	if (document.getElementById("username").value == "" || document.getElementById("password").value == ""){
		condition();

	}
	
	else if (document.getElementById("username").value != "admin" && document.getElementById("password").value != "admin"){
		condition1();
	}

	else if (document.getElementById("username").value != "admin"){
	alert("Username is Incorrect");

	}

	else if (document.getElementById("password").value != "admin"){
	alert("Password is Incorrect");

	}
}

function condition () {

	alert("Fill Up all information needed!");
}

function condition1 () {

	alert("Username and Password is INCORRECT!");
}