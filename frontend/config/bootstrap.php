<?php
if(YII_ENV=='prod'){
    Yii::setAlias('@path_root', 'http://47.93.246.251');
}else{
    Yii::setAlias('@path_root', 'http://cwj.test');
}
