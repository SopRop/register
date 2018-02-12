<?php
  include 'register.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
  </head>
  <body>

    <?php

      $query2 = "SELECT * FROM `rg_users`";
      $result = mysqli_query($con, $query2);
      $resultCheck = mysqli_num_rows($result);

      echo "<a href='index.php'>< Register</a>
      <table>
      <tr>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Birthday</th>
      <th class='email'>E-mail</th>
      </tr>";

      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td class='uppercase'>" . $row['name'] . "</td>";
          echo "<td class='capitalize'>" . $row['firstname'] . "</td>";
          echo "<td>" . $row['birthdate'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "</tr>";
        }
      }
      echo "</table>";

     ?>

  </body>
</html>
