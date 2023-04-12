<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateAnAccount</title>
    <link rel="stylesheet"  href="E7.css">
</head>
<body>
<div id="header">
      <table id="tablelogo" >
      <tr>
        <td><a href="index.html"><img id="logo" src="Images/logo.png" alt=""></a></td> 
        <!-- logo made through canvas https://www.canva.com/ -->
        <td><h1 id="heading"><strong>Adopt a Dog/Cat</strong></h1>   
      </tr>
      </table>
      <span id="date"></span>
      <span id="time"></span>
      <script>date_time()</script>
    </div>
<div id="content">
    <div id="nav">
    <ul>
          <li><a href="index.html">Home</a></li>
          <li><a class="active" href="CreateAnAccount.php">Create an Account</a></li>
          <li><a href="BrowseAvailablePets.html">Browse Available Pets</a></li>
          <li><a href="Findform.html">Find a Dog/Cat</a></li>
          <li><a href="DogCare.html">Dog Care</a></li>
          <li><a href="CatCare.html">Cat Care</a></li>
          <li><a href="Have_a_Pet_to_Give_Away.html">Have a Pet to Give Away</a></li>
          <li><a href="ContactUs.html">Contact Us</a></li>
        </ul>
    </div>
    <div id="main">
          <!-- HTML form for username and password input -->
            <form method="post" action="CreateAnAccount.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Create Account</button>
            </form>
    </div>
    <div id="footer">
      <a href="Privacy.html"><p id="footnote">Privacy/Disclaimer Statement</p></a>
     </div>
 </div>

<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // retrieve the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // validate the username and password formats
  if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
    echo 'Invalid username format. Please use only letters and digits.';
  } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{4,}$/', $password)) {
    echo 'Invalid password format. Please use at least 4 characters with at least one letter and one digit.';
  } else {
    // check if the username already exists in the login file
    $login_file = 'Accounts.txt';
    $existing_logins = file($login_file, FILE_IGNORE_NEW_LINES);
    if (in_array($username, $existing_logins)) {
      echo 'Username already in use. Please choose a different username and try again.';
    } else {
      // add the new username and password to the login file
      $new_login = $username . ':' . password_hash($password, PASSWORD_DEFAULT);
      file_put_contents($login_file, $new_login . "\n", FILE_APPEND);

      // display a success message
      echo 'Account created successfully. You can now log in.';
    }
  }
}
?>
</body>
</html>