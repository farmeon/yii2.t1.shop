<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 11.10.2017
 * Time: 23:55
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord{

    public static function tableName() {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}