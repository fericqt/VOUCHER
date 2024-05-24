<?php
// Start the session
session_start();

// Check if the session variable for account creation success exists
if(isset($_SESSION['account_created']) && $_SESSION['account_created'] === true) {
    // Display a JavaScript alert notification
    echo '<script>alert("Account created successfully. You can now login.");</script>';
    
    // Unset the session variable
    unset($_SESSION['account_created']);

    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Account</title>
</head>
<style>
    
body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: url("https://i.imgur.com/HgflTDf.jpg") 50% fixed;
  background-size: cover;
}

@keyframes spinner {
  0% { transform: rotateZ(0deg); }
  100% { transform: rotateZ(359deg); }
}

* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  
  /* Adjusted background color with 40% darker shade */
  background-color: rgba(225, 225, 225, 0.5);
 backdrop-filter: blur(10px); /* Blur effect */
}


.login {
  
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0,0,0,0.3);
  
  &.loading {
    button {
      max-height: 100%;
      padding-top: 50px;
      .spinner {
        opacity: 1;
        top: 40%;
      }
    }  
  }
  
  &.ok {
    button {
      background-color: #8bc34a;
      .spinner{
        border-radius: 0;
        border-top-color: transparent;
        border-right-color: transparent;
        height: 20px;
        animation: none;
        transform: rotateZ(-45deg);
      }
    }
  }
  
  input, select  {
    display: block;
    padding: 15px 10px;
    margin-bottom: 10px;
    width: 100%;
    border: 1px solid #ddd;
    transition: border-width 0.2s ease;
    border-radius: 2px;
    color: #ccc;
    
    &+ i.fa {
        color: #fff;
      font-size: 1em;
      position: absolute;
      margin-top: -47px;
      opacity: 0;
      left: 0;
      transition: all 0.1s ease-in;
    }
    
    &:focus {
      &+ i.fa {
        opacity: 1;
        left: 30px;
      transition: all 0.25s ease-out;
      }
      outline: none;
      color: #444;
      border-color: $primary;
      border-left-width: 35px;
    }
    
  }
  
  a {
   font-size: 0.8em;   
    color: $primary;
    text-decoration: none;
  }
  .input-container {
    position: relative;
}

.input-container input {
    padding-right: 30px; /* Adjust the padding to accommodate the icon */
}

.input-container i.fa {
    position: absolute;
    top: 50%;
    right: 10px; /* Adjust the position of the icon as needed */
    transform: translateY(-50%);
}
  .title {
    color: #444;
    font-size: 1.6em;
    font-weight: bold;
    margin: 10px 0 30px 0;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    text-align: center;
    text-transform: capitalize;
  }
  
  button {
    width: 100%;
    height: 100%;
    padding: 10px 10px;
    background: #728FCE;
    color: #fff;
    display: block;
    border: none;
    margin-top: 20px;
    position: absolute;
    left: 0;
    bottom: 0;
    max-height: 60px;
    border: 0px solid rgba(0,0,0,0.1);
  border-radius: 0 0 2px 2px;
    transform: rotateZ(0deg);
    
    transition: all 0.1s ease-out;
      border-bottom-width: 7px;
    
    .spinner {
      display: block;
      width: 40px;
      height: 40px;
      position: absolute;
      border: 4px solid #ffffff;
      border-top-color: rgba(255,255,255,0.3);
      border-radius: 100%;
      left: 50%;
      top: 0;
      opacity: 0;
      margin-left: -20px;
      margin-top: -20px;
      animation: spinner 0.6s infinite linear;
      transition: top 0.3s 0.3s ease,
                opacity 0.3s 0.3s ease,
                border-radius 0.3s ease;
      box-shadow: 0px 1px 0px rgba(0,0,0,0.2);
    }
    
  }
  
    &:not(.loading) button:hover {
      box-shadow: 0px 1px 3px $primary;
    }
    &:not(.loading) button:focus {
      border-bottom-width: 4px;
    }
    
  
}


}
</style>

<body>
<div class="wrapper"> 
  <form class="login" action="db_function/create_account_process.php" method="post">
    <p class="title">Create Account</p>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Username" autofocus/>
    <i class="fa fa-user"></i>
    
   
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Password" autofocus />
    <i class="fa fa-key"></i>

    <label for="userType">User Type</label>
    <select id="userType" name="usertype">
            <option value="Admin">Admin</option>
            <option value="Client">Client</option>
    </select>
    <i class="fa fa-user"></i>

    <button type="submit">
      <i class="spinner"></i>
      <span class="state">Create Account</span>
    </button>
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
