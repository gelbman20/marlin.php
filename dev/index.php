<?php
  include 'config.php';
?>

<?php
  $page_title = "Home";
  include_once "template-parts/header.php";
?>

<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><h3>Комментарии</h3></div>
          <div class="card-body">
            <div id="comment-alert" class="alert alert-success" role="alert">
              Комментарий успешно добавлен
            </div>
            <div id="comments"></div>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="margin-top: 20px;">
        <div class="card">
          <div class="card-header"><h3>Оставить комментарий</h3></div>

          <div class="card-body">
            <form id="comments-form" action="bat/comments-form.php" method="post">
              <?php if(empty($_SESSION['login'])) {?>
                <div class="form-group">
                  <label for="userName">Имя</label>
                  <input name="name" autocomplete="name" class="form-control" id="userName"/>
                  <span class="invalid-feedback" role="alert">
                  <strong>Ошибка валидации</strong>
                </span>
                </div>
              <?php } ?>
              <div class="form-group">
                <label for="userText">Сообщение</label>
                <textarea name="text" class="form-control" id="userText" rows="3"></textarea>
                <span class="invalid-feedback" role="alert">
                  <strong>Ошибка валидации</strong>
                </span>
              </div>
              <button type="submit" class="btn btn-success">Отправить</button>
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
