<?php
require_once "../backend/config_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/member_profile.css" type="text/css">
    <title>Member profile</title>
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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="for_members.php"><i class='far fa-user-circle' style='font-size: 24px'></i></a>
                      </li> -->
                    <li class="nav-item">
                        <a class="nav-link active" href="member_profile.php">Your profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="../backend/logout.php" method="post">
                            <button type="submit" class="logout-button mx-3">Logout</button>
                        </form>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container text-center">
           <h1>Welcome!</h1>
           <h2>You are logged in</h2>
           <?php
            echo $_SESSION["user_id"];
           ?>
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