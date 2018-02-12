<?php
  // access to user input with xss attack prevention
  $firstname = htmlspecialchars($_POST['firstname']);
  $name = htmlspecialchars($_POST['name']);
  $birthdate = htmlspecialchars($_POST['birthdate']);
  $email = htmlspecialchars($_POST['email']);

  // database connection
  $con = mysqli_connect("127.0.0.1", "root", "0000", "register") or die("DataBase connection failed");
  $query = mysqli_query($con, "SELECT `id` FROM `rg_users` WHERE `email`='$email'");
  $num = mysqli_num_rows($query);

  // valid form verification with different text errors
  $errors = [];

  if ($_POST)
  {
    if(!$firstname || !$name || !$birthdate || !$email)
    {
      http_response_code(403);
      array_push($errors, "<p class='fail'>Information missing</p>");
    }
    else{
      // if(!preg_match("/^[a-zA-Z'-]+$/",$firstname))
      if(!preg_match("#^\p{L}(\p{L}+[- ']?)*\p{L}$#ui",$firstname))
      {
        http_response_code(403);
        array_push($errors, "<p class='fail'>Your first name must be all letters</p>");
      }
      if(!preg_match("#^\p{L}(\p{L}+[- ']?)*\p{L}$#ui",$name))
      {
        http_response_code(403);
        array_push($errors, "<p class='fail'>Your last name must be all letters</p>");
      }
      if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthdate))
      {
        http_response_code(403);
        array_push($errors, "<p class='fail'>Wrong date format (yyyy-mm-dd)</p>");
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        http_response_code(403);
        array_push($errors, "<p class='fail'>Invalid email address</p>");
      }
      if($num == 1)
      {
        http_response_code(403);
        array_push($errors, "<p class='fail'>Email address already registered</p>");
      }
    }
    if(!empty($errors)){
      foreach($errors as $value)
      {
        echo $value;
      }
    }
    else
    {
      mysqli_query($con, "INSERT INTO `rg_users` (`name`, `firstname`, `birthdate`, `email`) VALUES ('$name', '$firstname', '$birthdate', '$email')");
      echo "<p class='success'>Thanks for registering, $firstname!</p>";
    }
  }

?>
