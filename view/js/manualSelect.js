let importSelectedData = document.getElementById('selectedData');

document.getElementById('table').onclick = function(e) {
	let row = e.target.parentElement;
	row.classList.toggle('not-select');
	row.classList.toggle('select');
	if(document.getElementsByClassName('select').length > 0) {
		importSelectedData.classList.remove('hide');
	} else {
		importSelectedData.classList.add('hide');
	}
};