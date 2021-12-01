<?php
    session_start();
    if (isset($GET['id'])) {
        echo $GET['id'];
    }