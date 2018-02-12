<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
  </head>
  <body>

    <p class="link"><a href="list.php">List ></a></p>

    <h1>Registration</h1>
    <div class="line"></div>

    <div id="register_output"></div>

    <div id="form">
      <h2>First Name</h2>
      <input id="firstname" type="text" placeholder="">

      <h2>Last Name</h2>
      <input id="name" type="text" placeholder="">

      <h2>Birthday</h2>
      <input id="birthdate" type="text" placeholder="YYYY-mm-dd">

      <h2>Email</h2>
      <input id="email" type="text" placeholder="">

      <br><br>

      <button id="register">Register</button>
    </div>

    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="register.js"></script>
  </body>
</html>
