<!DOCTYPE html>
<?php
include 'gallery.php';
$itemsShown= sizeof($gallery)
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<title>Add a Title</title>
		<meta name="description" content="add a description" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="dist/css/main.css" />
	</head>

	<body>
	<p>Showing <span><?php echo $itemsShown ?></span> items.</p>
	<nav>
	
	</nav>

	<ul>
	<?php foreach($gallery as $i => $data): ?>
		<li>
			<a href="<?php echo $data["link"]?>" target="_blank"> 
				<img src="<?php echo $data["photo_url"]?>" alt=""> 
			</a>
			<span><?php echo $data["title"]?></span>
		</li>
	<?php endforeach;?>
	</ul>
		
		<script src="dist/js/main.js"></script>
	</body>
</html>
