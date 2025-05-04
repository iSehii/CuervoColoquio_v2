<?php
session_start();
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
/* 
    if ($_SESSION['id_rol'] == 1 ) {
      header('Location: /pgs/admin/index.php'); 
    } else {
*/
      include 'logueado.php';
    
} else {
  include 'no-logueado.php';
}
?>