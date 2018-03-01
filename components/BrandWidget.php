<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.10.2017
 * Time: 22:33
 */

namespace app\components;


use app\models\Brand;
use yii\base\Widget;

class BrandWidget extends Widget
{
    public $tpl;
    public $data;
    public $menuHtml;


    public function init(){
        parent::init();
        if( $this->tpl === null ){
            $this->tpl = 'brand_ul';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $res = Brand::find()->innerJoinWith('brandProduct')->asArray()->all();
        foreach ($res as $key => $val){
            $res[$key]['brandProductCount'] = count($val['brandProduct']);
        }
        $this->data = $res;
        $this->menuHtml = $this->getMenuHtml($this->data);
        return $this->menuHtml;
    }

    protected function getMenuHtml($data){
        $str = '';
        foreach ($data as $category) {
            $str .= $this->brandToTemplate($category);
        }
        return $str;
    }

    protected function brandToTemplate($category){
        ob_start();
        include __DIR__ . '/brand_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}