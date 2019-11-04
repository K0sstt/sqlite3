let importFile = document.getElementById('selectedData');

importFile.addEventListener('click', function() {
	let selectRows = document.getElementsByClassName('select');
	let columnsName = document.querySelector('#columnsName tr').children;

	const request = new XMLHttpRequest();
	const url = 'modules/saveData.php';
		
	let params = '';
	let i = 0;
	let tmpSelectRows = [];

	do {
		for(row of selectRows) {
			tmpSelectRows.push(row.id);
			row.classList.toggle('not-select');
			row.classList.toggle('select');
		}
		selectRows = document.getElementsByClassName('select');
	} while(selectRows.length > 0);

	tmpSelectRows.sort(function(a, b) {
		if(a > b) return 1;
		if(a == b) return 0;
		if(a < b) return -1;
	});

	selectRows = tmpSelectRows;

	for(let row of selectRows) {

		if(i == selectRows.length - 1) {
			params += i + '=' + row;
		} else {
			params += i + '=' + row + '&';
		}

		i++;
	}

	request.responseType =	"json";
	request.open("POST", url, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	// params += '&do=importSelectedRows';
	request.send(params);

	let downloadFile = document.getElementById('downloadFile')
	if(downloadFile.classList.contains('hide')) downloadFile.classList.remove('hide');

	// importFile.setAttribute('href', '/modules/test.txt');
	// importFile.setAttribute('download', 'test.txt');
	// importFile.click();
	// importFile.classList.add('hide');

	// document.location.reload(true);

});