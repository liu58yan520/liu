<?php
return array(
            'TMPL_PARSE_STRING'=>array(
                '__JS__'=>__ROOT__.'/Public/js', //设置前台js文件目录
                '__CSS__'=>__ROOT__.'/Public/css',
                '__IMG__'=>__ROOT__.'/Public/img',
            ),
             'COOKIE_KEY'=>'queen',
            'TMPL_ACTION_SUCCESS'=>'Public/jump',           //正确跳转
            'TMPL_ACTION_ERROR'=>'Public/jump',             //错误跳转
            'UPLOAD_PATH'=>'./Upload/',                       //上传文件路径

);