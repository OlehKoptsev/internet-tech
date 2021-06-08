var ajax = new XMLHttpRequest ();

function add_user_data() {
	if (!ajax) {
		alert("Ajax не инициализирован"); return;
	}

	var uid = document.getElementById("uid").value;
	var login = document.getElementById("login").value;
	var password = document.getElementById("password").value;
	var email = document.getElementById("email").value;
	var comment = document.getElementById("comment").value;

	ajax.onreadystatechange = write_response;

	var params = "id=" + uid + "&login=" + login + "&password=" + password + "&email=" + email + "&comment=" + comment;
	var URI = "write.php?"+params;

	ajax.open("GET", URI, true);
	ajax.send(null);
}

function write_response() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			alert(ajax.responseText);
			setTimeout(get_user_data, 1000);
		}
		else console.log(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}
}

function get_user_data() {
	if (!ajax) {
		alert("Ajax не инициализирован"); return;
	}

	ajax.onreadystatechange = update_user_data;

	var URI = "get.php";

	ajax.open("GET", URI, true);
	ajax.send(null);
}

function update_user_data() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			document.getElementById('user_info').innerHTML = ajax.responseText;
			addRowHandlers();
		}
		else console.log(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}
}

function addRowHandlers() {
	var table = document.getElementById("tableId");
	var rows = table.getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++) {
		var currentRow = table.rows[i];
		var createClickHandler = function(row) {
			return function() {
				var cells = row.getElementsByTagName("td");
				var id = cells[0].innerHTML;
				var login = cells[1].innerHTML;
				var pass = cells[2].innerHTML;
				var email = cells[3].innerHTML;
				var comment = cells[4].innerHTML;
				// alert(id + ' ' + login + ' ' + pass + ' ' + email + ' ' + comment)
				window.location = 'change_form.php?id=' + id + '&login=' + login + '&password=' + pass + '&email=' + email + '&comment=' + comment;
			};
		};
		currentRow.onclick = createClickHandler(currentRow);
	};
};

get_user_data();
