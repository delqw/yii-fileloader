<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 14.02.17
 * Time: 23:20
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php
if (isset($status)) {
    echo $status ? 'Загружено' : 'Ошибка загрузки';
}
if (isset($removeStatus)) {
    echo $removeStatus ? 'Файл удален' : 'Ошибка удаления';
}
?>
<h2>Загрузка файлов</h2>
<?php
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
echo $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])
?>
    <button>Загрузить</button>

<?php ActiveForm::end() ?>

<hr>
<h2>Список файлов</h2>
<?php
if (count($files)) {
    foreach ($files as $file) {
        echo '<p>'.$file.' <a href="'.Url::toRoute(['site/files', 'fileName' => $file]).'">Удалить</a></p>';
    }
} else {
    echo 'Файлов нет';
}
?>