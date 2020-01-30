<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

body{
    font-family: 'Montserrat', sans-serif;
    font-size:1.12em;
    line-height: 1.5;
    padding:0;
    margin:0;
    background-color: #ffffff;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
    text-align: center; 
 
}
.layout{
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(to left, #189DDB ,#82CAEB);
    display: flex;
    justify-content: center;
    align-items: center;

    }

.container {
    width: 60%;
    height: 94%;
    min-height:500px;
    margin: 3% 0%;
    background-color:white;
    display: flex;
    flex-flow: row;

}

.cleft{
    
    width: 25%;
    border-radius:5px;
    height:100%;
    padding-top:2%;
    background-color: white;
    overflow:hidden;
    display:flex;
    justify-content:center;
    align-items:center;
}

.cright{
    display: flex;
    flex-flow: column;
    justify-content: center;
    align-items: center;
 
    width: 80%;
    background-color:#F4F7FF;

}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
input,
.btn {
  width: 30%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}
</style>
<body>
    <form  action=""  method="post">
    <div class="layout">
        
        <div class="container">
            <div class="cleft">
                <img src="https://s.hcurvecdn.com/hockeycurve.png" style="width:150px">
            </div>
            <div class="cright">
                <input id="user" type="text" name="user" placeholder="Username" required>
                <input id="pass" type="password" name="pass" placeholder="Password" required><br>
                <input type="submit" value="Login" name="login">
            </div>
        </div>
    </div>
</form>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hcurve";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Fail";
}
// echo "Connected successfully";
// echo "Connected successfully";

$sql = "select * from login";
$result = $conn->query($sql);

    if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $dbusername=$row['user'];  
                $dbpassword=$row['pass'];
            }
        }
        if(isset($_POST['login']))
        {
            $user=$_POST['user'];  
            $pass=$_POST['pass'];
            if($user == $dbusername && $pass == $dbpassword)  
             {  
             session_start();  
             $_SESSION["user"] = $dbusername;
             $_SESSION["date"] = date("Y-m-d");
  
            /* Redirect browser */  
            header("Location: data.php");  
            }  
                else {  
             echo "<script>alert('Invalid username or password!')</script>";  
                }  
        }
?>
</body>
</html>