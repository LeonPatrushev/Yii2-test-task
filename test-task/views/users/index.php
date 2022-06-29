<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

?>

<h2>Пользователи</h2>

<div class="mb-3">

<?php
echo Html::button("Добавить пользователя", [
    'value'=>Yii::$app->urlManager->createUrl('/users/add'),
    'class'=> 'btn btn-info add-modal-click',
    'data-toggle'=>'tooltip',
    'data-placement'=>'bottom',
    'title'=>'Add']);
?>

</div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'Нет'],
    'columns' =>[
        'name',
        'surname',
        ['attribute' => 'image',
            'format' => ['image',['width'=>'200']],
            'value' => function($dataProvider) { return $dataProvider->image; },
        ],
        ['class'=> 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons'=>[
                'update' => function($url,$model,$key){
                    $btn = Html::button('Изменить данные',[
                        'value'=>Yii::$app->urlManager->createUrl('/users/update?id='. $key),
                        'class'=>'update-modal-click btn btn-info',
                        'data-toggle'=>'tooltip',
                        'data-placement'=>'bottom',
                        'title'=>'Update'
                    ]);
                    return $btn;
                },
            ]
        ],
    ]
]);
?>

<?php
    Modal::begin([
        'title' => '<h2>Форма пользователя</h2>',
        'id'=>'update-modal',
        'size'=>'modal-lg'
    ]);

    echo "<div id='updateModalContent'></div>";

    Modal::end();
?>