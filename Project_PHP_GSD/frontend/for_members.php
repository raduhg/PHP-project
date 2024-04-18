<?php
require_once '../backend/config_session.php';
require_once '../MVC/signup_view.php';
require_once '../MVC/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/for_members.css" type="text/css">
    <title>Sign-up | Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6fcfd8ed17.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Cortorarii</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="weather.php">Weather</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="for_members.php"><i class='far fa-user-circle' style='font-size: 24px'></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="mt-5">
        <div class="container text-center text-color">
            <h1 class="better-color">Become a member!</h1>
            <p class="text-color">Create a free account to able to schedule a trip and get access to exclusive content!</p>
            <div class="row-sm d-flex align-items-center flex-wrap my-5">

                <form class="col mx-5" action="../backend/signup.php" method="post">
                    <h3 class="text-color">Sign up</h3>
                    <?php
                        signup_inputs();
                     ?>

                    <?php
                        check_signup_errors(); 
                     ?>
                    <div class="form-check my-3">
                        <input type="checkbox" class="form-check-input" id="check" required>
                        <label class="form-check-label" for="exampleCheck1">I have read and agreed with the <a href="#">terms and conditions</a></label>
                    </div>
                    <button type="submit" class="btn btn-primary button-color">Sign up</button>

                </form>

                <form class="col mx-5" action="../backend/login.php" method="post">
                    <h3 class="text-color"> Already a member? <br> Log in!</h3>
                    <div class="form-group">
                        <input type="email" class="form-control  my-3 input-opacity" id="login-email" name="email"aria-describedby="emailHelp" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control my-3 input-opacity" id="login-password" name="psw" placeholder="Password">
                    </div>

                    <?php
                        check_login_errors();
                    ?>

                    <button type="submit" class="btn btn-primary button-color">Log in</button>
                </form>

            </div>
        </div>

    </main>

    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light">
            <div class="container text-center">
                <div class="row d-flex align-items-center">
                    <div class="col d-flex flex-column my-5">
                        <h2>Navigate</h2>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            href="index.php">Home</a>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            href="about.php">About Us</a>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            href="gallery.php">Gallery</a>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            href="contact.php">Contact</a>
                    </div>
                    <div class="col d-flex flex-column">
                        <h2>Follow us</h2>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            target="_blank"
                            href="https://www.instagram.com/hangradu?igsh=emlrbjljd2pteHZq&utm_source=qr">Instagram</a>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            target="_blank" href="https://www.facebook.com">Facebook</a>
                        <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover py-1"
                            target="_blank" href="https://www.youtube.com/@andreistrava1895">Youtube</a>
                    </div>

                    <div class="col my-5">
                        <h2>Join our newsletter</h2>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text text-light">We'll never share your email with
                                    anyone else.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>