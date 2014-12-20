yii2-xheditor
=============

XhEditor WYSIWYG widget for Yii2. 

basic usage :
---------------
~~~

use yiier\xheditor\XhEditor;


<?= $form->field($model, 'text')->widget(XhEditor::className(), [
		'options' => ['rows' => 6],
	]) ?>
	
~~~
