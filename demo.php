<?php
if(isset($_GET['name']) && isset($_GET['name']) && isset($_GET['age']) ){
    $name = htmlspecialchars($_GET['name']);
    $email = htmlspecialchars($_GET['email']);
    $age = htmlspecialchars($_GET['email']);
    echo "Welcom $_GET[name]";
    echo "<br>";
    echo "Email: $_GET[email]";
    echo "<br>";
    echo ($age<18)?"Teenage":"Adult"; 

}
?>
<form action="" method="get">
    <label for="Name">Name:</label>
    <input id="name" type="text" name="name" value="">
    <br>
    <label for="email">Email:</label>
    <input id="email" type="text" name="email" value="">
    <br>
    <label for="age">Age:</label>
    <input id="age" type="text" name="age" value="">
    <br>
    <input type="submit" name="btnSubmit" value="Submit">
</form>
