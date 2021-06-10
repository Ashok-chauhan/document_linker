<?php
include_once('database.php');

 $db = Database::getInstance();
    $mysqli = $db->getConnection(); 
    $email = $mysqli->real_escape_string($_POST['email']);
    $pass = $mysqli->real_escape_string($_POST['password']);
    
    $sql_query = "SELECT * FROM users WHERE email= '$email' AND password='$pass'";
    // print $sql_query;
    // exit;
    $result = $mysqli->query($sql_query);
    if(!$result->num_rows){
    	header('Location: index.php?error=1');
    }
    session_start();

    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email']   = $row['email'];
    $_SESSION['user']	 = $row['name'];
    header('Location: doc.php');
    exit;
    

    