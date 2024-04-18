<?php

session_start();
session_unset();
session_destroy();

header("Location: ../frontend/for_members.php");
die();