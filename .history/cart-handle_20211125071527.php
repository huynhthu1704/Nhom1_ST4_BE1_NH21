<?php
    session_start();
    if (isset($POST['id'])) {
        echo $POST['id'];
    }