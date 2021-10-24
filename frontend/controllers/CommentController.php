<?php

namespace frontend\controllers;

use Yii;

use frontend\resource\Comment;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = Comment::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        
        return $actions;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];

        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class,
        ];

        return $behaviors;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => Comment::find()->andWhere([ 'post_id' => Yii::$app
                ->request
                ->get('postId') ]) //andWhere is more safe
        ]);
    }
}