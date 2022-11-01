<?php
[
    'id' => $id,
    'title' => $title,
    'body' => $body,
    'titleErr' => $titleErr,
    'bodyErr' => $bodyErr
] = $data;

?>
<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?= URLROOT; ?>/posts" class="btn btn-light mt-5">
    <i class="fa fa-backward"></i> Back
</a>
<div class="card card-body bg-light mt-5">
    <h2 class="mb-3">Edit Post</h2>
    <p>Edit the post with this form.</p>
    <form action="<?= URLROOT; ?>/posts/edit/<?= $id; ?>" method="POST">
        <div class="form-group mb-3">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text"
                name="title"
                class="form-control form-control-lg <?= !empty($titleErr) ? 'is-invalid' : '' ?>"
                value="<?= $title; ?>"
            >
            <?php if ($titleErr) { ?>
                <span class="invalid-feedback"><?= $titleErr; ?></span>
            <?php } ?>
        </div>
        <div class="form-group mb-4">
            <label for="body">Body: <sup>*</sup></label>
            <textarea
                name="body"
                class="form-control form-control-lg <?= !empty($bodyErr) ? 'is-invalid' : '' ?>"
            ><?= $body; ?></textarea>
            <?php if ($bodyErr) { ?>
                <span class="invalid-feedback"><?= $bodyErr; ?></span>
            <?php } ?>
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
