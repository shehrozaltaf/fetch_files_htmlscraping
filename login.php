<?php
include 'config.php';
if (isset($_POST['UserName']) && $_POST['UserName'] != '') {
    $username = $_POST['UserName'];
} else {
    $username = '';
}

if (isset($_POST['Password']) && $_POST['Password'] != '') {
    $password = $_POST['Password'];
} else {
    $password = '';
}
$query = "SELECT idUser,username FROM [dbo].[user] where username='" . $username . "' and password='" . $password . "'";
$result = sqlsrv_query($conn, $query);
//echo $query;
$count = 0;
if (!empty($result)) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
       /* echo '<pre>';
        print_r($row);
        echo '</pre>';*/
       $_SESSION['idUser']=$row['idUser'];
       $_SESSION['username']=$row['username'];
        $count += 1;
    }
}
echo $count;