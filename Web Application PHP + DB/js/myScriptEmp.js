function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

function w3_show_nav(name) {
  document.getElementById("MenuClient").style.display = "none";
  document.getElementById(name).style.display = "block";
}

function w3_show_none() {
  document.getElementById("MenuClient").style.display = "none";
}

function validateImage(input) {
  var path = input.value;

  if (path) {
      var startPath = (path.indexOf('\\') >= 0 ? path.lastIndexOf('\\') : path.lastIndexOf('/'));
      var fileName = path.substring(startPath);

      if (fileName.indexOf('\\') === 0 || fileName.indexOf('/') === 0) {
          fileName = fileName.substring(1);
      }

      var fileExtension = fileName.indexOf('.') < 1 ? '' : fileName.split('.').pop();

      if (fileExtension != 'gif' &&
          fileExtension != 'png' &&
          fileExtension != 'jpg' &&
          fileExtension != 'jpeg') {
          input.value = '';
          alert("You need to select an image file (gif, png, jpg, or jpeg)");
      }
  } else {
      input.value = '';
      alert("Select a valid file path");
  }
  if (input.files && input.files[0]) {
      var fileSize = input.files[0].size / 1024 / 1024;
      if (fileSize < 16) {
          var reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('selectedImage').setAttribute('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      } else {
          input.value = '';
          alert("The file must be an image smaller than 16 MB");
      }
  } else {
      document.getElementById('selectedImage').setAttribute('src', '#');
  }
}
