<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Bank Account - Rider</title>
        <link rel="stylesheet" type="text/css" href="./styles/table.css">
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Bank Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">My Bank</p></b>
            <b><p style="font-size: 20px; color: black"><i>Payments</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Task Id</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering details
                        $sql = "SELECT * FROM " . $_SESSION['username'] . "bank";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $taskId = $row['taskId'];
                                $total = $row['total'];
                                $date = $row['date'];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$taskId</td>
                                        <td>$total</td>
                                        <td>$date</td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>