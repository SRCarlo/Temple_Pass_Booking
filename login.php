<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="include/CSS/style.css">
      
    <title>Login</title>

    <style>
     
.login-container {
  width: 340px;
  margin: 100px auto;
  padding: 30px 25px;
  background: #f5f5f5;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  text-align: center;
  border-radius: 10px;
  font-family: 'Segoe UI', sans-serif;
}

.login-container h2 {
  margin-bottom: 20px;
  color: #333;
}

.login-container input {
  width: 90%;
  padding: 12px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.login-container button {
  width: 100%;
  padding: 12px;
  background-color: #2c3e50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.login-container button:hover {
  background-color: #1abc9c;
}

    </style>


</head>
<body>

  <?php include('include/header.php') ?>
    
<div class="login-container">
    <h2>Admin Login</h2>
    <p class="">Please enter your login and password!</p>
   <form onsubmit="handleLogin(event)">
  <input type="text" name="username" id="email" placeholder="Enter Username" required>
  <input type="password" name="password" id="password" placeholder="Enter Password" required>
  <button type="submit">Login</button>
</form>

  </div>

  <script>    
function handleLogin(event) {
    event.preventDefault(); 

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email === "admin@gmail.com" && password === "12345") {
        alert("Login Successful..");
        window.location.href = "admin_dashboard.php";
    } else {
        alert("Invalid email or password. Please try again.");
    }
}
</script>

 <?php include('include/footer.php') ?>

</body>
</html>