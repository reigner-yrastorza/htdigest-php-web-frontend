<?php

####
# Author: Reigner S. Yrastorza <reigner@yrastorza.us>
####

if($_POST['submit']){

  $name=$_POST['username'];
  $password=$_POST['password'];
  $md5_confirm_password=$_POST['confirmpassword'];
    if ($md5_password != $md5_confirm_password) {
      echo "Your passwords does not match! Go back to generate it again.</br>";
      exit();
    }
  $realm=$_POST['realm'];
  $htdigest = md5($name.":".$realm.":".$password);
  $htdigest_info=$name.":".$realm.":".$htdigest;
}

?>

<form action="" method="post" >
user name: <input type="text" name="username"></br></br>
password: <input type="password" name="password"></br></br>
confirm password: <input type="password" name="confirmpassword"></br></br>
realm: <input type="text" name="realm"></br></br>
<input type="submit" name="submit" value="submit"></br></br>
</form>

<?php if($_POST['submit']){ ?>

Send this to techops: </br>
<textarea style="height:169px;width: 348px;"><?php echo $htdigest_info; ?> </textarea></br></br>
<?php } ?>