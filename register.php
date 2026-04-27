<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST["name"];
    $email=$_POST["email"];
     if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "</script>alert('Email is invalid') </script> ";
    }
    $pass=password_hash($_POST["pass"],PASSWORD_DEFAULT);
    $sql=$conn->prepare("insert into user(name,email,password) values (?,?,?)");
    $sql->bind_param("sss",$name,$email,$pass);
    if ($sql->execute()) {
        header("Location:login.php");
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
         .container {
            margin-top: 40px;
            margin-bottom: 40px;
            padding: 25px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.18);
            
        }

        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
<div
    class="container col-4 my-4 p-3"
>
<form action="" method="post">
<h3  class="text-center " >Register Page </h3>
<div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input
        type="text"
        class="form-control"
        name="name"
        id=""
        aria-describedby="helpId"
        placeholder=""
    />
   
</div>
<div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input
        type="email"
        class="form-control"
        name="email"
        id=""
        aria-describedby="emailHelpId"
        placeholder="abc@mail.com"
    />
    <small id="emailHelpId" class="form-text text-body-secondary"
        >Help text</small
    >
</div>
<div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input
        type="password"
        class="form-control"
        name="pass"
        id=""
        placeholder=""
    />
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
