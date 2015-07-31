<div class="all_comments_show">
    @if(count($comments)>0)
        <label><a href="javascript:;">{{count($comments)}} комментарий</a></label>
        <!--otziv_item!-->
        <div class="comment_item">
            <table>
              @foreach($comments as $comment)
                <tr>
                    <td class="foto_user">
                        <div class="avatar">
                                <img src="{{$comment->user->getAvatar(['w'=>50, 'h'=>50])}}" width="50" height="50">
                                <span class="nick_name">{{$comment->user->getFullName()}}</span>
                        </div>
                    </td>
                    <td>
                        <p class="date">{{$comment->getDate()}}</p>
                        <div class="comment_text">
                            {{{$comment->message}}}
                         </div>
                    </td>
                </tr>
              @endforeach
            </table>
        </div>
        <!--otziv_item!-->
    @else
       <div style="text-align: center; padding: 50px 0">Пока нет комментариев</div>
    @endif

</div>
