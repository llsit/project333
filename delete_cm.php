<?php
require("config.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM comments WHERE id_com='$id'");
header("location: index.php");
}
mysqli_close($conn);
?>