<?php
    session_destroy();
    header('location: admin-management.php?module=auth&action=login');