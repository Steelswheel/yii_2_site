<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 16.03.21
 * Time: 0:20
 */

namespace app\admin\components;


class Dadata
{

    public $dadata;

    public function __construct(){

        $token = "abe53cf2c5ddd5d61dda029d2c26e746cd842ea5";
        $secret = "6d715d33d7e099750ed0e5dc11b70f06dcca0618";
        $this->dadata = new \Dadata\DadataClient($token, $secret);

    }

    public function geoAddress($lat,$lon){

        return $this->dadata->geolocate("address", $lat, $lon);

    }
}