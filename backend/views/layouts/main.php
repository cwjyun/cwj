<?php
use yii\helpers\Html;
use backend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <?= Html::cssFile('@path_root/favicon.ico', ['type' => 'image/x-icon','rel'=>'shortcut icon']) ?>
    <?= Html::cssFile('@path_root/css/font.css') ?>
    <?= Html::cssFile('@path_root/css/xadmin.css') ?>
    <?= Html::jsFile('@path_root/js/jquery/jquery.min.js') ?>
    <?= Html::jsFile('@path_root/lib/layui/layui.js',['charset'=>'utf-8']) ?>
    <?= Html::jsFile('@path_root/js/xadmin.js',['charset'=>'utf-8']) ?>
</head>
<?php $this->beginBody() ?>
<?= $content ?>

<?php $this->endBody() ?>
<?php $this->endPage() ?>







