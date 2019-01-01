<form action='' method='post'>
    <input type='text' name='username' value='<?php if (isset($error)) {
        echo $_POST['username'];
    } ?>'></p>
    <input type='text' name='email' value='<?php if (isset($error)) {
        echo $_POST['email'];
    } ?>'></p>
    <input type='password' name='password' value=''></p>
    <input type='password' name='passwordConfirm' value=''></p>
    <p><input type='submit' name='submit' value='Register'></p>
</form>