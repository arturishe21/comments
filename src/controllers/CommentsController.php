<?php
namespace Vis\Comments;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\View;
use Vis\Comments\Facades\Comments;

class CommentsController extends Controller
{
    public function doAddComment()
    {
        parse_str(Input::get('data'), $data);

        if (isset($data['id_page'])) {

            $data['commentpage_type']= Crypt::decrypt($data['commentable']);
            $data['commentpage_id'] = $data['id_page'];

            if (Sentry::check()) {
                $data['user_id'] = Sentry::getUser()->id;
                $data['name'] = Sentry::getUser()->getFullName();
            }

            Comment::create($data);

            return $this->listCommetns($data['commentpage_type'], $data['id_page']);
        }
    }

    public function listCommetns($model, $idPage){

        $comments = Comments::getComments($model, $idPage);

        return View::make('comments::list_comments', compact("comments"));
    }


}