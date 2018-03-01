<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.10.2017
 * Time: 22:51
 */

namespace app\models;


use yii\db\ActiveRecord;

class BrandProduct extends ActiveRecord
{
    public static function tableName(){
        return 'brand_product';
    }

    public function getBrand(){
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

}