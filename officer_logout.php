<?php
session_start();

session_unset();
session_destroy();

header("Location: officer_login.php?login"); 