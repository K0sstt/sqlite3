let importFile = document.getElementById('import');

importFile.addEventListener('click', function() {
	let selectRows = document.getElementsByClassName('select');
	let columnsName = document.querySelector('#columnsName tr').children;

	const request = new XMLHttpRequest();
	const url = 'modules/saveData.php';
		
	let params = '';
	let i = 0;

	for(let row of selectRows) {

		if(i == selectRows.length - 1) {
			params += i + '=' + row.id;
		} else {
			params += i + '=' + row.id + '&';
		}

		i++;

		row.classList.toggle('not-select');
		row.classList.toggle('select');

		// for(let i = 0; i <= row.children.length; i++) {
		// 	if(typeof columnsName[i] !== 'undefined') {
		// 		// console.log(columnsName[i].innerText);
		// 		if(row.children[i].innerText == '') {
		// 			params += columnsName[i].innerText + '=' + row.children[i].innerText + ' ';
		// 		} else {
		// 			params += columnsName[i].innerText + '=' + row.children[i].innerText;
		// 		}
		// 		if(i != row.children.length) {
		// 			params += '&';
		// 		}	
		// 	}
		// }
	}

	request.responseType =	"json";
	request.open("POST", url, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send(params);
	alert('ok');

});