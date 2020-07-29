<?php

if ($model->hasErrors())
{
    echo "<pre>";
    print_r($model->getErrors());
    echo "</pre>";
}

?>

<h1>Welcome to our company</h1>

<form action="" method="post">
<p>First name</p>
<input type="text" name="firstName">
<br><br>
<p>Last name</p>
<input type="text" name="lastName">
<br><br>
<p>Middle name</p>
<input type="text" name="middleName">
<br><br>
<p>Email</p>
<input type="text" name="email">
<br><br>
<input type="submit">
</form>


