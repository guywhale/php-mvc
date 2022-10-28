<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
[
    'title' => $title,
    'posts' => $posts,
] = $data;
?>

<?php if ($title) { ?>
    <h1><?= $title; ?></h1>
<?php } ?>

<?php if ($posts) { ?>
    <ul>
        <?php foreach ($posts as $post) { ?>
            <li><?= $post->title; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
