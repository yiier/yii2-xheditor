<?php
/**
 * User: yiqing
 * Date: 2014/12/10
 * Time: 13:11
 */

namespace yiier\xheditor;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class XhEditor extends InputWidget
{

    /**
     *
     * @var string
     */
    public $lang = 'zh-cn';

    /**
     * @var array the options for the xhEditor 4 JS plugin.
     */
    public $clientOptions = [];

    /**
     * Initializes the widget options.
     * This method sets the default values for various options.
     */
    protected function initOptions()
    {
        $options = [];
        $this->clientOptions = ArrayHelper::merge($options, $this->clientOptions);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initOptions();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
        $this->registerPlugin();
    }

    /**
     * Registers xheditor plugin
     */
    protected function registerPlugin()
    {
        $view = $this->getView();
        //----------------------------------------------------------------------------------\\
        static $assetRegistered = false;
        $asset = XhEditorAsset::register($view);
        // 注册语言包 最好做下白名单检查 当语言包不存在时 注册默认的语言包
        // TODO 多个实例时会注册多次语言包 做成静态方法 只调用一次 可以避免这种问题
        if ($assetRegistered == false) {
            $asset->js[] = "xheditor_lang/{$this->lang}.js";
        }
        $assetRegistered = true;
        //----------------------------------------------------------------------------------//

        $id = $this->options['id'];
        $options = $this->clientOptions !== false && !empty($this->clientOptions)
            ? Json::encode($this->clientOptions)
            : '{}';

        $js = <<<JS_INIT

   $('#{$id}').xheditor({$options});
JS_INIT;

        $view->registerJs($js);
    }
} 