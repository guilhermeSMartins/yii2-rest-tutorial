<?php

namespace frontend\resource;


// with this way we can return more fields

class Post extends \common\models\Post
{
    public function fields()
    {
        return [ 'id', 'title', 'body', 'created_at' ];
    }

    public function extraFields()
    {
        return [ 'created_at', 'updated_at', 'updated_by', 'comments' ];
    }
}