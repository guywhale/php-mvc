<?php
[
    'name' => $name,
    'email' => $email,
    'password' => $passwword,
    'confirmPassword' => $confirmPassword,
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'passwordErr' => $passwordErr,
    'confirmPasswordErr' => $confirmPasswordErr,
] = $data;

?>
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?= URLROOT; ?>/users/register" method="POST">
                <div class="form-group mb-3">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text"
                        name="name"
                        class="form-control form-control-lg <?= !empty($nameErr) ? 'is-invalid' : '' ?>"
                        value="<?= $name; ?>"
                    >
                    <?php if ($nameErr) { ?>
                        <span class="invalid-feedback"><?= $nameErr; ?></span>
                    <?php } ?>
                </div>
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
                        value=""
                    >
                    <?php if ($passwordErr) { ?>
                        <span class="invalid-feedback"><?= $passwordErr; ?></span>
                    <?php } ?>
                </div>
                <div class="form-group mb-4">
                    <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
                    <input type="password"
                        name="confirmPassword"
                        class="form-control form-control-lg <?= !empty($confirmPasswordErr) ? 'is-invalid' : '' ?>"
                        value=""
                    >
                    <?php if ($confirmPasswordErr) { ?>
                        <span class="invalid-feedback"><?= $confirmPasswordErr; ?></span>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-lg d-block w-100">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/users/login" class="btn btn-light btn-lg d-block">
                            Have an account?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
