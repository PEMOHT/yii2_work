<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  <!--  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author',
            'date_creation',
            'article:ntext',
            'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>-->
    <?=
        \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'list-view'],
        'itemView' => function ($model) {



            return
                "<a href='view/?id=$model->id'><div style='margin: 40px; display: include-block'>" .

                "<div style='max-width: 200px; float: left; margin-right: 30px; margin-bottom: 10px;'>" .
                    "<img src='/$model->image' style='width: 100px; height: 100px;' alt='' >
                </div><h2>"  .

                Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) .

                "</h2><div style='height: 200px; '>" . mb_strimwidth($model->article, 0, 1000, '  Читать далее...') . "</div> " .

                "<div style='height: 50px; width: 200px;'><b> Автор статьи : </b>$model->author</div> " .

                "</div></a><hr>";
        },
    ])
    ?>
</div>
