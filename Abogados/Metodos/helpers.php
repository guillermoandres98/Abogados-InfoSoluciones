<?php require_once 'conexion.php';?>

<?php


function conseguirCausas($conexion){
    $sql = "SELECT * FROM causas ORDER BY id_causas";
    $causas = mysqli_query($conexion, $sql);
    $result = array();
    
    if ($causas && mysqli_num_rows($causas) >= 1) {
        $result = $causas;
    } 
    return $result;
}

?>
 