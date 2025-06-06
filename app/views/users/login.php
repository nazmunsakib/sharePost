<?php 
    require APPROOT .'/views/inc/header.php'; 

    $email              = $data['email'] ?? '';
    $password           = $data['password'] ?? '';

    $emailErr              = $data['email_err'] ?? '';
    $passwordErr           = $data['password_err'] ?? '';
    ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="bg-body-tertiary p-5 rounded">
                <?php flash('register_confirmation'); ?>
                <h3>Login!</h3>

                <form action="<?php echo URLROOT; ?>/users/login" method="post">
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

                    <div class="row mt-3">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="Login">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block" value="Register">No Account? Register</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>

