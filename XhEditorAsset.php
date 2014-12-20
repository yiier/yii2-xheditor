<?php
/**
 * User: yiqing
 * Date: 2014/12/10
 * Time: 13:25
 */

namespace yiier\xheditor;


use yii\web\AssetBundle;

class XhEditorAsset extends AssetBundle{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/yiier/xheditor/assets/xheditor-1.2.1';
    /**
     * @var array
     */
    public $js = [
        'xheditor-1.2.1.min.js'
    ];
    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
} 