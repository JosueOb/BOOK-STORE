<?php

session_start();
session_destroy();//delete SESSION
header('Location:../index.php');