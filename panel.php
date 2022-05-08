<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$password = "Justsaimain@3820";
$dbname = "random_api";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from randoms";

$result = $conn->query($sql);

$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$conn->close();

if ($row) {
    $num_one =  $row['num_one'];
    $num_two =  $row['num_two'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .main {
            margin: auto;
            margin-top: 50px;
            width: 50%;
            border-radius: 10px;
            padding: 20px 50px;
        }

        .logout {
            margin-top: 20px;
        }

        .logout-btn {
            padding: 5px 10px;
            background: red;
            border: none;
            outline: none;
            box-shadow: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .num_form {
            margin-top: 30px;
        }

        .num_input {
            margin-bottom: 20px;
            padding: 10px;
            width: 200px;
            border: 1px solid #ddd;
            box-shadow: none;
            outline: none;
            border-radius: 5px;
        }

        .btn {
            padding: 5px 10px;
            background: #eee;
            border: 1px solid #333;
            border-radius: 5px;
            cursor: pointer;
        }

        .del-btn{
            background: red;
            color: #fff;
            border: 1px solid red;
        }

        .del-form{
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1>Random API Control Panel</h1>
        <div class="logout">
            <form action="logout.php" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
        <div>
            <form action="<?php if (isset($num_one)) {
    echo "update.php";
} else {
    echo "save.php";
} ?>" class="num_form" method="post">
                <div>
                    <input type="text" name="num_one" value="<?php
                                                                if (isset($num_one)) {
                                                                    echo $num_one;
                                                                }
                                                                ?>" placeholder="Number One" class="num_input">
                    <input type="text" name="num_two" value="<?php
                                                                if (isset($num_two)) {
                                                                    echo $num_two;
                                                                }
                                                                ?>" placeholder="Number Two" class="num_input">
                </div>
                <button type="submit" class="btn">
                    <?php
                    if (isset($num_one)) {
                        echo "Update";
                    } else {
                        echo "Create";
                    }
                    ?>
                </button>
            </form>
             <?php
                if (isset($num_one)) {
                    echo '<form class="del-form" action="delete.php" method="post"> <button type="submit" class="btn del-btn">Click to delete data and restart randomly</button>
                    </form>';
                }
                ?>
        </div>
    </div>
</body>

</html>