<?php

namespace Vis\Comments;

trait CommentTrait
{
    public function comments()
    {
        return $this->morphMany('Vis\Comments\Comment',  'commentpage', 'commentpage_type')->orderBy("created_at", "desc");
    }

    public function getCountComments()
    {
        return $this->morphMany('Vis\Comments\Comment',  'commentpage', 'commentpage_type')->count();
    }
}