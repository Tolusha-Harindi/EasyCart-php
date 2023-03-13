<?php

$fullname = '';
$email = '';
$username = '';
$password = '';
$regdate = '';

$usrnm = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$usrnm'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fullname = $row['fullname'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $regdate = $row['reg_date'];
    }
}

include('./errors.php');

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
                <form action='account.php' method='post' style='position: sticky;'>
                    <center>
                        <h1 style='margin: 0.7em'>Update Account Details</h1>
                    </center>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='name'>Full Name</label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='name' name='name' value='$fullname'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='email'>Email</label>
                        </div>
                        <div class='col-75'>
                            <input type='email' id='email' name='email' value='$email'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='username'>Username <span style='color: red'>(Read only)</span></label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='username' name='username' value='$username' readonly>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='regdate'>Recent update <span style='color: red'>(Read only)</span></label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='regdate' name='regdate' value='$regdate' readonly>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='password'>Password</label>
                        </div>
                        <div class='col-75'>
                            <input type='password' id='password' name='password' placeholder='New password'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='repassword'>Re-enter password</label>
                        </div>
                        <div class='col-75'>
                            <input type='password' id='repassword' name='repassword' placeholder='Re-enter new password'>
                        </div>
                    </div>
                    <div class='row'>
                        <input type='submit' id='updateacc' value='Update' name='updateacc' style='background: #e0ac1c'>
                    </div>
                </form>
            </div>
        </body>
    </html>
";

// Update user details
if (isset($_POST['updateacc'])) {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password_1 = $_POST['password'];
    $password_2 = $_POST['repassword'];

    // Ensure that form fields are filled properly
    if (empty($fullname)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    // Checking whether the passwords are matching
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // If there are no errors, save user to database
    if (count($errors) == 0) {
        // Encrypt password before storing in database (security purposes)
        $password = md5($password_1);
        $sql = "UPDATE users SET fullname='$fullname', email='$email', password='$password' WHERE username='$username'";
        mysqli_query($db, $sql);
    }
}

?>