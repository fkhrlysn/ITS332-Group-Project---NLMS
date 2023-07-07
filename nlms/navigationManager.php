<?php include('connection.php');?>
<nav class="navbar navbar-expand-lg navbar-dark  " style="background-color: darkslategrey;">
    <div class="container">    
        <a class="navbar-brand" href="#" style="font-family: dalgona;">Nasi Lemak Mak Sarah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link " href="Menu1.php" >Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="order.php">Order</a>
                </li>
                <li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff    
                  </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="MyProfile.php">My Profile</a>
                        <a class="dropdown-item" href="registration.php">Register Staff</a>
                        <a class="dropdown-item" href="staff.php">Staff List</a>
                </div>
                </li>
				<li class="nav-item ">
                  <a class="nav-link " href="Logout.php" >Logout</a>
                </li>
              </ul>
        </div>
     </div>
</nav>