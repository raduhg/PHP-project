<?php
require_once '../MVC/form_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/contact.css" type="text/css">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../scripts/contact.js" defer></script>
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
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <?php
                        session_start();

                        if (!isset($_SESSION["user_id"])) {            
                            echo '<li class="nav-item">  <a class="nav-link" href="for_members.php"><i class="far fa-user-circle" style="font-size: 24px"></i></a></li>';
                        }
                        else {      
                            require_once "../MVC/login_model.php";
                            require_once "../backend/db_connection.php";

                            $result =  get_member($pdo, $_SESSION["email"]);
                            $admin = get_admin($result, $pdo);
                            if ($admin == true){
                            echo '<li class="nav-item">  <a class="nav-link" href="admin_profile.php">Admin profile</a></li>';
                            } else {
                            echo '<li class="nav-item">  <a class="nav-link" href="member_profile.php">Member profile</a></li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main>
        <div class="heading">
        </div>
        <div class="main-container">

            <div class="contact form">
                <h2>Get in touch</h2>
                <div id="error"></div>
                <form id="form" action="../backend/form_handler.php" method="post">
                    <div class="form-box">
                                <?php
                                    form_inputs();
                                ?>

                                <?php
                                    check_form_errors();
                                ?>
                        <div class="form-row-message">
                            <div class="input-box">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="info-box">
                    <div class="contact-info-row">
                        <span>Adress: </span>
                        <p>Str. Samuel Von Brukenthal nr.2, Sibiu, ROMANIA</p>
                    </div>
                    <div class="contact-info-row">
                        <span>Email: </span>
                        <a href="mailto:raduhang47@gmail.com">raduhang47@gmail.com</a>
                    </div>
                    <div class="contact-info-row">
                        <span>Phone:</span>
                        <a href="tel:+40770572469">+40 0770 572 469</a>
                    </div>
                </div>
            </div>
            <div class="contact map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d715.805735049818!2d24.151503814459584!3d45.79699294167285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474c679124578d5d%3A0xdb9316640bfa70bf!2sPrim%C4%83ria%20Municipiului%20Sibiu!5e0!3m2!1sro!2sro!4v1707103640568!5m2!1sro!2sro"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
</html>