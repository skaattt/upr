<?php

use app\models\Poster;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Афиша';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poster-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'tickets',
            [
            'format' => 'raw',
            'label' => 'Забронировать',
            'content' => function ($model){
                if (Yii::$app->user->isGuest) return "Для бронирования авторизуйтесь";
                return Html::a('Заказать билеты', ['view', 'id_poster' => $model->id_poster]);
            }
            ], 

            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>

</div>
