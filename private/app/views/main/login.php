<style>
form > *{
    display:block;

}
</style>

<form action="/userdetails/login" method="POST">
<input type="hidden" name="csrf_tokken" value="<?php echo($csrf_tokken) ?>">
<label for="username">Email</label>
<input type="text" id="username" name="username" required autocomplete="Email">
<label for="password">Password</label>
<input type="password" id="password" name="password" autocomplete="Password">
<input type="submit" value="Login">
</form>