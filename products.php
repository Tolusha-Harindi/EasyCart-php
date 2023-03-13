<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Products</title>
        <link rel="stylesheet" href="navbar.css">
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        
        <center>
            <table style='width: 90%; margin-top: 2em'>
                <tr>
                    <th style='border: 0px solid black; width: 40%; vertical-align: top; border-radius: 10px;' rowspan='2'>
                        <?php
                            // Display errors related to adding a product/rider
                            include('errors.php');

                            // Publish product
                            include('addproduct.php');

                            // Add product
                            if (isset($_POST['submitproduct'])) {
                                $imageLocation = '';
                                $username = $_SESSION['username'];
                                $productname = $_POST['productname'];
                                $description = $_POST['description'];
                                $price = $_POST['price'];
                                $category = $_POST['productcategory'];
                                $filename = $_FILES['uploadfile']['name'];
                                $filetmpname = $_FILES['uploadfile']['tmp_name'];
                                $folder = "Uploads";
                                // Ensure that form fields are filled properly
                                if (empty($productname)) {
                                    array_push($errors, "Product name is required");
                                }
                                if (empty($description)) {
                                    array_push($errors, "Product description is required");
                                }
                                if (empty($price)) {
                                    array_push($errors, "Product price is required");
                                }
                                if (empty($category)) {
                                    array_push($errors, "Product category is required");
                                }
                                // If there are no errors, save the product to database
                                if (count($errors) == 0) {
                                    // Upload images
                                    move_uploaded_file($filetmpname, $folder.$filename);

                                    $sql = "INSERT INTO products (name, description, price, seller, category, imagename)
                                            VALUES ('$productname', '$description', '$price', '$username', '$category', '$filename')";
                                    mysqli_query($db, $sql);
                                }
                            }
                        ?>
                    </th>
                    <th style='border: 1px solid black; width: 60%; vertical-align: top; height: 23%; border-radius: 10px; background: #f2f2f2'>
                        <?php
                            // Filter -> (Function is at the bottom of the page)
                            echo "
                                <center>
                                    <form method='post' action='products.php' style='width: 50%'>
                                        <label for='searchcategory'>Select a category:</label>
                                        <center>
                                            <select name='searchcategory' id='searchcategory'>
                                                <option value='all'>All</option>
                                                <option value='Shapewear'>Shapewear</option>
                                                <option value='Travelaccessories'>Travel accessories</option>
                                                <option value='Healthyandbeautyproducts'>Healthy and beauty products</option>
                                                <option value='Sleepwear'>Sleepwear</option>
                                                <option value='Smartwatches'>Smart watches</option>
                                                <option value='HealthCare'>Health Care</option>
                                                <option value='SkinCare'>Skin Care</option>
                                                <option value='HobbiesandCraft'>Hobbies and Craft</option>
                                                <option value='LampsandShades'>Lamps and Shades</option>
                                                <option value='MobileAccessories'>Mobile Accessories</option>
                                                <option value='Petproducts'>Pet products</option>
                                                <option value='Finejewelry'>Fine jewelry</option>
                                            </select>
                                            <input type='submit' id='selectcategory' name='selectcategory' value='Filter' style='background: #e0ac1c; margin: 1em' />
                                        </center>                                   
                                    </form>
                                </center>
                            ";
                        ?>
                    </th>
                </tr>
                <tr>
                    <th style='border: 0px solid black'>
                        <?php
                            echo "
                                <center>
                                    <hr style='height: 3px; margin-top: 2em; margin-bottom: 0.5em; border: 3px solid black; border-radius: 10px; width: 50%'/>
                                    <h1>Available Products</h1>
                                    <hr style='height: 3px; margin-top: 0.5em; margin-bottom: 2em; border: 3px solid #e0ac1c; border-radius: 10px; width: 50%'/>
                                </center>
                            ";
                            // Display products available to sell
                            $sql = "SELECT * FROM products";
                            // Including filter facilities
                            if (isset($_POST['selectcategory']) && ($_POST['searchcategory'] != 'all')) {
                                $selected = $_POST['searchcategory'];
                                $sql = "SELECT * FROM products WHERE category = '$selected'";
                            }
                            $result = mysqli_query($db, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $seller = $row['seller'];
                                    $category = $row['category'];
                                    $image = $row['imagename'];
                                    if ($row['seller'] == $_SESSION['username'] || $_SESSION['username'] == 'ucsc') {
                                        echo "
                                            <center>
                                                <div style='border: 0px solid red; max-height: 75%; width: 700px; max-width: 700px;'> 
                                                    <form method='post' action='products.php'>
                                                        <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                                        <table style='border: 2px solid black; width: 100%; border-radius: 10px; background: #f2f2f2;' cellspacing='10'>
                                                            <tr>
                                                                <td rowspan='4' style='border: 1px solid black; width: 30%'>
                                                                    <img src='./Uploads$image' width='100%' alt='Image not available' />
                                                                </td>
                                                                <td name='name'><h2>$name</h2></td>
                                                            </tr>
                                                            <tr>
                                                                <td name='description'>$description</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td name='price'>Rs. $price</td>
                                                                            <td style='width: 50px'></td>
                                                                            <td name='seller'>$seller</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type='submit' id='removeproduct' name='removeproduct' value='Remove' style='background: #e0ac1c' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </center>
                                        ";
                                        // Remove product
                                        if (isset($_POST['removeproduct'])) {
                                            $product = $_POST['productid'];
                                            $sql = "DELETE FROM products WHERE id = '$product'";
                                            mysqli_query($db, $sql);
                                        }
                                    } else {
                                        echo "
                                            <center>
                                                <div style='border: 0px solid red; max-height: 75%; width: 700px; max-width: 700px;'> 
                                                    <form method='post' action='products.php'>
                                                        <input value=$id name='productid' id='productid' style='display: none'></input>
                                                        <input value=$name name='name' id='name' style='display: none'></input>
                                                        <input value=$price name='price' id='price' style='display: none'></input>
                                                        <input value=$seller name='seller' id='seller' style='display: none'></input>
                                                        <input value=$category name='category' id='category' style='display: none'></input>
                                                        <table style='border: 2px solid black; width: 100%; border-radius: 10px; background: #f2f2f2;' cellspacing='10'>
                                                            <tr>
                                                                <td rowspan='4' style='border: 1px solid black; width: 30%'>
                                                                    <img src='./Uploads$image' width='100%' alt='Image not available' />
                                                                </td>
                                                                <td><h2>$name</h2></td>
                                                            </tr>
                                                            <tr>
                                                                <td>$description</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>Rs. $price</td>
                                                                            <td style='width: 50px'></td>
                                                                            <td>$seller</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <lable for='qty'>Quantity :</lable>
                                                                    <input type='text' id='qty' name='qty' style='width: 50%' />
                                                                    <input type='submit' id='addtocart' name='addtocart' value='Add to Cart' style='background: #e0ac1c' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </center>
                                        ";
                                    }
                                }
                            }
                            // Add a product to cart
                            if (isset($_POST['addtocart'])) {
                                $productId = $_POST['productid'];
                                $itemname = $_POST['name'];
                                $price = $_POST['price'];
                                $quantity = $_POST['qty'];
                                $seller = $_POST['seller'];
                                $category = $_POST['category'];
                                $total = (double)$price * (int)$quantity;
                                // $category
                                // $price
                                $sql = "INSERT INTO " . $_SESSION['username'] . " (productId, seller, itemname, category, quantity, rate, total)
                                        VALUES ('$productId', '$seller', '$itemname', '$category', '$quantity', '$price', '$total')";
                                mysqli_query($db, $sql);
                            }
                        ?>
                    </th>
                </tr>
            </table>
        </center>
        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>