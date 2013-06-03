<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>La mejor eps</title>
</head>

<body>
<script src="jquery.js"></script>

<script>
function up(number){
  id='#'+number
  $(id).insertBefore($(id).prev());
  $.get("calificar.php", { id: number, votacion: "masuno" } ).done(function(data) {
    $(id+'score').html(data);
  });
}

function down(number){
  id='#'+number
  $(id).insertAfter($(id).next());
  $.get("calificar.php", { id: number, votacion: "menosuno" } ).done(function(data) {
    $(id+'score').html(data);
  });

}
</script>

<style type="text/css">
div.inline { display: inline; }
</style>

<ol>

<?
include 'db_connect.php';

if ( $result = $mysqli->query("SELECT * FROM eps ORDER BY calificacion DESC") ) {
  while($eps = $result->fetch_object()){
    echo '<li id="'. $eps->id .'">';
    echo '<a href="#" onclick="up('. $eps->id .')">+1</a> ';
    echo '<a href="#" onclick="down('. $eps->id .')">-1</a> ';
    echo $eps->nombre;
    echo ' <div class="inline" id="'. $eps->id .'score">'. $eps->calificacion .'</div>';
    echo "</li>";
  }
  $result->close();
}

$mysqli->close();
?>
</ol>

</body>
</html>
