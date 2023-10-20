<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <!--navbar-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="" width="50px">
            <a href="index.php" class="navbar-brand">Home</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsupo">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navsupo">
                <!--left-->
             <div class="navbar-nav">
                <a href="cart.php" class="nav-link"> Cart</a>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="#"
                         class="dropdown-item"></a>
                         <a href="#"
                         class=" dropdown-item"></a>                                                
                    </div>
                </div>
             </div>
             <!--right-->
             <div class="navbar-nav ms-auto">
                    <?php
                    session_start();
                    if(isset($_SESSION['user_name'])):
                    ?>
                    <a href="login.php" class="nav-link">Welcom,<?=$_SESSION['user_name']?></a>
                    <a href="logout.php" class="nav-link">Logout</a>
                    <?php
                    else:
                    ?>
                    <a href="Register.php" class="nav-link">Register</a>
                    <a href="Login.php" class="nav-link">Login</a>
                    <?php
                    endif;
                    ?>
                </div>            
            </div>
        </nav>
            <br>
    <div class="container">
        <div class="row">
            <article>
            <header>
               <h1 style="text-align: center;color:palevioletred;"> ATN ShopToy Store </h1>
               <p clas="hh" style="text-align:center;color:peru;" > WELCOME TO ATN SHOPTOY STORE </p>
            </header>    
              
            <section class="py-5 text-center container"
            style="background-image:url ('https://thegioingoaingu.com/pic/New/pic-News-_636283624482057157.JPG'); height: 600px;">
        <div class="row py-ly-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"> ATN ShopToy STORE</h1>
                <p class="lead text-muted"> With many years of experience in the market of selling children's toys to the Vietnamese market, ATN ShopToy Store is confident in bringing children useful toys for learning and playing to help children develop mentally. 
                    mentally and physically. ATN ShopToy Store includes many stores throughout the provinces and cities of Vietnam, allowing customers to shop anywhere or buy on the store's website and receive goods at home.<br>
                    ATN ShopToy Store is very pleased and grateful to our customers.
                </p>
            </div>
        </div>
    </section>          
    <div class="b-example-divider"></div>
    <!----body---->
    