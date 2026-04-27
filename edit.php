<?php

include 'db.php';
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
$id=$_GET["id"];
$user_id=$_SESSION["id"];
$sql=$conn->prepare("select * from menu_item where id=? and user_id=?");
$sql->bind_param("ii",$id,$user_id);
 $sql->execute();
$menu=$sql->get_result()->fetch_assoc();
if ($_SERVER["REQUEST_METHOD"]==="POST") {

$item=$_POST["item"];
$desc=$_POST["desc"];
$price=$_POST["price"];
$category=$_POST["category"];
$image_name=$menu["image"];

if (!empty($_FILES["image"]["name"])) {
  $image_name=$_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["temp_name"],"uploads/$image_name");
}
$sql2=$conn->prepare("update menu_item set item_name=?,description=?,price=?,category=?,image=? where id=? and user_id=?");
$sql2->bind_param("ssdssii",$item, $desc,$price,$category,$image_name,$id,$user_id);
if ($sql2->execute()) {
    header("Location:viewmenu.php");

}
   else {
            echo"Not updated";
        }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <div class="container col-4 p-4 my-5 border rounded shadow">
<form action="" method="post" enctype="multipart/form-data">
 <div class="mb-3">
    <label for="" class="form-label">Menu Item</label>
    <input
        type="text"
        class="form-control"
        name="item"
        id=""
        aria-describedby="helpId"
        placeholder=""
        value=<?= $menu["item_name"] ?>
    />
  
 </div>
 <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea class="form-control" name="desc" id="" rows="3"><?= $menu["description"]  ?></textarea>
 </div>
 
<div class="mb-3">
    <label for="" class="form-label">Price</label>
    <input
        type="number"
        class="form-control"
        name="price"
        id=""
        aria-describedby="helpId"
        placeholder=""
        value=<?=  $menu["price"] ?>
    />
    </div>
   <div class="mb-3">
    <label for="" class="form-label">Category</label>
    <input
        type="text"
        class="form-control"
        name="category"
        id=""
        aria-describedby="helpId"
        placeholder=""
        value=<?= $menu["category"]  ?>
    />

</div>
<div class="mb-3">
    <label for="" class="form-label">Choose file</label>
    <input
        type="file"
        class="form-control"
        name="image"
        id=""
        placeholder=""
        aria-describedby="fileHelpId"
        value=<?=$menu["image"] ?>
    />
    <div id="fileHelpId" class="form-text">Help text</div>
</div>

<button
    type="submit"
    class="btn btn-primary"
>
    Submit
</button>

</form>
</div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
