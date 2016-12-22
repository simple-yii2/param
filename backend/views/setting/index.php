<?php

use yii\grid\GridView;
use yii\helpers\Html;

$title = Yii::t('settings', 'Settings');

$this->title = $title . ' | ' . Yii::$app->name;

$this->params['breadcrumbs'] = [
	$title,
];

?>
<h1><?= Html::encode($title) ?></h1>

<div class="btn-toolbar" role="toolbar">
	<?= Html::a(Yii::t('settings', 'Create'), ['create'], ['class' => 'btn btn-primary']) ?>
</div>

<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $model,
	'summary' => '',
	'tableOptions' => ['class' => 'table table-condensed'],
	'columns' => [
		[
			'attribute' => 'title',
			'format' => 'html',
			'value' => function($model, $key, $index, $column) {
				$title = Html::encode($model->title);
				$alias = Html::tag('span', Html::encode($model->alias), ['class' => 'label label-primary']);

				return $title . '&nbsp;' . $alias;
			}
		],
		'value',
		[
			'class'=>'yii\grid\ActionColumn',
			'options'=>['style'=>'width: 50px;'],
			'template'=>'{update} {delete}',
		],
	],
]) ?>
