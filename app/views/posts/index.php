<?php

[
    'posts' => $posts
] = $data;

?>

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('postMessage'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary ms-auto">
            <i class="fa fa-pencil"></i> Add post
        </a>
    </div>
</div>

<?php foreach ($posts as $post) { ?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?= $post->title; ?>
        </h4>
        <div class="bg-light p-2 mb-3">
            Written by <?= $post->name; ?> on <?= $post->postCreated; ?>
        </div>
        <p class="card-text">
            <?= $post->body; ?>
        </p>
        <a href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>" class="btn btn-dark">
            More
        </a>
    </div>
<?php } ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>

