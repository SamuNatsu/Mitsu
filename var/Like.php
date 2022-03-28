<?php
require_once '../db/DB.php';

$cid = intval($_POST['cid']);
$db = new \Mitsu\DB();
echo $db->fetchAdd($cid . '.like', 1);
