<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
[
    'title' => $title,
    'description' => $description
] = $data;
?>


<?php if ($title) { ?>
    <h1 class=""><?= $title; ?></h1>
<?php } ?>

<?php if ($description) { ?>
    <p class=""><?= $description; ?></p>
    <p>Version <strong><?= APPVERSION; ?></strong></p>
<?php } ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
