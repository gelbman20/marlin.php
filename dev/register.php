<?php
  $page_title = "Sign In";
  include_once "template-parts/header.php";
?>

<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">

          <div class="card-header">Register</div>

          <div class="card-body">

            <div id="register-success-alert" class="alert alert-success" role="alert">
              Аккаунт успешно добавлен
            </div>

            <div id="register-danger-alert" class="alert alert-danger" role="alert">
              Пароли не совпадают
            </div>

            <form id="register-form" action="bat/register-form.php" method="post">

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name">

                  <!--                  <span class="invalid-feedback" role="alert">-->
                  <!--                                                    <strong>Ошибка валидации</strong>-->
                  <!--                                                </span>-->
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email">
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="password">
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</div>

<?php
  include_once "template-parts/footer.php"
?>
