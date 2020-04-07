<?php
   include("session.php");

    $sql = "select * from product";
    $result = mysqli_query($db,$sql);


?>
<html>
   
    <head>
        <title>Welcome </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/welcome.css">
    </head>
    
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="/project/images/logo.jpg" width="45" height="30" class="d-inline-block align-top" alt="">ShopNOW</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="spacer">
            <a href="#" class="btn btn-primary">Welcome <?php echo $login_session; ?></a>
            <a href="logout.php" class="btn btn-primary">Sign Out</a>
            </div>
        </div>
        </nav>

        <!-- Body-->
        <section>
            
            <div class="cards"  >
                <?php 
                while($rows=mysqli_fetch_array($result)){
                    
                    $image = $rows['prod_img'];
                    ?>
                <div class="card" >
                    <img class="card-img-top" src='<?php echo $image;  ?>'' alt="Card image cap" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['prod_name'] ?></h5>
                        <p class="card-text"><?php echo $rows['prod_price'] ?></p>
                        <a href="#" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
                <?php    }?>
            </div> 
        </section>
    </body>
   
</html>