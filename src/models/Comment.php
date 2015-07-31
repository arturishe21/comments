<?php namespace  Vis\Comments;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\View;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = array('commentpage_id', 'commentpage_type', 'name', 'message', 'user_id', 'rating', 'parent_id');

    /*
     * get form add comment
     * @param object $page this page
     *
     * @return html
     */
    public function showForm($page)
    {
        $user = Sentry::getUser();

        return View::make('comments::form', compact("page", "user"));
    }

    /*
     * get list comments for page
     * @param object $page this page
     *
     * @return html
     */
    public function showListComments($page)
    {
        $comments = $this->getComments(get_class($page), $page->id);

        return View::make('comments::list_comments', compact("comments"));
    }

    /*
     * relation user model
     *
     * @return object User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /*
     * get date created comment
     *
     * @return string
     */
    public function getDate()
    {
        return  $this->created_at;
    }

    /*
     * get all comment this page
     * @param string $model
     * @param integer $idPage
     *
     * @return object
     */
    public function getComments($model, $idPage)
    {
        $allComments = self::where("commentpage_id", $idPage)
                    ->where("commentpage_type", 'like', $model)
                    ->orderBy("created_at", "desc")->get();

        return $allComments;
    }
}