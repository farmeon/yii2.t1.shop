<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.10.2017
 * Time: 22:46
 */

namespace app\models;


use yii\db\ActiveRecord;

class Brand extends ActiveRecord
{
    public static function tableName(){
        return 'brand';
    }

    public function getBrandProduct(){
        return $this->hasMany(BrandProduct::className(), ['brand_id' => 'id']);
    }

}