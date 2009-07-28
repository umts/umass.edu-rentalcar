function alternateClasses(id){
  var table = document.getElementById(id);
  var rows = table.rows
  
  for(var i=0; i < rows.length; i++){
    var evenorodd = i % 2
    if (evenorodd == 0 && rows[i].className != 'empty')
      rows[i].className = 'even';
    else if (rows[i].className != 'empty')
      rows[i].className = 'odd';
  }
}