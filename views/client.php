<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<?php $this->head() ?>
    </head>
    <body>
	<?php $this->beginBody() ?>

	<?php
	echo $content;
	?>
	<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>