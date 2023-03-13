<?php

echo "
    <html>
        <head>
            <style>
                input[type=text], input[type=email], input[type=password], select, textarea {
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    resize: vertical;
                }

                label {
                    padding: 12px 12px 12px 0;
                    display: inline-block;
                }

                input[type=submit] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    float: right;
                }

                input[type=submit]:hover {
                    background-color: #45a049;
                }

                .container {
                    border-radius: 10px;
                    background-color: #f2f2f2;
                    padding: 20px;
                }

                .col-25 {
                    float: left;
                    width: 25%;
                    margin-top: 6px;
                }

                .col-75 {
                    float: left;
                    width: 75%;
                    margin-top: 6px;
                }

                .row:after {
                    content: '';
                    display: table;
                    clear: both;
                }

                @media screen and (max-width: 600px) {
                    .col-25, .col-75, input[type=submit] {
                        width: 100%;
                        margin-top: 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class='container' style='margin: 1em; margin-right: 3em; width: 95%; position: sticky; border: 1px solid black'>
                <form action='admin.php' method='post' style='position: sticky;'>
                    <center>
                        <h1 style='margin: 0.7em'>Register a User</h1>
                    </center>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='name'>Full Name</label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='name' name='name' placeholder='User name...' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='email'>Email</label>
                        </div>
                        <div class='col-75'>
                            <input type='email' id='email' name='email' placeholder='User email...' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='username'>Username</label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='username' name='username' placeholder='User username...' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='password'>Password</label>
                        </div>
                        <div class='col-75'>
                            <input type='password' id='password' name='password' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='repassword'>Re-enter password</label>
                        </div>
                        <div class='col-75'>
                            <input type='password' id='repassword' name='repassword' required>
                        </div>
                    </div>
                    <div class='row'>
                        <input type='submit' id='registeruser' value='Submit' name='registeruser' style='background: #e0ac1c'>
                    </div>
                </form>
            </div>
        </body>
    </html>
";

?>