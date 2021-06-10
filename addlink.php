<?php
session_start();
if(!$_SESSION['email']) header('Location: index.php');

if($_POST['title']){

	include_once('database.php');

 $db = Database::getInstance();
    $mysqli = $db->getConnection(); 
    $title = $mysqli->real_escape_string($_POST['title']);
    $link = $mysqli->real_escape_string($_POST['link']);
    $user = $_SESSION['user'];
    
    $sql_query = "INSERT INTO document (title, link, user) VALUES('$title','$link','$user')";
   
    $mysqli->query($sql_query);
    $id = $mysqli->insert_id;

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

     <!-- Custom styles for this template -->
    


 <title>Whiz Technologies</title>
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
    <h1>Add Document links</h1>
    
<?php
	if($id){
		print'<div class="alert alert-success" role="alert">';
  		print 'Document added succesfully!';
		print '</div>';
	}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="mb-3">
  <label for="title" class="form-label">Ttitle</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="title...">
</div>
<div class="mb-3">
  <label for="link" class="form-label">Link</label>
  <textarea class="form-control" id="link" name="link" rows="3" required></textarea>
</div>
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary ">Add</button>
  </div>

</form>


  
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>