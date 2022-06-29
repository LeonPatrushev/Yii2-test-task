<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal'])?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'surname') ?>
<?= $form->field($model, 'imageFile')->fileInput() ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
