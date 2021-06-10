<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

   

    <title>Whiz Technologis </title>
  </head>
  <body>



<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Whiz Technologies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="doc.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addlink.php">Add document</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
     
    </div>
  </div>
</nav>

<main class="container">
  <div >
    <h1>Document links</h1>
    


    <table class="table table-success table-striped">
 
  <tbody>
   


<?php
session_start();
include_once('database.php');
//print $_SESSION['email'];
if(!$_SESSION['email']){
	header('Location: index.php?error=1');
}

$db = Database::getInstance();
$mysqli = $db->getConnection(); 

$doc_query = "SELECT * FROM document";
 

/*
    $result = $mysqli->query($doc_query);

    while ($row = mysqli_fetch_assoc($result)) {
    			print '<tr>';
                    echo "<td>".$row["link"]."</td>";
                    //echo "<td>".$row['user']."</td>";
                    echo "<td>".$row['date_created']."</td>";
                print '</tr>';
              }
    mysqli_free_result($result);
    

*/

    $result = $mysqli->query($doc_query);

/* fetch object array */
while ($obj = $result->fetch_object()) {
    			print '<tr>';
    				echo "<td>".$obj->title."</td>";
                    echo '<td><a href="'.$obj->link.'" target="_blank"> '. $obj->link.'</a></td>';
                    echo "<td>".$obj->date_created."</td>";
                print '</tr>';
			}

    ?>



	

 </tbody>
</table>

</div>
</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>