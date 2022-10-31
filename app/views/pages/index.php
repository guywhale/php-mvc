<?php
[
    'title' => $title,
    'description' => $description
] = $data;
?>

<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="mt-4 p-5 text-bg-secondary rounded text-center">
    <div class="container">
    <?php if ($title) { ?>
        <h1 class="display-3"><?= $title; ?></h1>
        <p class="lead"><?= $description; ?></p>
    <?php } ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
