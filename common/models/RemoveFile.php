<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 14.02.17
 * Time: 23:17
 */

namespace common\models;

use yii\base\Model;

class RemoveFile extends Model
{
    public $fileName;

    public function rules()
    {
        return [
            ['fileName', 'match', 'pattern' => '/^(.*?).(jpg|png)$/i'],
        ];
    }

    public function remove($fileName)
    {
        $this->fileName = $fileName;
        if (!$this->validate()) return false;
        return unlink(__DIR__.'/../../files/'.$fileName);
    }
}