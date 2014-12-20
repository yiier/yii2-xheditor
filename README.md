yii2-xheditor
=============

XhEditor WYSIWYG widget for Yii2. 



Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

add

```json

"repositories":[
        {
            "type":"vcs",
            "url":"https://github.com/yiier/yii2-xheditor"
        }
    ],
"yiier/yii2-xheditor-widget" : "*"
```

to the require section of your application's `composer.json` file.


basic usage :
---------------
~~~

use yiier\xheditor\XhEditor;


<?= $form->field($model, 'text')->widget(XhEditor::className(), [
		'options' => ['rows' => 6],
	]) ?>
	
~~~
