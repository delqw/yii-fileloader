<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 14.02.17
 * Time: 23:17
 */

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10,'checkExtensionByMimeType' => false],
        ];
    }

    public function upload()
    {
        if (!$this->validate()) return false;
        foreach ($this->imageFiles as $file) {
            $file->saveAs(__DIR__.'/../../files/'.$file->baseName.'_'.(microtime(true)*10000).'.'.$file->extension);
        }
        return true;
    }
}