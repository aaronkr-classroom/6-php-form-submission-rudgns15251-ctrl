<?php //sanitization-filters.php

$user['name'] = 'Ivy<script src="js/bad.js"></script>' //
$user['age'] = 23.75;
$user['email'] = 'ivy@eg.link/';

$sanitize_user['name'] = FILTER_SANITIZE_FULL_SPECIAL_CHARS;
$sanitize_user['age'] = FILTER_SANITIZE_NUMBER_INT;
$sanitize_user['name'] = FILTER_SANITIZE_EMAIL;

$user = filter_var_array($user,$sanitize_user);
?>

<?php include 'includes/header.php'; ?>

<p>Name:  <?= $user['name'] ?></p>
<p>Age:   <?= $user['age'] ?></p>
<p>Email: <?= $user['email'] ?></p>
<pre><?php var_dump($user); ?></pre>

<?php include 'includes/footer.php'; ?>