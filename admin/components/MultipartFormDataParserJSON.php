<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 28.02.21
 * Time: 22:07
 */

namespace app\admin\components;


use yii\web\MultipartFormDataParser;

class MultipartFormDataParserJSON extends MultipartFormDataParser
{

    public function parse($rawBody, $contentType)
    {

        if (!$this->force) {
            if (!empty($_POST) || !empty($_FILES)) {
                if (isset($_POST['JSON'])){
                    return json_decode($_POST['JSON'],1);
                }
                return $_POST;
            }
        }

        return parent::parse($rawBody, $contentType);

    }

}