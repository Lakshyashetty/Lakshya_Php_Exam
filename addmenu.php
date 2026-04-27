<?php
include 'db.php';
if ( ! isset($_SESSION["id"])) {
    header("Location:login.php");
}

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $item=$_POST["item"];
    $desc=$_POST["desc"];
    $price=$_POST["price"];
    $category=$_POST["category"]; 
   $user_id=$_SESSION["id"];
    $image_name=$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["temp_img"],"uploads/$image_name");
    $sql=$conn->prepare("insert into menu_item(item_name,description,price,category,image,user_id)values(?,?,?,?,?,?) ");
    $sql->bind_param("ssdssi",$item,$desc,$price,$category,$image_name,$user_id);
    if ($sql->execute()) {
        header("Location:viewmenu.php");
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
        <style>
            .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.28);
            transform: scale(1.01);
        }

        .table tbody td {
            color: black;
            border-color: rgba(255, 255, 255, 0.12);
            padding: 14px 10px;
            transition: 0.35s ease;
        }

        .table tbody td:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #ffe082;
            transform: translateY(-2px) scale(1.02);
            font-weight:bold;
        }

        
        </style>
    </head>

    <body>
        <header>
<nav
    class="navbar navbar-expand-sm navbar-light bg-light"
>
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="home.php" aria-current="page"
                        >
                        <span class="visually-hidden">(current)</span>Home</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="addmenu.php">➕Add Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewmenu.php">View Menu</a>
                </li>
                
            </ul>
             <h3 class="text-primary mx-3"> <?= $_SESSION["name"];?></h3>
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="pdf.php"
                role="button"
                >ExportPdf</a
            >

            <form class="d-flex my-2 my-lg-0" action="logout.php">
                <button
                    class="btn btn-outline-danger my-2 my-sm-0"
                    type="submit"
                >
                    logout
                </button>
            </form>
        </div>
    </div>
</nav>

        </header>
              <main>

<div class="container col-4 p-4 my-3 border rounded shadow">
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
        required
    />
  
 </div>
 <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea class="form-control" name="desc" id="" rows="3" required></textarea>
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
        required
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
        required
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
        required
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
