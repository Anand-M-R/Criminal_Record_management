<?php

include('db_connect.php');


$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    header('Location: queries.php');
    exit;
}

if (isset($_POST['update'])) {
    $questioner = $_POST['questioner'];
    $id_num = $_POST['idnumber'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $query = $_POST['que'];
    $reply = $_POST['rep'];

    $sql = "UPDATE `query` SET `qid` = '$user_id', `name` = '$questioner', `IDnumber` =  '$id_num', `phno` =  '$phno', `email` = '$email', `query` = '$query', `reply` = '$reply' WHERE `qid` = '$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `query` WHERE `qid` = $user_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($query = $result->fetch_assoc()) {
            $questioner = $query['name'];
            $id_num = $query['IDnumber'];
            $phno = $query['phno'];
            $email = $query['email'];
            $queri = $query['query'];
            $reply = $query['reply'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>CRMS</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-book-reader'></i>
            <span class="logo_name">CRMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="police.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Police Details</span>
                </a>
            </li>
            <li>
                <a href="criminal.php">
                    <i class='bx bx-info-circle'></i>
                    <span class="links_name">Criminal Details</span>
                </a>
            </li>
            <li>
                <a href="crime.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Crime Details</span>
                </a>
            </li>
            
            <li>
                <a href="fir.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">FIR</span>
                </a>
            </li>
            <li>
                <a href="queries.php" class="active">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Queries</span>
                </a>
            </li>
            <li class="log_out">
                <a href="login.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Queries (Update)</span>
            </div>
            <?php if (isset($_POST['update'])) { ?>
                <div class="alert" style="background-color: #009578; border-radius: 5px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Success!</strong> The entered details have been updated.
                </div>
            <?php } ?>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Admin</span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="number">Please Change The Required Details To Update The Query</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label>Questioner:</label></span>
                                            <input type="text" name="questioner" value="<?php echo $questioner ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>ID Number:</label></span>
                                            <input type="number" name="idnumber" value="<?php echo $id_num ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Contact Number:</label></span>
                                            <input type="number" name="phno" value="<?php echo $phno ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Email ID:</label></span>
                                            <input type="text" name="email" value="<?php echo $email ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Query:</label></span>
                                            <input type="text" name="que" value="<?php echo $queri ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Reply:</label></span>
                                            <input type="text" name="rep" value="<?php echo $reply ?>">
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="update">Update Query</button>
                                    </div>
                                    <div class="goback">
                                        <a href="queries.php"><input type="button" onclick="" value="Go Back"></a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>

</html>