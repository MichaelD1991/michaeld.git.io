<?php
// include database configuration file
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SnackShack</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">

        <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


       <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


            <nav class="navbar navbar-custom" role="navigation">

            <div class="container">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="index.php" a class="navbar-brand"><img class="img-responsive" src="images/logo.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav">

                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="viewCart.php"><i class="fa fa-shopping-cart"></i></a>       
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-twitter color-twitter "></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook color-facebook"></i></a></li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<div class="container">



        <!-- Jumbotron Header -->
        <header class="jumbotron product-display">


            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="images/slideshow/bar1.jpg" alt="Protein bar">
                </div>

                <div class="item">
                  <img src="images/slideshow/bar2.jpg" alt="Protein bar">
                </div>

                <div class="item">
                  <img src="images/slideshow/bar3.jpg" alt="Protein bar">
                </div>

                <div class="item">
                  <img src="images/slideshow/bar4.jpg" alt="Protein bar">
                </div>

                <div class="item">
                  <img src="images/slideshow/bar5.jpg" alt="Protein bar">
                </div>

              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            
        </header>


    <h1 class="heading-product">Products</h1>

    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="products">
                    <?php echo '<img class="img-responsive"  src="'.$row["image"].'" alt="">';?>
                    <div class="caption">
                        <h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
                        <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                        <br>
                        <div class="col-lg-12">
                            <table style="width:100%">
                              <caption>Nutritional breakdown</caption>
                              <tr>
                                <th></th>
                                <th>RDA</th>
                              </tr>
                              <tr>
                                <td>Protein</td>
                                <td><?php echo $row["protein"]; ?></td>
                              </tr>
                              <tr>
                                <td>Fat</td>
                                <td><?php echo $row["fat"]; ?></td>
                              </tr>
                            </table>
                            <br>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-6">
                            <p class="lead"><?php echo '€'.$row["price"]; ?></p>
                            </div>

                            <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>

            <!-- Footer -->
        <footer>
        <section>

        <div class="row">

        <p> SnackShack 2017 </p>
            
        </div>
                
        </section>

        </footer>
</div>



</body>
</html>