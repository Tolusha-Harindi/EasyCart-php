<html>
    <head>
        <style type='text/css'>
            $font : 'Sofia', sans-serif;
            $font-size:16px;
            $blue : #0a4870;
            $blue2 : #e3ebf1;
            $black: #000;
            $grey : #7d7d7d;
            $grey2 : #f0f0f0;
            $grey3 : #e8e7e7;
            $grey4 : #fdfdfd;
            $bluegrey : #49606e;
            $orange: #ec992c;

            @mixin radius($val) {
                -webkit-border-radius: $val;
                -moz-border-radius: $val;
                border-radius: $val;
            }

            @mixin cardsOpen() {
                &::before {
                    background: rgba(10,72,112, 0.6);
                }
                .book-container {
                    .content {
                        opacity: 1;
                        transform: translateY(0px);
                    }
                }

                .informations-container {      
                    transform: translateY(0px);
                        .more-information {
                        opacity: 1;
                    }
                }
            }

            * {
                margin: 0;
                padding: 0;
                font-family: $font;
            }

            h2 {
                color: #0a4870;
                font-weight: 500;
            }

            ul {
                display: flex;
                flex-wrap: wrap;
                list-style: none;
                padding:0;
              
                .booking-card {
                    position: relative;
                    width: 300px;
                    display: flex;
                    flex: 0 0 300px;
                    flex-direction: column;
                    margin: 20px;
                    margin-bottom: 30px;
                    @include radius(10px);
                    overflow: hidden;
                    background-position: center center;
                    background-size: cover;
                    text-align: center;
                    color: $blue;
                    transition: .3s;

                    &::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: rgba(10,72,112, 0); 
                        transition: .3s;
                    }
                
                    .book-container {
                        height: 200px;
                        .content {
                            position: relative;
                            opacity: 0;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            height: 100%;
                            width: 100%;
                            transform: translateY(-200px); 
                            transition: .3s;
                    
                        .btn {      
                            border: 3px solid white;
                            padding: 10px 15px;
                            background: none;
                            text-transform: uppercase;
                            font-weight: bold;
                            font-size: 1.3em;
                            color: white; 
                            cursor: pointer;
                            transition: .3s;
                            
                            &:hover {
                                background: white;
                                border: 0px solid white;
                                color: $blue;
                            }
                        }
                    }
                }
                
                .informations-container{      
                    flex: 1 0 auto; 
                    padding: 20px;
                    background: $grey2;
                    transform: translateY(206px);
                    transition: .3s;
                  
                    .title {
                        position: relative;
                        padding-bottom: 10px;
                        margin-bottom: 10px;       
                        font-weight: bold;
                        font-size: 1.2em;
                    
                        &::after{
                            content: '';
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            height: 3px;
                            width: 50px;
                            margin: auto;
                            background: $blue;
                        }
                    }
                  
                    .price {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: 10px;
                    
                        .icon {
                            margin-right: 10px;
                        }
                    }
                  
                    .more-information {
                        opacity: 0;
                        transition: .3s;
                    
                        .info-and-date-container {
                            display: flex;
                      
                            .box {
                                flex: 1 0;
                                padding: 15px;
                                margin-top: 20px;
                                @include radius(10px);
                                background: white;
                                font-weight: bold;
                                font-size: 0.9em;

                                .icon {
                                    margin-bottom: 5px;
                                }

                                &.info {
                                    color: $orange;
                                    margin-right: 10px;
                                }
                            }
                        }
                    
                        .disclaimer {
                            margin-top: 20px;
                            font-size: 0.8em;
                            color: $grey;
                        }
                    }
                }
                
                &:hover {
                    @include cardsOpen();
                }
              }
            }

            @media (max-width: 768px) {
                ul {
                    .booking-card{
                    @include cardsOpen();
                }
              }
            }

            .credits{
                display: table;
                background: $blue;
                color: white;
                line-height: 25px;
                margin: 10px auto;
                padding: 20px;
                @include radius(10px);
                text-align: center;

                a {
                    color: $blue2;
                }
            }

            h1 {
                margin: 10px 20px;
            }
        </style>
    </head>
    <body>
        <ul>
            <?php
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
                        if ($row['seller'] == $_SESSION['username'] || $_SESSION['username'] == 'ucsc') {
                            echo "
                                <li class='booking-card' style='background-image: url()'>
                                    <form method='post' action='products.php'>
                                        <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                        <div class='book-container'>
                                            <div class='content'>
                                                <input type='submit' id='removeproduct' name='removeproduct' value='Remove' />
                                            </div>
                                        </div>
                                        <div class='informations-container'>
                                            <h2 class='title' name='name'>$name</h2>
                                            <p class='price' name='price'>
                                                <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                    <path fill='currentColor' d='M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z' />
                                                </svg>$price
                                            </p>
                                            <div class='more-information'>
                                                <div class='info-and-date-container'>
                                                    <div class='box info'>
                                                        <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                            <path fill='currentColor' d='M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z' />
                                                        </svg>
                                                        <p name='seller'>$seller</p>
                                                    </div>
                                                    <div class='box date'>
                                                        <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                            <path fill='currentColor' d='M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z' />
                                                        </svg>
                                                        <p>Delivery within 7 days</p>
                                                    </div>
                                                </div>
                                                <p class='disclaimer' name='description'>$description</p>
                                                <p name='category'>$category</p>
                                            </div>
                                        </div>
                                    </form>
                                </li>    
                            ";
                        } else {
                            echo "
                                <li class='booking-card' style='background-image: url()'>
                                    <form method='post' action='products.php'>
                                        <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                        <div class='book-container'>
                                            <div class='content'>
                                                <input type='text' id='qty' name='qty' />
                                                <button class='btn' type='submit' id='addtocart' name='addtocart'>Add to cart</button>
                                            </div>
                                        </div>
                                        <div class='informations-container'>
                                            <h2 class='title' name='name'>$name</h2>
                                            <p class='price' name='price'>
                                                <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                    <path fill='currentColor' d='M3,6H21V18H3V6M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M7,8A2,2 0 0,1 5,10V14A2,2 0 0,1 7,16H17A2,2 0 0,1 19,14V10A2,2 0 0,1 17,8H7Z' />
                                                </svg>$price
                                            </p>
                                            <div class='more-information'>
                                                <div class='info-and-date-container'>
                                                    <div class='box info'>
                                                        <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                            <path fill='currentColor' d='M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z' />
                                                        </svg>
                                                        <p name='seller'>$seller</p>
                                                    </div>
                                                    <div class='box date'>
                                                        <svg class='icon' style='width:24px; height:24px' viewBox='0 0 24 24'>
                                                            <path fill='currentColor' d='M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z' />
                                                        </svg>
                                                        <p>Delivery within 7 days</p>
                                                    </div>
                                                </div>
                                                <p class='disclaimer' name='description'>$description</p>
                                                <p name='category'>$category</p>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            ";
                            // Add a product to cart
                            if (isset($_POST['addtocart'])) {
                                $productId = $id;
                                $itemname = $name;
                                $quantity = $_POST['qty'];
                                $total = (double)$price * (int)$quantity;
                                // $category
                                // $price
                                $sql = "INSERT INTO " . $_SESSION['username'] . " (productId, seller, itemname, category, quantity, rate, total)
                                        VALUES ('$productId', '$seller', '$itemname', '$category', '$quantity', '$price', '$total')";
                                mysqli_query($db, $sql);
                            }
                        }
                        $id = NULL;
                        $name = NULL;
                        $description = NULL;
                        $price = NULL;
                        $seller = NULL;
                        $category = NULL;
                    }
                }
            ?>
        </ul>
    </body>
</html>