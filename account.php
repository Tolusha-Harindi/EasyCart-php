<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | My Account - <?php echo $_SESSION['username'] ?></title>
        <link rel="stylesheet" href="./styles/table.css">
        <style>
            body {
                background: white;
            }
        </style>
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Cart -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">My Cart</p></b>
            <b><p style="font-size: 20px; color: black"><i>Buy? Or not?</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Item Name</th>
                        <th>Seller</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering items exist in the cart 
                        $sql = "SELECT * FROM " . $_SESSION['username'];
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $_SESSION['username'];
                                $id = $row['id'];
                                $pid = $row['productId'];
                                $itemname = $row['itemname'];
                                $seller = $row['seller'];
                                $buyer = $_SESSION['username'];
                                $category = $row['category'];
                                $qty = $row['quantity'];
                                $rate = $row['rate'];
                                $total = $row['total'];
                                $date = $row['date'];

                                echo "
                                    <tr>
                                        <td>$pid</td>
                                        <td>$itemname</td>
                                        <td>$seller</td>
                                        <td>$category</td>
                                        <td>$qty</td>
                                        <td>$rate</td>
                                        <td>$total</td>
                                        <td>$date</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>
                                                        <form method='post' action='account.php'>
                                                            <input type='text' name='id' id='id' value='$id' style='display: none' />
                                                            <input type='text' id='address' name='address' placeholder='Address to be delivered...' />
                                                            <button type='submit' name='buy' id='buy' style='color: white; background: green; padding: 0.9em; border: none; border-radius: 5px'>Buy</button>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <form method='post' action='account.php'>
                                                                <input type='text' name='id' id='id' value='$id' style='display: none' />
                                                                </center>
                                                                    <input type='submit' name='delete' id='delete' value='Remove' style='background: red' />
                                                                </center>                                                           
                                                            </form>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                ";

                                // Buy a product
                                if (isset($_POST['buy'])) {
                                    $address = $_POST['address'];

                                    if (empty($address)) {
                                        array_push($errors, "Enter the address where the item to be delivered");
                                    }

                                    if (count($errors) == 0) {
                                        // Sending tax to admin
                                        $tax = 0.15 * (double)$total;
                                        $sql = "INSERT INTO transactions (pid, buyer, seller, amount, taxrate, tax) 
                                                VALUES ('$pid', '$buyer', '$seller', '$total', '0.15', '$tax')";
                                        $result = mysqli_query($db, $sql);

                                        // Substracting tax from the total
                                        $total = $total - 0.15 * $total;

                                        // Send money to the owner account
                                        $sql = "INSERT INTO " . $seller . "acc" . " (buyer, productId, itemname, category, quantity, rate, total)
                                                VALUES ('$name', '$pid', '$itemname', '$category', '$qty', '$rate', '$total')";
                                        mysqli_query($db, $sql);

                                        // Order sent to EasyCart admin
                                        $sql = "INSERT INTO orders (productId, rate, quantity, total, seller, buyer, address)
                                                VALUES ('$pid', '$rate', '$qty', '$total', '$seller', '$buyer', '$address')";
                                        mysqli_query($db, $sql);

                                       
                                    }
                                }

                                // Delete a product from the cart
                                if (isset($_POST['delete'])) {
                                    $sql = "DELETE FROM " . $_SESSION['username'] . " WHERE id = " . $_POST['id'];
                                    mysqli_query($db, $sql);
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Transactions -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Transactions</p></b>
            <b><p style="font-size: 20px; color: black"><i>Customer payment details</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Buyer</th>
                        <th>Product Id</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering items bought by customers 
                        $sql = "SELECT * FROM " . $_SESSION['username'] . "acc";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $pid = $row['productId'];
                                $itemname = $row['itemname'];
                                $buyer = $row['buyer'];
                                $category = $row['category'];
                                $qty = $row['quantity'];
                                $rate = $row['rate'];
                                $total = $row['total'];
                                $date = $row['date'];

                                echo "
                                    <tr>
                                        <td>$buyer</td>
                                        <td>$pid</td>
                                        <td>$itemname</td>
                                        <td>$category</td>
                                        <td>$qty</td>
                                        <td>$rate</td>
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

        <!-- My Products -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">My Products</p></b>
            <b><p style="font-size: 20px; color: black"><i>Yeah.. I'm the seller..</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering items published by the user 
                        $usr = $_SESSION['username'];
                        $sql = "SELECT * FROM products WHERE seller='$usr'";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pid = $row['id'];
                                $itemname = $row['name'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $category = $row['category'];
                                echo "
                                    <tr>
                                        <td>$pid</td>
                                        <td>$itemname</td>
                                        <td>$description</td>
                                        <td>$price</td>
                                        <td>$category</td>
                                        <td>
                                            <form method='post' action='./account.php'>
                                                <input type='text' id='pid' name='pid' value='$pid' style='display: none'>
                                                <button type='submit' id='dele' name='dele' style='padding: 0.9em; color: white; background: red; border: none; border-radius: 5px'>Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                ";
                            }
                        }

                        // Revome a product
                        if (isset($_POST['dele'])) {
                            $pid = $_POST['pid'];
                            $sql = "DELETE FROM products WHERE id='$pid'";
                            $result = mysqli_query($db, $sql);
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Update -->
        <div style="margin: 10em">
            <?php include('update.php'); ?>
        </div>

        <!-- Delete Account -->
        <center>
            <div style="border: 3px solid red; width: 60%">
                <h1 style='margin: 1em; color: red'>Delete Account</h1>
                <h3>Any activity that you are supposed to do in this area cannot be undo under any circumanstance. <br>Administrator won't take responsiblity for the work that you are doing in this section.</h3>
                <form action='account.php' method='post'>
                    <button type='submit' id='deleteaccount' name='deleteaccount' 
                        style= 'margin: 1em; 
                                padding: 1em; 
                                font-size: 20px; 
                                background: red; 
                                border: none; 
                                border-radius: 10px; 
                                color: white'
                    >
                        I agree, Delete my account
                    </button>
                </form>
            </div>
            <?php
                if(isset($_POST['deleteaccount'])) {
                    $uname = $_SESSION['username'];
                    $sql = "DELETE FROM users WHERE username='$uname'";
                    mysqli_query($db, $sql);
                    $sql = "DROP TABLE $uname";
                    mysqli_query($db, $sql);
                    $sql = "DROP TABLE $uname" . "acc";
                    mysqli_query($db, $sql);
                }
            ?>
        </center>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>