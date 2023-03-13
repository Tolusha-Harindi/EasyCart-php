<html>
    <head>
        <!-- icons -->
        <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <style>
            *{
                padding:0;
                margin:0;
            }
                        
            html{
                background-color: #eaf0f2;
            }
                        
            body{
                font:16px/1.6 Arial,  sans-serif;
            }
                        
            header{
                text-align: center;
                padding-top: 100px;
                margin-bottom:190px;
            }
                        
            header h1{
                font: normal 32px/1.5 'Open Sans', sans-serif;
                color: #3F71AE;
                padding-bottom: 16px;
            }
                        
            header h2{
                color: #F05283;
            }
                        
            header span{
                color: #3F71EA;
            }
                                            
            footer{
                position: fixed;
                bottom: 0;
            }
                        
            @media (max-height:800px){
                footer { position: static; }
                header { padding-top:40px; }
            }
                                            
            .footer-distributed{
                background-color: #2c292f;
                box-sizing: border-box;
                width: 100%;
                text-align: left;
                font: bold 16px sans-serif;
                padding: 50px 50px 60px 50px;
                margin-top: 80px;
            }
                        
            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right{
                display: inline-block;
                vertical-align: top;
            }
                        
            .footer-distributed .footer-left{
                width: 30%;
            }
                        
            .footer-distributed h3{
                color:  #ffffff;
                font: normal 36px 'Cookie', cursive;
                margin: 0;
            }
                        
            .footer-distributed .footer-left img{
                width: 30%;
            }
                        
            .footer-distributed h3 span{
                color:  #e0ac1c;
            }
                        
            .footer-distributed .footer-links{
                color:  #ffffff;
                margin: 20px 0 12px;
            }
                        
            .footer-distributed .footer-links a{
                display:inline-block;
                line-height: 1.8;
                text-decoration: none;
                color:  inherit;
            }
                        
            .footer-distributed .footer-company-name{
                color:  #8f9296;
                font-size: 14px;
                font-weight: normal;
                margin: 0;
            }
                                                
            .footer-distributed .footer-center{
                width: 35%;
            }
                                                
            .footer-distributed .footer-center i{
                background-color:  #33383b;
                color: #ffffff;
                font-size: 25px;
                width: 38px;
                height: 38px;
                border-radius: 50%;
                text-align: center;
                line-height: 42px;
                margin: 10px 15px;
                vertical-align: middle;
            }
                        
            .footer-distributed .footer-center i.fa-envelope{
                font-size: 17px;
                line-height: 38px;
            }
                        
            .footer-distributed .footer-center p{
                display: inline-block;
                color: #ffffff;
                vertical-align: middle;
                margin:0;
            }
                        
            .footer-distributed .footer-center p span{
                display:block;
                font-weight: normal;
                font-size:14px;
                line-height:2;
            }
                        
            .footer-distributed .footer-center p a{
                color:  #e0ac1c;
                text-decoration: none;;
            }
                        
            .footer-distributed .footer-right{
                width: 30%;
            }
                        
            .footer-distributed .footer-company-about{
                line-height: 20px;
                color:  #92999f;
                font-size: 13px;
                font-weight: normal;
                margin: 0;
            }
                        
            .footer-distributed .footer-company-about span{
                display: block;
                color:  #ffffff;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 20px;
            }
                        
            .footer-distributed .footer-icons{
                margin-top: 25px;
            }
                        
            .footer-distributed .footer-icons a{
                display: inline-block;
                width: 35px;
                height: 35px;
                cursor: pointer;
                background-color:  #33383b;
                border-radius: 2px;
                        
                font-size: 20px;
                color: #ffffff;
                text-align: center;
                line-height: 35px;
                        
                margin-right: 3px;
                margin-bottom: 5px;
            }
                        
            @media (max-width: 880px) {            
                .footer-distributed .footer-left,
                .footer-distributed .footer-center,
                .footer-distributed .footer-right{
                    display: block;
                    width: 100%;
                    margin-bottom: 40px;
                    text-align: center;
                }
                        
                .footer-distributed .footer-center i{
                    margin-left: 0;
                }        
            }
        </style>
    </head>
    <body>
        <footer class='footer-distributed'>
            <div class='footer-left'>
                <img src='./images/cart.png'>
                <h3>About<span>EasyCart</span></h3>
                <p class='footer-links'>
                    <?php 
                        if (isset($_SESSION['admin'])) {
                            echo "
                                <a href='./index.php'>Home</a>
                                |
                                <a href='./products.php'>Products</a>
                                |
                                <a href='./aboutus.php'>About</a>
                                |
                                <a href='./help.php'>Help</a>
                                |
                                <a href='./admin.php'>Admin</a>
                                |
                                <a href='./Backend/logout.php'>Logout</a>
                            ";
                        } else if (isset($_SESSION['rider'])) {
                            echo "
                                <a href='./aboutus.php'>About</a>
                                |
                                <a href='./help.php'>Help</a>
                                |
                                <a href='./tasks.php'>Tasks</a>
                                |
                                <a href='./bank.php'>Bank</a>
                                |
                                <a href='./Backend/logout.php'>Logout</a>
                            ";
                        } else {
                            echo "
                                <a href='./index.php'>Home</a>
                                |
                                <a href='./products.php'>Products</a>
                                |
                                <a href='./aboutus.php'>About</a>
                                |
                                <a href='./help.php'>Help</a>
                                |
                                <a href='./account.php'>Account</a>
                                |
                                <a href='./cart.php'>Cart</a>
                                |
                                <a href='./Backend/logout.php'>Logout</a>
                            ";
                        }
                    ?>
                </p>
                <p class='footer-company-name'>© 2019 Easy Cart Pvt. Ltd.</p>
            </div>
            <div class='footer-center'>
                <div>
                    <i class='fa fa-map-marker'></i>
                    <p><span>Group 9 - Information Systems 2019/2020</span>
                        UCSC, Reid Avenue, Colombo - 00700
                    </p>
                </div>
                <div>
                    <i class='fa fa-phone'></i>
                    <p>+94 76 613 7680</p>
                </div>
                <div>
                    <i class='fa fa-envelope'></i>
                    <p><a href='mailto:support@easycart.com'>support@easycart.com</a></p>
                </div>
            </div>
            <div class='footer-right'>
                <p class='footer-company-about'>
                    <span>About the company</span>
                    EasyCart is a free platform for everyone those who are interested in buying and selling every kind of products.
                </p>
                <div class='footer-icons'>
                    <a href='#'><i class='fa fa-facebook'></i></a>
                    <a href='#'><i class='fa fa-twitter'></i></a>
                    <a href='#'><i class='fa fa-instagram'></i></a>
                    <a href='#'><i class='fa fa-linkedin'></i></a>
                    <a href='#'><i class='fa fa-youtube'></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>