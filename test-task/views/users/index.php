<?php
use yii\bootstrap4\LinkPager as Bootstrap4LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        'name',
        'surname',
        'image:image',
        ['class'=> 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ],
    ]
]);
?>