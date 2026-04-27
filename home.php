
<?php
include 'db.php';
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
             <style>
                body {
    min-height: 100vh;
    background: linear-gradient(270deg, #203a43, #2c5364, #1c92d2);
    background-size: 600% 600%;
    animation: gradientMove 12s ease infinite;
}

/* background animation */
@keyframes gradientMove {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}
            .card-img-top{
                height:200px;
                
            }
            .card {
    border-radius: 20px;
    overflow: hidden;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    transition: all 0.4s ease;
}

/* hover effect */
.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
}

.card:hover .card-img-top {
    transform: scale(1.1);
}

/* text */
.card-title {
    font-weight: bold;
}

.card small {
    color: #ddd;
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
                    <a class="nav-link active" href="home.php" aria-current="page"
                        >
                        <span class="visually-hidden">(current)</span>Home</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addmenu.php">➕Add Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewmenu.php">View Menu</a>
                </li>
                
            </ul>
            <h3 class="text-primary mx-3"> <?= $_SESSION["name"];?></h3>
            <a
                name=""
                id=""
                class="btn btn-danger"
                href="pdf.php"
                role="button"
                >ExportPdf</a
            >
            
            <form class="d-flex my-2 my-lg-0">
                <button
                    class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                >
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
        </header>
        <main>
            <div
                class="container-fluid p-3 my-4"
            >
            
            
       <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="First slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="1"
                aria-label="Second slide"
            ></li>
            <li
                data-bs-target="#carouselId"
                data-bs-slide-to="2"
                aria-label="Third slide"
            ></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img
                    src="https://foodiewe.com/wp-content/uploads/2026/02/medu-vada-recipe.webp"
                    class="w-100 d-block"
                    alt="First slide"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Idli </h3>
                    
                </div>
            </div>
            <div class="carousel-item">
                <img
                    src="https://www.chefkunalkapur.com/wp-content/uploads/2021/11/3F3A1876-copy-1300x867.jpg?v=1636356843"
                    class="w-100 d-block"
                    alt="Second slide"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h3>MenduVada</h3>
                   
                </div>
            </div>
            <div class="carousel-item">
                <img
                    src="https://www.indianhealthyrecipes.com/wp-content/uploads/2019/04/veg-biryani-recipe-480x270.jpg"
                    class="w-100 d-block"
                    alt="Third slide"
                />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Biryani</h3>
                   
                </div>
            </div>
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselId"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
