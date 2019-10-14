<?php
  $page_title = "Home";
  include_once "template-parts/header.php";

  $comments = [
    [
      'user' => 'John Doe',
      'avatar' => 'img/no-user.jpg',
      'time' => '12/10/2025',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati.'
    ],
    [
      'user' => 'Andrew Helever',
      'avatar' => 'img/no-user.jpg',
      'time' => '14/10/2025',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati.'
    ],
    [
      'user' => 'Vika Neveri',
      'avatar' => 'img/no-user.jpg',
      'time' => '14/10/2025',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati.'
    ],
    [
      'user' => 'Max Parshyn',
      'avatar' => 'img/no-user.jpg',
      'time' => '15/10/2025',
      'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, ullam doloremque deleniti, sequi obcaecati.'
    ]
  ];
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
            <?php foreach ($comments as $comment): ?>
              <div class="media">
                <img src="<?= $comment['avatar']; ?>" class="mr-3" alt="..." width="64" height="64">
                <div class="media-body">
                  <h5 class="mt-0"><?= $comment['user']; ?></h5>
                  <span><small><?= $comment['time']; ?></small></span>
                  <p><?= $comment['text']; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
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
