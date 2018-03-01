<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 17.10.2017
 * Time: 23:40
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;


class AppAdminController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

} 