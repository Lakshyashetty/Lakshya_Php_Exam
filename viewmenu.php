<?php
//home 

include("db.php");

if ( ! isset($_SESSION["id"])) {
    header("Location:login.php");
}
 $user_id = $_SESSION["id"];
$sql=$conn->prepare("select * from menu_item where  user_id=?");
$sql->bind_param('i',$user_id);
$sql->execute();
$res = $sql->get_result();
 
$result = $conn->query("select menu_item.* , user.name from menu_item join user on menu_item.user_id=user.id");
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
   body {
            min-height: 100vh;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #5f2c82, #49a09d, #ff6a88);
            background-size: 400% 400%;
            animation: bodyMove 12s ease infinite;
            position: relative;
        }

        @keyframes bodyMove {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
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
                    <a class="nav-link active" href="addmenu.php">Add Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewmenu.php">View Menu</a>
                </li>
                
            </ul>
             <h3 class="text-primary mx-3"> <?= $_SESSION["name"];?></h3>
            <a
                name=""
                id=""
                class="btn btn-primary mx-3"
                href="pdf.php"
                role="button"
                >ExportPdf</a
            >
            <form class="d-flex my-2 my-lg-0"  action="logout.php">
                <button
                    class="btn btn-outline-danger my-2 my-sm-0"
                    type="submit"
                >
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
        </header>
       <div   class="container my-3  mt-4">
    <div
        class="row justify-content-center align-items-center g-2"
    >
    <?php while ($row=$result->fetch_assoc()) {
        ?>
        <div class="col-md-4 p-2"><div class="card">
            <img class="card-img-top" src="uploads/<?= $row["image"] ?>" alt="Title" />
            <div class="card-body">
                <h4 class="card-title"><?= $row["item_name"] ?> || <?php echo "₹"; ?> <?= $row["price"]?></h4>
                <h5><?=  $_SESSION["created_at"];?></h5>
               <small><?= $row["category"] ?>  </small>
                <p class="card-text"> <?= $row["description"] ?> </p>
<p>

<?php  if ($_SESSION["id"]==$row["user_id"]) {?>

<a
    name=""
    id=""
    class="btn btn-primary"
    href="edit.php?id=<?=$row["id"];  ?>"
    role="button"
    >Edit</a
>
<a
    name=""
    id=""
    class="btn btn-primary"
    href="delete.php?id=<?=$row["id"];  ?>"
    role="button"
    >Delete</a
>
<?php } ?>

</p>

            </div>
        </div>
        </div>
       <?php  }?>
    </div>
    
</div>
 </div>

    <div class="table-card">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-center">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th>Item_Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $res->fetch_assoc()) { ?>
                                    <tr>
                                        <!-- <td>< $row["book_id"] ></td> -->
                                        <td><?= $row["item_name"] ?></td>
                                        <td><?= $row["description"] ?></td>
                                        <td><?= $row["price"] ?></td>
                                        <td><?= $row["category"] ?></td>
                                        <td><?= $row["image"] ?></td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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




