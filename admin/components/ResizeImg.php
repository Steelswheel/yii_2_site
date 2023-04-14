<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 15.03.21
 * Time: 17:39
 */

namespace app\admin\components;


use yii\imagine\Image;

class ResizeImg
{
    public $resize;
    public $folder;
    public $name;
    public $thumb;

    public function __construct($data)
    {
        $this->resize = isset($data['resize']) ? $data['resize'] : null;
        $this->thumb = isset($data['thumb']) ? $data['thumb'] : null;

        $this->folder = $data['folder'];
        $this->name = $data['name'];
    }

    public function run() {
        if ($this->resize){
             return $this->resizeMethod();
        }
        if ($this->thumb){
             return $this->thumbMethod();
        }

        return null;
    }

    public function resizeMethod() {
        Image::resize($this->folder.$this->name, $this->resize, $this->resize)
            ->save($this->folder.$this->name, ['quality' => 80]);

        return $this->name;
    }

    public function thumbMethod() {
        $extension = (new \SplFileInfo($this->name))->getExtension();
        if (in_array($extension,['png','jpg','jpeg'])) {
            if (!file_exists($this->folder.'thumb_'.$this->name)){
                Image::resize($this->folder.$this->name, $this->thumb, $this->thumb)
                    ->save($this->folder.'thumb_'.$this->name, ['quality' => 80]);
            }
            return 'thumb_'.$this->name;
        }

        return null;
    }
}