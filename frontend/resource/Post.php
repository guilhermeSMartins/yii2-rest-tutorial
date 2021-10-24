<?php

namespace frontend\resource;


// with this way we can return more fields

class Post extends \common\models\Post
{

    public function extraFields()
    {
        return [ 'comments' ];
    }
}