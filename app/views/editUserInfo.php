<?php
// var_dump($users);
foreach ($users as $user) {
    $userName = $user["userName"];
    $password = $user["password"];
    $role = $user["role"];
}
?>
<h2>Edit User</h2>
    <form method="post" action="update?userID=<?= $user["userID"] ?>">
        <input type="text" name="userName" placeholder="UserName" required value="<?= $userName ?>">
        <input type="password" name="password" placeholder="password" required value="<?= $password ?>">
        <select name="role" id="">
            <?php
            if($role == 0){
                ?>
            <option value="0">user</option>
            <option value="1">admin</option>
            <?php
            }else{
                ?>
                <option value="1">admin</option>
                <option value="0">user</option>
                <?php
            }
            ?>
        </select>
        <button type="submit">Edit User</button>
    </form>