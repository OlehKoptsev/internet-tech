var ajax = new XMLHttpRequest ();

function change_user_data() {
	if (!ajax) {
		alert("Ajax не инициализирован"); return;
	}

	var id = document.getElementById("id").value;
	var login = document.getElementById("login").value;
	var password = document.getElementById("password").value;
	var email = document.getElementById("email").value;
	var comment = document.getElementById("comment").value;

	ajax.onreadystatechange = change_response;

	var params = "id=" + id + "&login=" + login + "&password=" + password + "&email=" + email + "&comment=" + comment;
	var URI = "change.php?"+params;

	ajax.open("GET", URI, true);
	ajax.send(null);
}

function change_response() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			out = document.getElementById('response');
			out.innerHTML = ajax.responseText;
		}
		else console.log(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}
}