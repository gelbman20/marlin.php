"use strict";

(function () {
  // Global variables
  let userAgent = navigator.userAgent.toLowerCase(),
    initialDate = new Date(),

    $document = $(document),
    $window = $(window),
    $html = $("html"),
    $body = $("body"),

    isDesktop = $html.hasClass("desktop"),
    isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false,
    isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),

    plugins = {
      commentForm: $('#comments-form'),
      commentAlert: $('#comment-alert'),
      registerForm: $('#register-form'),
      successAlertRegisterForm: $('#register-success-alert'),
      dangerAlertRegisterForm: $('#register-danger-alert')
    };

  $(function () {

    /*
    * Comment Form
    */

    // Comment`s HTML
    function commentHtml(comment) {
      return `<div class="media">
                <img src=${comment['avatar']} class="mr-3" alt="..." width="64" height="64">
                <div class="media-body">
                  <h5 class="mt-0">${comment['name']}</h5>
                  <span><small>${comment['date_time']}</small></span>
                  <p>${comment['text']}</p>
                </div>
              </div>`
    }

    function showAlertWithMessage(alert, message, delay = 2000) {
      alert.html(message);
      alert.addClass('active');

      setTimeout(function () {
        alert.removeClass('active');
      }, delay);
    }

    // Show All Comments with Ajax request
    function showComments(parent, children) {
      $.ajax({
        type: 'POST',
        url: 'bat/comments-form.php',
        success: function (response) {
          let commentsContent = $(parent);
          let html = '';
          let myJson = JSON.parse(response);

          myJson.forEach(function (comment) {
            html += commentHtml(comment);
          });

          commentsContent.html(html);
        }
      });
    }

    // Validate Input
    function inputsValidation(inputs) {
      let flag = true;
      for (let input in inputs) {

        if ( !inputs[input].val() ) {
          inputs[input].addClass('has-error');
          flag = false
        } else {
          inputs[input].removeClass('has-error')
        }
      }

      return flag;
    }

    // Clear Input
    function inputsClear(inputs) {
      for (let input in inputs) {
        inputs[input].val('');
        inputs[input].removeClass('has-error');
      }
    }

    for (let i = 0; i < plugins.commentForm.length; i++) {

      let form = $(plugins.commentForm[i]);

      showComments('#comments', ['#userName', '#userText']);

      // Add new comment after the form was submitted
      form.submit(function (e) {
        e.preventDefault();

        // Form fields
        let formInputs = {
          inputName: form.find('#userName'),
          inputText: form.find('#userText')
        };

        // Validate form inputs
        inputsValidation(formInputs);

        if ( !inputsValidation(formInputs) ) {
          return false
        }

        $.ajax({
          type: 'POST',
          url: 'bat/comments-form.php',
          data: $(this).serialize(),
          success: function (response) {
            let commentsContent = $('#comments');
            let html = '';
            let myJson = JSON.parse(response);

            myJson.forEach(function (comment) {
              html += commentHtml(comment);
            });

            // Add HTML to page
            commentsContent.html(html);

            // Show Access Alert
            showAlertWithMessage(plugins.commentAlert, 'Комментарий успешно добавлен');

            // Clear Inputs
            inputsClear(formInputs);
          }
        })
      });
    }

    /*
    * Register Form
    */
    for (let i = 0; i < plugins.registerForm.length; i++) {
      let form = $(plugins.registerForm[i]);

      let formInputs = {
        name: form.find($('#name')),
        email: form.find($('#email')),
        password: form.find($('#password')),
        password_confirm: form.find($('#password-confirm'))
      };

      form.submit(function (e) {
        e.preventDefault();

        // Validate form inputs
        inputsValidation(formInputs);

        if ( !inputsValidation(formInputs) ) {
          return false;
        }

        // Validate form password
        if ( formInputs.password.val() !== formInputs.password_confirm.val() ) {
          showAlertWithMessage(plugins.dangerAlertRegisterForm, 'Пароли не совпадают');
          return false;
        }

        $.ajax({
          type: 'POST',
          url: 'bat/register-form.php',
          data: $(this).serialize(),
          success: function (response) {
            var myJson = JSON.parse(response);

            if (myJson.login) {
              showAlertWithMessage(plugins.dangerAlertRegisterForm, 'Такой Name уже зарегистрирован, введите другой');
              return false;
            }

            if (myJson.email) {
              showAlertWithMessage(plugins.dangerAlertRegisterForm, 'Такой Email уже зарегистрирован, введите другой');
              return false;
            }

            showAlertWithMessage(plugins.successAlertRegisterForm, 'Аккаунт успешно добавлен');

            // Clear Inputs
            inputsClear(formInputs);
          }
        });
      });
    }
  });

}());