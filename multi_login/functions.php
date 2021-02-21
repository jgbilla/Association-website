<?php

session_start();

//connect to database
$db = mysqli_connect('localhost', 'root', '','multi_login');

//variables
$username = "";
$errors = array();

//call the register() funtion if the register button is clicked

if(isset($_POST['register_btn'])){
  register();
}

function register(){

  global $db, $errors, $username;

  $username = e($_POST['username']);
  $phone_number = e($_POST['phone_number']);
  $password_1 = e($_POST['password_1']);
  $password_2 = e($_POST['password_2']);

  //form validation

  if(empty($username)){
    array_push($errors, "Le nom d'utilisateur est necessaire");
  }

  if(empty($password_1)){
    array_push($errors, "Le mot de passe est necessaire");
  }

  if($password_1 != $password_2){
    array_push($errors, "Les mots de passe ne sont pas identiques");
  }

  if(count($errors) == 0){
    $password = md5($password_1); //encrypt the password before saving it

    if(isset($_POST['user_type'])){
      $user_type = e($_POST['user_type']);
      $query = "INSERT INTO users (username, phone_number, user_type, password)
                VALUES('$username', '$phone_number', '$user_type', '$password')";
      
      mysqli_query($db, $query);
      $_SESSION['success'] = "Votre compte a ete cree!!";
      header('location: home.php');
    }else{

      $query = "INSERT INTO users (username, phone_number, user_type, password)
                VALUES('$username', '$phone_number', 'user', '$password')";

mysqli_query($db, $query);

//get id

$logged_in_user_id = mysqli_insert_id($db);

$_SESSION['user'] = getUserById($logged_in_user_id);
$_SESSION['success'] = "Vous etes connecte";
header('location:index.php');
    }
  }
}

function getUserById($id){
  global $db;
  $query = "SELECT * FROM users WHERE id=" . $id;
  $result = mysqli_query($db, $query);
  
$user = mysqli_fetch_assoc($result);
return $user;
}

function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

function display_error(){
  global $errors;

  if(count($errors) > 0){
    echo '<div class="error">';

    foreach ($errors as $error){
      echo $error . '<br>';
    }

    echo '</div>';
  }
}