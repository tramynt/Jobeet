<!DOCTYPE html>
<html>
<head>
	<title>
		 <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); // Hàm này làm gì, kết quả là gì? ?>
	</title>
	 <?php echo $this->Html->charset(); ?>
	 <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script'); ?>
</head>
<body>
<?php
echo $data; ?>
</body>
</html>