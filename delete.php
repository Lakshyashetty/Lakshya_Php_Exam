<?php


include 'db.php';
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
$id=$_GET["id"];
$user_id=$_SESSION["id"];
$sql=$conn->prepare("delete from menu_item where id=? and user_id=?");
$sql->bind_param("ii",$id,$user_id);
 $sql->execute();
?>