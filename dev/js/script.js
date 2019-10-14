"use strict";

(function () {
  // Global variables
  var userAgent = navigator.userAgent.toLowerCase(),
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
      commentAlert: $('#comment-alert')
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

    // Show All Comments with Ajax request
    function showComments(parent, children) {
      $.ajax({
        type: 'POST',
        url: 'bat/comments-form.php',
        data: $(this).serialize(),
        success: function (response) {
          var commentsContent = $(parent);
          var html = '';
          var myJson = JSON.parse(response);

          myJson.forEach(function (comment) {
            html += commentHtml(comment);
          });

          commentsContent.html(html);

          for (var i = 0; i < children.length; i++) {
            form.find(children[i]).val('')
          }
        }
      });
    }

    // Validate Input
    function inputValidation(input) {
      !input.val() ? input.addClass('has-error') : input.removeClass('has-error');
      console.log(input, !input);
      return !input.val();
    }

    for (var i = 0; i < plugins.commentForm.length; i++) {

      var form = $(plugins.commentForm[i]);

      showComments('#comments', ['#userName', '#userText']);

      // Add new comment after the form was submitted
      form.submit(function (e) {
        e.preventDefault();

        var inputName = form.find('#userName');
        var inputText = form.find('#userText');

        inputValidation(inputName);
        inputValidation(inputText);

        if ( inputValidation(inputName) || inputValidation(inputText) ) {
          return false
        }

        $.ajax({
          type: 'POST',
          url: 'bat/comments-form.php',
          data: $(this).serialize(),
          success: function (response) {
            var commentsContent = $('#comments');
            var html = '';
            var myJson = JSON.parse(response);

            myJson.forEach(function (comment) {
              html += commentHtml(comment);
            });

            commentsContent.html(html);

            plugins.commentAlert.addClass('active');

            setTimeout(function () {
              plugins.commentAlert.removeClass('active');
            }, 1000);

            inputName.val('');
            inputText.val('');

            inputName.removeClass('has-error');
            inputText.removeClass('has-error');
          }
        })
      });
    }
  });

}());