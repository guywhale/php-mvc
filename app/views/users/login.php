<?php
[
    'email' => $email,
    'password' => $password,
    'emailErr' => $emailErr,
    'passwordErr' => $passwordErr,
] = $data;

?>
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="mb-3">Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form action="<?= URLROOT; ?>/users/login" method="POST">
                <div class="form-group mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email"
                        name="email"
                        class="form-control form-control-lg <?= !empty($emailErr) ? 'is-invalid' : '' ?>"
                        value="<?= $email; ?>"
                    >
                    <?php if ($emailErr) { ?>
                        <span class="invalid-feedback"><?= $emailErr; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password"
                        name="password"
                        class="form-control form-control-lg <?= !empty($passwordErr) ? 'is-invalid' : '' ?>"
                        value="<?= !empty($password) ?: $password; ?>"
                    >
                    <?php if ($passwordErr) { ?>
                        <span class="invalid-feedback"><?= $passwordErr; ?></span>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success d-block w-100">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/register" class="btn btn-light d-block">
                            Register an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>