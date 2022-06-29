<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal'])?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'surname') ?>
<?= $form->field($model, 'password') ?>
<?= $form->field($model, 'imageFile')->fileInput() ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>

<?php
$js = <<<JS
$('form').on('beforeSubmit', function(){
   var data = $(this).serialize();
    $.ajax({
        url: '/users/add',
        type: 'POST',
        data: data,
        success: function(res){
            console.log(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});
JS;
?>