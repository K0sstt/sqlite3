let importFileButton = document.getElementById('selectedData');
let downloadButton = document.getElementById('downloadFile');

downloadButton.addEventListener('click', function() {
	importFileButton.classList.add('hide');
	downloadButton.classList.add('hide');
});