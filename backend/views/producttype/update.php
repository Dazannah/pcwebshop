<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Producttype $model */

$this->title = 'Update Producttype: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Producttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producttype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
