<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 15.10.2017
 * Time: 18:00
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use  Yii;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController{

    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])-> limit(6)->all();
        $this->setMeta('Магазин');
        return $this->render('index', compact('hits'));
    }


    public function actionView(){
        $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if(empty($category))
            throw new HttpException(404, 'Такой категории нет');

        //$products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam'=> false, 'pageSizeParam'=> false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('Магазин | '. $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category', 'pages'));

    }

 
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | Поиск: ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

}