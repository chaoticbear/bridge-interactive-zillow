<?php
require_once 'bootstrap.php';
use ChaoticBear\BridgeInteractiveZillow\Zestimates;
$zestimates = new Zestimates(getenv('SERVER_TOKEN'));
var_dump($zestimates->request());
