<?php
session_start();


echo ' <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/techies/index.php"><img src="img/logo.png" width="40px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/techies/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">about</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
           $sql = "SELECT category_name, category_id FROM `categories` LIMIT 4";
           $result1 = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result1)){
             $name = $row['category_name'];
             $id = $row['category_id'];
            echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$name.'</a></li>';
          }
          echo  '</ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">contact us</a>
        </li>
      </ul>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  
   echo '  <form class="d-flex" action="search.php" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button  class="btn btn-outline-warning" type="submit">Search</button>
            <p class="embed-responsive my-0 mx-3">welcome '. $_SESSION['useremail'].'</p>
            <a  role="button" href="partials/_logout.php" class="btn btn-outline-success mx-1" >Logout</a>
          </form>';
}
else{
      echo '<form class="d-flex">
           <input class="form-control me-2" type="search"   placeholder="Search" aria-label="Search">
            <button  class="btn btn-outline-warning"  type="submit">Search</button></form>
           <div class=" mx-2">
          <button  class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
          <button  class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
      </div>';}
      echo '
    </div>
  </div>
</nav>';
?>
<?php
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>success!</strong> You are signed in now.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">   
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
?>
<link rel="stylesheet" href="style.css">

