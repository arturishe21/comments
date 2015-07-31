<?php

Route::post('/add_comment', array(
        'as' => 'add_comment',
        'uses' => 'Vis\Comments\CommentsController@doAddComment')
);
