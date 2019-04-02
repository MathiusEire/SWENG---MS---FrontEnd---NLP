function readfile(){
    jQuery.get('sport.txt',function(txt) ){
      $('#output').text(txt);
    });
}
