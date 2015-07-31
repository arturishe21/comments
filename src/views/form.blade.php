@if (Sentry::check())
   <form name="comments_form" method="post" action="">
        <table>
            <tr>
                <td width="120px">
                    <div class="avatar">
                        <img src="{{$user->getAvatar(['w'=>100, 'h'=>100])}}" width="100" height="100" alt="{{$user->getFullName()}}">
                        <p class="nick_name">{{$user->getFullName()}}</p>
                    </div>
                </td>
                <td>
                    <textarea name="message" placeholder="Введите свой комментарий"></textarea>
                    <button class="btn" type="submit">Отправить</button>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id_page" value="{{$page->id}}">
        <input type="hidden" name="commentable" value="{{Crypt::encrypt(get_class($page))}}">
    </form>
     <script>

            jQuery(function() {
                jQuery("[name=comments_form]").validate({
                    rules : {

                        message : {
                            required : true
                           }
                    },
                    // Messages for form validation
                    messages : {

                        message : {
                            required : 'Введите текст комментария'
                        }
                    },
                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element);
                    },
                    submitHandler: function(form) {
                        $.post("/add_comment", {data : $("[name=comments_form]").serialize() },
                            function (data) {

                             $(".all_comments_show").html(data);
                             $("[name=comments_form] textarea").val("");

                        });
                    }
                });
            });

  </script>

  @else
        <p style="text-align: center">Добавлять комментарии могут только <a href="#" data-reveal-id="login" style="text-decoration: underline">авторизованные пользователи</a></p>
  @endif