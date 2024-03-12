<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Producttype $model */

$this->title = 'Create Producttype';
$this->params['breadcrumbs'][] = ['label' => 'Producttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
