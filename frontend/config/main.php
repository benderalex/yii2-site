<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => ['html' => '\yii\helpers\Html'],
                    'uses' => ['yii\bootstrap'],
                ],

            ],
        ],

                
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => '',
        ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/<action>'=>'site/<action>',
                '<controller:\w+>/<key:[\w+-]*\w+>/?'=>'<controller>/view',
                '<controller:\w+>/category/<cat:[\w+-]*\w+>/?'=>'<controller>/index',
                
            ],
        ],

    ],
    'params' => $params,

    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            // set custom module properties here ...
        ],
    ],



];
