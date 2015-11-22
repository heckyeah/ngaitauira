function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var width = this.width,
          height = this.height,
          type = file.type, // ext only: // file.type.split('/')[1],
          name = file.name,
          size = ~~(file.size/1024) +'KB';
      $('#uploadPreview').before('<li class="image"><img src="' + this.src + '"></li>');
    };
    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };      
  };
}

$("#choose").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }
  var F = this.files,
      imageList = [];
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
    }
  }
});


