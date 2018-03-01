<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 15.10.2017
 * Time: 18:01
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title=null, $keywords = null, $desc = null){
       $this->view->title = $title;
       $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
       $this->view->registerMetaTag(['name' => 'description', 'content' =>"$desc"]);
    }


}