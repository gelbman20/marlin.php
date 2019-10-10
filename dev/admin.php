<?php
  $page_title = "Admin Panel";
  include_once "template-parts/header.php"
?>
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><h3>Админ панель</h3></div>

          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th>Аватар</th>
                <th>Имя</th>
                <th>Дата</th>
                <th>Комментарий</th>
                <th>Действия</th>
              </tr>
              </thead>

              <tbody>
              <tr>
                <td>
                  <img src="img/no-user.jpg" alt="" class="img-fluid" width="64" height="64">
                </td>
                <td>John</td>
                <td>12/08/2045</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta aut quam cumque libero reiciendis,
                  dolor.
                </td>
                <td>
                  <a href="" class="btn btn-success">Разрешить</a>

                  <a href="" class="btn btn-warning">Запретить</a>

                  <a href="" onclick="return confirm('are you sure?')" class="btn btn-danger">Удалить</a>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</div>
</body>
</html>
