<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
[
    'title' => $title
] = $data;
?>

<?php if ($title) { ?>
    <h1><?= $title; ?></h1>
<?php } ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
