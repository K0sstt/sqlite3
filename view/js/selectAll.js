let selectAll = document.getElementById('selectAll');

selectAll.addEventListener('click', function() {

	let rows = document.getElementsByClassName('not-select');

	do {			
		for(let row of rows) {
			row.classList.remove('not-select');
			row.classList.add('select');
		}
		rows = document.getElementsByClassName('not-select');
	} while(rows.length > 0);

});