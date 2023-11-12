<!-- app/views/user_list.php -->
<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>
<style>
    a{
        font-weight: bold;
        text-decoration: none;
        color: black;
    }
</style>
<body>
    <h1>User List</h1>
    <?php
    // var_dump($users) 
    ?>
    <ul>
        <?php foreach ($users as $user) { ?>
            <li>
                <?= $user['userName']; ?>
                <br>
                <br>
                <button>
                    <a href="show?userID=<?= $user["userID"] ?>">show user information</a>
                </button>
                <button>
                    <a href="update?userID=<?= $user["userID"] ?>">edit user information</a>
                </button>
                <button>
                    <a href="delete?userID=<?= $user["userID"] ?>">delete user information</a>
                </button>
                <br>
                <br>
            </li>
        <?php } ?>
    </ul>

    <h2>Add User</h2>
    <form method="post" action="add">
        <input type="text" name="userName" placeholder="UserName" required>
        <input type="password" name="password" placeholder="password" required>
        <select name="role" id="">
            <option value="0">user</option>
            <option value="1">admin</option>
        </select>
        <button type="submit">Add User</button>
    </form>
</body>

</html>