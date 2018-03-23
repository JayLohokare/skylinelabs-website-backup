<?php
include("header.html");
include_once 'include/safeguard2.php';  $user = new User(); // Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $register = $user->reg_user($fname, $lname, $fullname, $uname,$upass, $uemail, $caste, $state, $city, $desc);
 if ($register) {
 // Registration Success
 header("Location: upload.html");
 } else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 }
?>
<style>
body {
    background-image: url("download.jpg");

	background-position: top;
	background-size: 100%;
}
</style>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<style><!--
 #container{width:400px; margin: 0 auto;}
--></style>

<script type="text/javascript" language="javascript">
 function submitreg() {
 var form = document.reg;
 if(form.name.value == ""){
 alert( "Enter name." );
 return false;
 }
 else if(form.uname.value == ""){
 alert( "Enter username." );
 return false;
 }
 else if(form.upass.value == ""){
 alert( "Enter password." );
 return false;
 }
 else if(form.uemail.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.fname.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.lname.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.caste.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.state.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.city.value == ""){
 alert( "Enter email." );
 return false;
 }
 else if(form.desc.value == ""){
 alert( "Enter email." );
 return false;
 }
 }
</script>
    <div class="row">
<div class="col offset-l3 s12 m12 l6">
        <div class="card-panel white">
<div class="row">
<div class=container center">
    <h4>Register</h4>
</div>
    <form>
      <div class="row">
        <div class="input-field col s6">
          <input name="fname" type="text" class="validate">
          <label for="fname">First Name</label>
        </div>
        <div class="input-field col s6">
          <input name="lname" type="text" class="validate">
          <label for="lname">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="fullname" type="text" class="validate">
          <label for="fullname">Full Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="uname" type="text" class="validate">
          <label for="uname">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="upass" type="password" class="validate">
          <label for="upass">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="uemail" type="email" class="validate">
          <label for="uemail">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="caste" type="text" class="validate">
          <label for="caste">Caste</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="state" type="text" class="validate">
          <label for="state">State</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="city" type="text" class="validate">
          <label for="city">City</label>
        </div>
      </div>   
<br>
  <button onclick="return(submitreg());" class="btn waves-effect waves-light" type="submit" name="submit">Register
    <i class="material-icons right">send</i>
  </button>
    </form>
  </div></div></div></div>
</html>
<?php
include("footer.html");
?>