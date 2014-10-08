<?php
unset($_SESSION['user']);
unset($_SESSION['type']);
header('Location: index.php');