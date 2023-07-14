<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Login</h3>
                <?php 
                session_start(); 
                if(!empty($_SESSION['loginError']))
                { ?>
                <h4 class="alert alert-danger"><?php echo $_SESSION['loginError'][0] ?></h4>

                <?php }
                unset($_SESSION['loginError']);
                 ?>
                <form  method="post" action="handleLogin.php">
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" class="form-control p_input"  name="email">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" class="form-control p_input"  name="password">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input name="Remember" type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<button href="registration.php"> Sign Up</button></p>
                </form>
              </div>
            </div>
            <?php include "footer.php"; ?>