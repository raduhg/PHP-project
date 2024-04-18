<?php
//require_once "../backend/session_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/weather.css" type="text/css">
  <title>Weather</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="../scripts/weather.js" defer></script>
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
            <a class="nav-link active" href="weather.php">Weather</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
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
  <main class="mt-5">
    <div class="container text-center">
      <h1>Check the weather</h1>
      <p>For accurate results get the coordinates from the google map and insert them into the input fields.</p>
      <div class="row-sm d-flex align-items-center flex-wrap my-5">
        <div class="col">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d100090.30621797458!2d24.650585729073594!3d45.59931748936064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sro!2sro!4v1709537984317!5m2!1sro!2sro"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col d-flex flex-column my-5 content-right">
          <h2>Enter your coordinates</h2>
          <form id="weather-form">
            <input type="text" class="coord-input" id="lat-input" placeholder="Latitude">
            <input type="text" class="coord-input" id="long-input" placeholder="Longitude">
            <button type="submit">Get weather</button>
          </form>
          <div class="card" style="display: none;"></div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>