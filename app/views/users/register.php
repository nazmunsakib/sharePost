<?php 
    require APPROOT .'/views/inc/header.php'; 

    $name               = $data['name'] ?? '';
    $email              = $data['email'] ?? '';
    $password           = $data['password'] ?? '';
    $confirmPassword    = $data['confirm_password'] ?? '';

    $nameErr               = $data['name_err'] ?? '';
    $emailErr              = $data['email_err'] ?? '';
    $passwordErr           = $data['password_err'] ?? '';
    $confirmPasswordErr    = $data['confirm_password_err'] ?? '';
    ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="bg-body-tertiary p-5 rounded">
                <h3>Register New Acount!</h3>

                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group mb-2">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" class="form-control <?php echo (!empty($nameErr)) ? 'is-invalid' : ''; ?>" name="name" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $nameErr ?></span>
                    </div>

                    <div class="form-group mb-2">
                        <label for="Email1">Email address <span>*</span></label>
                        <input type="email" class="form-control <?php echo (!empty($emailErr)) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $emailErr ?></span>
                    </div>

                    <div class="form-group mb-2">
                        <label for="Password">Password <span>*</span></label>
                        <input type="password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" name="password" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $passwordErr ?></span>
                    </div>

                    <div class="form-group mb-2">
                        <label for="confirm_password">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control <?php echo (!empty($confirmPasswordErr)) ? 'is-invalid' : ''; ?>" name="confirm_password" value="<?php echo $confirmPassword; ?>">
                        <span class="invalid-feedback"><?php echo $confirmPasswordErr ?></span>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="Register">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block" value="Register">Have Account? Login</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>

