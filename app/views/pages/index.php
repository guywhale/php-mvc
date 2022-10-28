<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
[
    'title' => $title,
] = $data;
?>

<?php if ($title) { ?>
    <h1><?= $title; ?></h1>
<?php } ?>
    <p>This is the HwaleMVC PHP framework.</p>
    <p>Please refer to the docs on how to use it.</p>

<?php require APPROOT . '/views/inc/footer.php'; ?>
