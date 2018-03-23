<?php
session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:card.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>
<style>
body {
    background-image: url("download.jpg");
    background-repeat: no-repeat;
	background-position: top;
	background-size: 100%;
}
</style>
<html>


<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.emailusername.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>
    <div class="row">
      <div class="col offset-l4 l3 s12 m5">
        <div class="card-panel white">

<div class="center">
<h4>Login</h4>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th><a class="black-text">Username:</a></th>
<td><input type="text" name="emailusername" required="" /></td>
</tr>
<tr>
<th><a class="black-text">Password:</a></th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td>
  <button class="btn waves-effect waves-light blue" type="submit" name="submit">Login
    <i class="material-icons right">send</i>
  </button></td>
</tr>
<tr>
<td></td>
<td><a class="black-text" href="registration.php">Register new user</a></td>
</tr>
</tbody>
</table>
</form></div></div></div></div>

</html>