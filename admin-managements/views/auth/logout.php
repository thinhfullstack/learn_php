<?php
    unset($_SESSION['user']);
    header('location: admin-management.php?module=auth&action=login');