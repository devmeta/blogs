<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($meta->title) ? $meta->title . ' - Devmeta': 'Devmeta';?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo isset($meta->title) ? $meta->title : '';?>" />
	<meta name="description" content="<?php echo isset($meta->title) ? $meta->title : '';?>" />
    <meta property="og:type" content="<?php echo isset($meta->og_type) ? $meta->og_type : 'article';?>" />
    <meta property="og:title" content="<?php echo isset($meta->og_title) ? $meta->og_title : '';?>" />
    <meta property="og:description" content="<?php echo isset($meta->og_description) ? $meta->og_description : '';?>" />
    <meta property="og:image" itemprop="image primaryImageOfPage" content="<?php echo isset($meta->og_image) ? $meta->og_image : '';?>" />
 	<link rel="shortcut icon" href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/min/?g=css.default"> 
</head>
<body class="<?php print !empty(segments(1)) ? segments(1) : 'landing';?> full-height">
	<?php include SP . 'app/views/shared/analytics.php';?>
	<?php include SP . 'app/views/shared/header.php';?>
	<div class="content"><?php echo $content;?></div>
	<?php include SP . 'app/views/shared/footer.php';?>
	<script type="text/javascript" src="/min/?g=js.default"></script>
</body>
</html>