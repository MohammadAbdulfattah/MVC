<h2>User information</h2>
<?php
foreach ($userInfo as $key => $value) {
    echo 'userName : '.$value["userName"] . "<br>";
    echo 'password : '.$value["password"] . "<br>";
    if($value["role"] == 1){
        echo "role : admin";
    }else{
        echo "role : user";
    }
    
}
?>