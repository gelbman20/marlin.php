<?php
  $page_title = "Home";
  include_once "template-parts/header.php"
?>

<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><h3>Комментарии</h3></div>

          <div class="card-body">
            <div class="alert alert-success" role="alert">
              Комментарий успешно добавлен
            </div>

            <div class="media">
              <img src="img/no-user.jpg" class="mr-3" alt="..." width="64" height="64">
              <div class="media-body">
                <h5 class="mt-0">John Doe</h5>
                <span><small>12/10/2025</small></span>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti,
                  sequi obcaecati.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="margin-top: 20px;">
        <div class="card">
          <div class="card-header"><h3>Оставить комментарий</h3></div>

          <div class="card-body">
            <form action="/store" method="post">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Имя</label>
                <input name="name" class="form-control" id="exampleFormControlTextarea1"/>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Сообщение</label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
</body>
</html>
