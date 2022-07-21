<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- boostrap cdn -->
        <link rel="stylesheet" href="../aset/Boostrap/css/bootstrap.min.css">
        <script src="../aset/Boostrap/js/bootstrap.bundle.min.js"></script>
    <!-- end boostrap cdn -->

    <!-- w3school css cdn -->
        <link rel="stylesheet" href="../aset/W3School/w3.css">
    <!-- end w3school css cdn -->

    <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end font awesome -->

    <link rel="stylesheet" href="../aset/CSS/login.css?<?php echo time(); ?>" type="text/css">
    <title>{{ $title }}</title>
</head>
<body>

    <div class="container">
        <a href="/" class="w3-display-topleft back"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
        <div class="img">
            <img src="../aset/IMG/image_login.svg" alt="" srcset="">
        </div>

        <div class="login-container">
            <form action="login" method="post">
                @csrf
                <img class="avatar" src="../aset/IMG/avatar.svg" alt="" srcset="">
                <h2>Login</h2>

                <div class="input-div username">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>username</h5>
                        <input class="input" type="text" name="username" id="">
                    </div>
                </div>

                <div class="input-div password">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="password" id="">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

    <script src="../aset/JS/login.js"></script>

</body>
</html>