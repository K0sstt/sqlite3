document.getElementById('table').onclick = function(e) {
	let row = e.target.parentElement;
	row.classList.toggle('not-select');
	row.classList.toggle('select');	
};