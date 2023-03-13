<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Tasks - Rider</title>
        <link rel="stylesheet" type="text/css" href="./styles/table.css">
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Tasks Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">My Tasks</p></b>
            <b><p style="font-size: 20px; color: black"><i>Tasks to be done | Tasks already completed</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Product Id</th>
                        <th>Seller</th>
                        <th>Buyer</th>
                        <th>Total</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering items exist in the tasks 
                        $sql = "SELECT * FROM " . $_SESSION['username'] . "tasks";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $orderId = $row['orderId'];
                                $pid = $row['productId'];
                                $seller = $row['seller'];
                                $buyer = $row['buyer'];
                                $total = $row['total'];
                                $address = $row['address'];
                                $date = $row['date'];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$orderId</td>
                                        <td>$pid</td>
                                        <td>$seller</td>
                                        <td>$buyer</td>
                                        <td>$total</td>
                                        <td>$address</td>
                                        <td>$date</td>
                                        <td>
                                            <form method='post' action='tasks.php'>
                                                <input type='text' name='id' id='id' value='$orderId' style='display: none' />
                                                <input type='submit' name='complete' id='complete' value='Complete' />
                                            </form>
                                        </td>
                                    </tr>
                                ";

                                // Complete a task
                                if (isset($_POST['complete'])) {
                                    if (count($errors) == 0) {
                                        // Complete the order
                                        $sql = "UPDATE orders SET status='Completed' WHERE id='$orderId'";
                                        mysqli_query($db, $sql);
                                    
                                        $money = 0.05 * (double)$total;
                                    
                                        // Add money to the rider's account
                                        $sql = "INSERT INTO " . $_SESSION['username'] . "bank" . " (taskId, total) VALUES ('$id', '$money')";
                                        mysqli_query($db, $sql);
                                    
                                        // Clear the task
                                        $sql = "DELETE FROM " . $_SESSION['username'] . "tasks" . " WHERE id='$id'";
                                        mysqli_query($db, $sql);
                                    }
                                }
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