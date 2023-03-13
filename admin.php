<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Admin</title>
        <link rel="stylesheet" href="./styles/table.css">
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Transactions Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Transactions</p></b>
            <b><p style="font-size: 20px; color: black"><i>Customer payment details</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Amount</th>
                        <th>Tax Rate</th>
                        <th>Tax</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering transaction details
                        $sql = "SELECT * FROM transactions";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $pid = $row['pid'];
                                $buyer = $row['buyer'];
                                $seller = $row['seller'];
                                $amount = $row['amount'];
                                $taxrate = $row['taxrate'];
                                $tax = $row['tax'];
                                $date = $row['date'];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$pid</td>
                                        <td>$buyer</td>
                                        <td>$seller</td>
                                        <td>$amount</td>
                                        <td>$taxrate</td>
                                        <td>$tax</td>
                                        <td>$date</td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Orders Table / Delivery Statuses -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Delivery Statuses</p></b>
            <b><p style="font-size: 20px; color: black"><i>Assign riders... Delivery...</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Seller</th>
                        <th>Buyer</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering order details
                        $sql = "SELECT * FROM orders";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $productId = $row['productId'];
                                $rate = $row['rate'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $seller = $row['seller'];
                                $buyer = $row['buyer'];
                                $address = $row['address'];
                                $date = $row['date'];
                                $status = $row['status'];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$productId</td>
                                        <td>$rate</td>
                                        <td>$quantity</td>
                                        <td>$total</td>
                                        <td>$seller</td>
                                        <td>$buyer</td>
                                        <td>$address</td>
                                        <td>$date</td>
                                        <td>
                                            <form method='post' action='admin.php'>
                                                <select name='rider' id='rider'>
                                ";
                                                // Riders
                                                $sql2 = "SELECT * FROM users WHERE admin = '2'";
                                                $result2 = mysqli_query($db, $sql2);
                                                if (mysqli_num_rows($result2) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                        $riderId = $row['id'];                                                     
                                                        $riderUsername = $row['username'];
                                                        echo"
                                                            <option value='$riderUsername'>$riderUsername</option>
                                                        ";
                                                    }
                                                }
                                echo "                             
                                                </select>
                                                <input type='submit' name='selectrider' id='selectrider' value='Assign Rider' />
                                            </form>
                                        </td>
                                        <td>
                                            <ul style='list-style-type: none'>
                                                <li>$status</li>
                                                <li>
                                                    <form method='post' action='admin.php'>
                                                        <input type='text' name='status' id='status' value='$status' style='display: none' />
                                                        <input type='text' name='orderid' id='orderid' value='$id' style='display: none' />
                                                        <input type='submit' name='cleartask' id='cleartask' value='Clear' style='padding: 0.9em; color: white; background: red; border: none; border-radius: 5px' />
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                        // Clear an order from the orders table
                        if (isset($_POST['cleartask'])) {
                            $status = $_POST['status'];
                            $id = $_POST['orderid'];
                            if($status=='Completed') {
                                $sql = "DELETE FROM orders WHERE id='$id'";
                                mysqli_query($db, $sql);
                            }
                        }
                        
                        // Assign a rider for a task
                        if (isset($_POST['selectrider'])) {
                            $rider = $_POST['rider'];

                            // Ensure that form fields are filled properly
                            if (empty($rider)) {
                                array_push($errors, "You should select a rider first");
                            }

                            if (count($errors) == 0) {
                                // Task sent to the relevant rider
                                $sql = "INSERT INTO " . $rider . "tasks" . " (orderId, productId, seller, buyer, total, address)
                                        VALUES ('$id', '$productId', '$seller', '$buyer', '$total', '$address')";
                                $result = mysqli_query($db, $sql);
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Users Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Users & Riders</p></b>
            <b><p style="font-size: 20px; color: black"><i>All the details about Users & Riders...</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Registered Date</th>
                        <th>Privilage Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering transaction details
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $fname = $row['fullname'];
                                $email = $row['email'];
                                $username = $row['username'];
                                $password = $row['password'];
                                $regdate = $row['reg_date'];
                                $privilage = $row['admin'];

                                if((int)$privilage==1) {
                                    echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$fname</td>
                                            <td>$email</td>
                                            <td>$username</td>
                                            <td>$password</td>
                                            <td>$regdate</td>
                                            <td>$privilage</td>
                                            <td></td>
                                        </tr>
                                    ";
                                } else {
                                    echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$fname</td>
                                            <td>$email</td>
                                            <td>$username</td>
                                            <td>$password</td>
                                            <td>$regdate</td>
                                            <td>$privilage</td>
                                            <td>
                                                <form method='post' action='./admin.php'>
                                                    <input type='text' id='priv' name='priv' value='$privilage' style='display: none'>
                                                    <input type='text' id='usrnm' name='usrnm' value='$username' style='display: none'>
                                                    <input type='text' id='uid' name='uid' value='$id' style='display: none'>
                                                    <button type='submit' id='del' name='del'>Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        }

                        // Revome a User/Rider
                        if (isset($_POST['del'])) {
                            $id = $_POST['uid'];
                            $uname = $_POST['usrnm'];
                            $privilage = (int)$_POST['priv'];
                            $sql = "DELETE FROM users WHERE id='$id'";
                            mysqli_query($db, $sql);
                            if($privilage==2) {
                                $sql = "DROP TABLE $uname" . "bank";
                            } else {
                                $sql = "DROP TABLE $uname";
                            }
                            mysqli_query($db, $sql);
                            if($privilage==2) {
                                $sql = "DROP TABLE $uname" . "tasks";
                            } else {
                                $sql = "DROP TABLE $uname" . "acc";
                            }
                            mysqli_query($db, $sql);
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <!-- Users/Riders Registration -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Register Users | Riders</p></b>
            <b><p style="font-size: 20px; color: black"><i>Create a new seller, buyer or rider...</i></p></b>
        </center>
        <center>
            <table>
                <tr>
                    <th>
                        <div style="margin: 2em">
                            <?php
                                include('addrider.php');
                                // Register a rider - Admin
                                if (isset($_POST['registerrider'])) {
                                    $name = $_POST['name'];
                                    $email =$_POST['email'];
                                    $username = $_POST['username'];
                                    $password_1 = $_POST['password'];
                                    $password_2 = $_POST['repassword'];

                                    // Checking whether the passwords are matching
                                    if ($password_1 != $password_2) {
                                        array_push($errors, "The two passwords do not match");
                                    }

                                    // If there are no errors, save user to database
                                    if (count($errors) == 0) {
                                        // Encrypt password before storing in database (security purposes)
                                        $password = md5($password_1);
                                        $sql = "INSERT INTO users (fullname, email, username, password, admin)
                                                VALUES ('$name', '$email', '$username', '$password', '2')";
                                        mysqli_query($db, $sql);
                                        // Create 'tasks' table
                                        $sql = "CREATE TABLE " . $username . "tasks" . " (
                                            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                            orderId INT(10) NOT NULL,
                                            productId INT(10) NOT NULL,
                                            seller VARCHAR(100) NOT NULL,
                                            buyer VARCHAR(100) NOT NULL,
                                            total DECIMAL(50,2) NOT NULL,
                                            address VARCHAR(200) NOT NULL,
                                            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                        )";
                                        mysqli_query($db, $sql);

                                        // Create 'bank' table
                                        $sql = "CREATE TABLE " . $username . "bank" . " (
                                            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                            taskId INT(10) NOT NULL,
                                            total DECIMAL(50,2) NOT NULL,
                                            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                        )";
                                        mysqli_query($db, $sql);
                                    }
                                }
                            ?>
                        </div>
                    </th>
                    <th>
                        <div style="margin: 4em">
                            <?php
                                include('adduser.php');
                                // Register a user - Admin
                                if (isset($_POST['registeruser'])) {
                                    $name = $_POST['name'];
                                    $email =$_POST['email'];
                                    $username = $_POST['username'];
                                    $password_1 = $_POST['password'];
                                    $password_2 = $_POST['repassword'];

                                    // Checking whether the passwords are matching
                                    if ($password_1 != $password_2) {
                                        array_push($errors, "The two passwords do not match");
                                    }

                                    // If there are no errors, save user to database
                                    if (count($errors) == 0) {
                                        // Encrypt password before storing in database (security purposes)
                                        $password = md5($password_1);
                                        $sql = "INSERT INTO users (fullname, email, username, password)
                                                VALUES ('$name', '$email', '$username', '$password')";
                                        mysqli_query($db, $sql);
                                        // Create 'tasks' table
                                        // Create a cart
                                        $sql = "CREATE TABLE $username (
                                            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                            seller VARCHAR(100) NOT NULL,
                                            productId INT(10) NOT NULL,
                                            itemname VARCHAR(100) NOT NULL,
                                            category VARCHAR(20) NOT NULL,
                                            quantity INT(20) NOT NULL,
                                            rate DECIMAL(50,2) NOT NULL,
                                            total DECIMAL(50,2) NOT NULL,
                                            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                        )";
                                        mysqli_query($db, $sql);

                                        // Create an account
                                        $sql = "CREATE TABLE " . $username . "acc" . " (
                                            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                            buyer VARCHAR(100) NOT NULL,
                                            productId INT(10) NOT NULL,
                                            itemname VARCHAR(100) NOT NULL,
                                            category VARCHAR(20) NOT NULL,
                                            quantity INT(20) NOT NULL,
                                            rate DECIMAL(50,2) NOT NULL,
                                            total DECIMAL(50,2) NOT NULL,
                                            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                        )";
                                        mysqli_query($db, $sql);
                                    }
                                }
                            ?>
                        </div>
                    </th>
                </tr>
            </table>
        </center>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>