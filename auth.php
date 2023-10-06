/* PHP code to authenticate user */
<?php
  $tries = 0;
  echo "Authenticating User";
  $username = $_GET["username"];
  $password = $_GET["password"];
  if(!$_COOKIE["banned"]){
    if($username == $_COOKIE["username"] && $password == $_COOKIE["password"]){
        echo "Authenticated!";
    }else{
      if($tries < 3){
        echo "Incorrect username or password!";
        $tries+=1;
      }else{
        echo "Try again in an hour!";
        $cookie_name = "banned";
        $cookie_value = "1hr";
        setcookie($cookie_name, $cookie_value); /* set banned cookie */
      }
    }
  }else{
    echo "Try again in 1 hour";
  }
?>
