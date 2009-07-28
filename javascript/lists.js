function alternateClasses(id){
  var list = document.getElementById(id);
  var rows = list.getElementsByTagName('li');
  
  for(var i=0; i < rows.length; i++){
    var evenorodd = i % 2
    if (evenorodd == 0 && rows[i].className != 'header')
      rows[i].className = 'even';
    else if (rows[i].className != 'header')
      rows[i].className = 'odd';
    if (i == rows.length - 1)
      rows[i].className += ' last'
  }
}