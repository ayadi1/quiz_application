<?php
require_once '../helper/Tools.php';

use helper\Tools;
session_start();
session_unset();
session_destroy();
Tools::Redirect('../login.php');
