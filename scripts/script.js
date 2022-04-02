const uploadButton = document.querySelector(".form__upload");

function getFileData(myFile) {
  var file = myFile.files[0];
  if (file) var filename = file.name;
  else var filename = 0;
  if (filename) {
    filename.length > 30
      ? (uploadButton.textContent = `${filename.substr(0, 27)}...`)
      : (uploadButton.textContent = filename);
  } else {
    uploadButton.textContent = "Upload Publication";
  }
}
