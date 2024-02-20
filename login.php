<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:400,300,600);

*{box-sizing:border-box;}

body {
  font-family: 'open sans', helvetica, arial, sans;
background:url(http://farm8.staticflickr.com/7064/6858179818_5d652f531c_h.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

@grey:#2a2a2a;
@blue:#1fb5bf;
.log-form {
  width: 40%;
  min-width: 320px;
  max-width: 475px;
  background: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
  
  box-shadow: 0px 2px 5px rgba(0,0,0,.25);
  
  @media(max-width: 40em){
    width: 95%;
    position: relative;
    margin: 2.5% auto 0 auto;
    left: 0%;
  -webkit-transform: translate(0%,0%);
-moz-transform: translate(0%,0%);
-o-transform: translate(0%,0%);
-ms-transform: translate(0%,0%);
transform: translate(0%,0%);
  }
  
  form {
    display: block;
    width: 100%;
    padding: 2em;
  }
  
  h2 {
    width: 100%;
    color: lighten(@grey, 20%);
    font-family: 'open sans condensed';
    font-size: 1.35em;
    display: block;
    background:@grey;
    width: 100%;
    text-transform: uppercase;
    padding: .75em 1em .75em 1.5em;
    box-shadow:inset 0px 1px 1px fadeout(white, 95%);
    border: 1px solid darken(@grey, 5%);
    //text-shadow: 0px 1px 1px darken(@grey, 5%);
    margin: 0;
    font-weight: 200;
  }
  
  input {
    display: block;
    margin: auto auto;
    width: 100%;
    margin-bottom: 2em;
    padding: .5em 0;
    border: none;
    border-bottom: 1px solid #eaeaea;
    padding-bottom: 1.25em;
    color: #757575;
    &:focus {
      outline: none;
    }
  }
  
  .btn {
    display: inline-block;
    background: blue;
    border: 1px solid darken(blue, 5%);
    padding: .5em 2em;
    color: white;
    margin-right: .5em;
    box-shadow: inset 0px 1px 0px fadeout(white, 80%); 
    &:hover {
      background: lighten(blue, 5%);
    }
    &:active {
      background: blue; 
      box-shadow: inset 0px 1px 1px fadeout(black, 90%); 
    }
    &:focus {
      outline: none;
    }
  }
  
  .forgot {
    color: lighten(blue, 10%);
    line-height: .5em;
    position: relative;
    top: 2.5em;
    text-decoration: none;
    font-size: .75em;
    margin:0;
    padding: 0;
    float: right;
    
    &:hover {
      color:darken(@blue, 5%);
    }
    &:active{ 
    }
  }
  
}
    </style>
</head>
<body>
<?php
    include "koneksi.php";
    if (isset($_POST["submit"])) {
        session_start();
        $_SESSION["id_user"]=$_POST["id_user"];
        $_SESSION["password"]=$_POST["password"];

        $id_user=$_SESSION["id_user"];
        $password=$_SESSION["password"];
        $loginyo=mysqli_query ($koneksi,"SELECT * FROM user where 
        id_user='$id_user' AND password='$password'");
        $cek=mysqli_num_rows($loginyo);
        
        if ($cek==1) {
            header('location:index.php');
        }else {
            echo "<div class='alert alert-danger'> Anda bukan admin! </div>";
        }
    }
    ?>
<div class="log-form">
  <h2>Login</h2>
  <form>
    <input type="text" title="id_user" name="id_user" placeholder="username"/>
    <input type="password" title="password" name="password" placeholder="password" />
    <button type="submit" name="submit"class="btn">Login</button>
  </form>
</div><!--end log form -->
</body>
</html>