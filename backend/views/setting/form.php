<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
	'layout' => 'horizontal',
	'enableClientValidation' => false,
]); ?>

	<?= $form->field($model, 'title') ?>

	<?= $form->field($model, 'alias') ?>

	<?= $form->field($model, 'value')->textarea(['rows' => 3]) ?>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<?= Html::submitButton(Yii::t('settings', 'Save'), ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('settings', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
		</div>
	</div>

<?php ActiveForm::end(); ?>
