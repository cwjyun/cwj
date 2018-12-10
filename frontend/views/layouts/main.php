<?php
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?= app\common\widgets\header::widget()?>
<?= $content ?>
<?= app\common\widgets\footer::widget()?>

