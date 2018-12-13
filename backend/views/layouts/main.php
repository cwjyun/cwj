<?php
use yii\helpers\Html;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <?= Html::cssFile('@path_root/favicon.ico', ['type' => 'image/x-icon','rel'=>'shortcut icon']) ?>
    <?= Html::cssFile('@path_root/css/font.css') ?>
    <?= Html::cssFile('@path_root/css/xadmin.css') ?>
    <?= Html::jsFile('@path_root/js/jquery/jquery.min.js') ?>
    <?= Html::jsFile('@path_root/lib/layui/layui.js',['charset'=>'utf-8']) ?>
    <?= Html::jsFile('@path_root/js/xadmin.js',['charset'=>'utf-8']) ?>
</head>
<?= $content ?>







