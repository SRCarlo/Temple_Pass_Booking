    
function handleLogin(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    
   if(email === "admin@gmail.com" && password==="12345"){
        alert("Login Successful..");
        window.location.href="admin_dashboard.php";
    }
    
    else {
        alert("Invalid email or password. Please try again.");
    }
}
document.querySelector("form").addEventListener("submit", handleLogin);

