<?php

$html = "
<form method='POST' action=''>
    <label>Full Name</label><br>
    <input name='fullName' type='text' required><br><br>
    
    <label>Date of Birth</label><br>
    <input name='dob' type='date' required><br><br>
    
    <button name='submit' type='submit'>Calculate Age</button>
</form>
";

echo $html;

if (isset($_POST['submit'])) {
    $fullName = htmlspecialchars($_POST['fullName']);
    
    $dob = new DateTime($_POST['dob']);
    $today = new DateTime('today');
    
    $ageInterval = $dob->diff($today);
    $age = $ageInterval->y;

    echo "Hello $fullName your age is $age";
}

?>
