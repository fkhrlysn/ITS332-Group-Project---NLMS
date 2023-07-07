<!doctype html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/global.css">
    <title>Home</title>
	<style>
	footer {
		width:100%;
		text-align: center;
		padding: 3px;
		background-color: darkslategrey;
		color: white;
		bottom: 0px;
		position:fixed;
	}
	.background{
		background-color: #fff;
		margin-top: 20px;
		padding: 20px;
	}
	</style>
  </head>
  <body>
    <header>
        <?php 
			if( $_SESSION['position']='manager'){
				include 'navigationManager.php';
			}
			else{
				include 'navigation.php';
			}
		?>
    </header>
    <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/nsi.jpg" alt="First slide" width="1100" height="500">
            
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/nasiLmak.jpg" alt="Second slide" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/milo-tabur.jpg" alt="Third slide" width="1100" height="500">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
	 <div class="row">
		<div class="col-sm-7 col-md-8 col-lg-8">
			<div class="background">
				<h4>Nasi Lemak Warisan Mak Sarah</h4>
				<p>Nasi Lemak Warisan Mak Sarah was established in 2014. Since then, it’s the first branch was in Hulu Langat, Selangor. Nasi Lemak Warisan Mak Sarah or also known as ‘nasi lemak pendekar’ was famously in high demand for its special menu, Ayam Goreng Halia.The company got a lot of positive reviews during its first year of business as they start to widen their business in Malaysia. In 2017, the company opened its second branch in Batu Berendam, Melaka.</p>
			</div>
		</div>
		<div class="col-sm-0 col-md-0 col-lg-1"></div>
		<div class="col-sm-5 col-md-4 col-lg-3">
			<img src="images/nlms.png" width="200px" height="200px">
		</div>
	 </div>
    </div>
	<br>
	<br>
	<br>
	<footer class="page-footer font-small blue ">
		<div class="footer-copyright text-center py-3">
			Nasi Lemak Warisan Mak Sarah
		</div>
	</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>