<?php

[
    'post' => $post,
    'user' => $user
] = $data;

?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?= URLROOT; ?>/posts" class="btn btn-light mt-5 mb-4">
    <i class="fa fa-backward"></i> Back
</a>
<h1 class="mb-3"><?= $post->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?= $user->name; ?> on <?= $post->postCreated; ?>
</div>
<p class="mb-5"><?= $post->body; ?></p>

<?php if ($post->userId === $_SESSION['userId']) { ?>
    <hr>
    <div class="d-flex justify-content-between">
        <a href="<?= URLROOT; ?>/posts/edit/<?= $post->id; ?>" class="btn btn-dark">
            Edit
        </a>

        <form class=""
            action="<?= URLROOT; ?>/posts/delete/<?= $post->id; ?>"
            method="post"
        >
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>

<?php } ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
