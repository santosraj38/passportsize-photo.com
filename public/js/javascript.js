
$('[name="watermark"]').change(function(e){
  var files = e.target.files;

  if (files.length<2) {
    $.each(files,function(i,file){
      if (file.size>99097153) {
        alert('File size larger than 20MB');
      }else {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
          var template = '<img id="img" class="ui image" src="'+e.target.result+'" width="200px" height="200px" />';
          $('#viewwatermark').html(template);
        };
      }

    });
  }else {
    alert('Choose Only One Image')
  }
  //var width = img.clientWidth();
  //var height = img.clientHeight();

});


$('[name="image"]').change(function(e){
  var files = e.target.files;

  if (files.length<2) {
    $.each(files,function(i,file){
      if (file.size>99097153) {
        alert('File size larger than 20MB');
      }else {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
          var template = '<img id="img" class="ui image" src="'+e.target.result+'" width="200px" height="auto" />';
          $('#viewlogo').html(template);
        };
      }

    });
  }else {
    alert('Choose Only One Image')
  }
  //var width = img.clientWidth();
  //var height = img.clientHeight();

});


$('.ui.dropdown').dropdown();


$('[name="unit"],[name="unitvalue"]').change(function(){
  var unitvalue = $('[name="unitvalue"]').val();
  var unit = $('[name="unit"]').val();

  if (unit=='mm') {
    var finalvalue = unitvalue*3.77952755906;
  }else if (unit=='cm') {
    var finalvalue = unitvalue*37.7952755906;
  }else if (unit=='inch') {
    var finalvalue = unitvalue*96;
  }
  $('[name="pixelvalue"]').val(finalvalue);
});

$('.ui.accordion').accordion();
