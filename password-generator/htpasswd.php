<?php

####
# Author: Reigner S. Yrastorza <reigner@yrastorza.us>
####

if($_POST['submit']){

  $name=$_POST['username'];
  $htpasswd_password=$_POST['password'];
  $htpasswd_confirm_password=$_POST['confirmpassword'];
    if ($htpasswd_password != $htpasswd_confirm_password) {
      echo "Your passwords does not match! Go back to generate it again.</br>";
      exit();
    }

 #$password = crypt($htpasswd_password);
 $password = exec("openssl passwd -apr1 $htpasswd_password");
 $htpasswd_info=$name.":".$password;
}

?>

<form action="" method="post" >
user name: <input type="text" name="username"></br></br>
password: <input type="password" name="password"></br></br>
confirm password: <input type="password" name="confirmpassword"></br></br>
<input type="submit" name="submit" value="submit"></br></br>
</form>

<?php if($_POST['submit']){ ?>

Send this to techops: </br>
<textarea style="height:169px;width: 348px;"><?php echo $htpasswd_info; ?> </textarea></br></br>
<?php } ?>