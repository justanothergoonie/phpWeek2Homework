<?php
include 'gallery.php';

$selected_tag = $_REQUEST['tag'];

// long way
// $tags = array_unique(
// 	array_map(function ($item) {
// 		global $selected_tag;
// 		if ($selected_tag == $item['tag']) {
// 			print $item['tag'];
// 		} else {
// 			print '';
// 		}
// 		return $item['tag'];
// 	}, $gallery)
// );

//cool kid way
// $tags = array_unique(array_column($gallery, 'tag'));
// results in array like this:
// ['architecture', 'landscape']

// the below loop will create an array that looks like this:
// ['architecture' => 1, 'landscape' => 4]
// $tags = [];
// foreach ($gallery as $item) {
// 	$tag = $item['tag'];
// 	if (!in_array($tag, array_keys($tags))) {
// 		$tags[$tag] = 0;
// 	}
// 	$tags[$tag] += 1;
// }

// print_r($tags);

// $selected_tag = $_REQUEST['tag'];
// if (!empty($selected_tag)) {
// 	$filtered = [];
// 	foreach ($gallery as $item) {
// 		if ($item['tag'] == $selected_tag) {
// 			//different ways to add to an array in PHP
// 			array_push($filtered, $item);

// 			// or the funky way
// 			// $flittered[] = $item
// 		}
// 	}
// 	$gallery = $filtered;
// }

function reduceIt($carry, $item)
{
	$tag = $item['tag'];
	if (!array_key_exists($tag, $carry)) {
		$carry[$tag] = 0;
	}
	$carry[$tag] += 1;
	return $carry;
}

$tags = array_reduce($gallery, 'reduceIt', []);
ksort($tags);

if (!empty($selected_tag)) {
	$gallery = array_filter($gallery, function ($item) {
		global $selected_tag;
		if ($item['tag'] == $selected_tag) {
			return true;
		}
	});
	// print_r($selected_tag);
	print_r($item);
}
$itemsShown = sizeof($gallery);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<title>PHP Week 3 Homework</title>
		<meta name="description" content="add a description" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="dist/css/main.css" />
	</head>

	<body>
	<p>Showing <span><?php echo $itemsShown; ?></span> items.</p>
	<nav>
	
	</nav>

	<ul class="tags">
		<li> <a href="index.php">All</a> </li>
		<?php foreach ($tags as $tag => $tag_count): ?>
		<li> <a href="?tag=<?php echo $tag; ?>"> <?php echo $tag; ?>  </a>(<?php echo $tag_count; ?>) </li>
		<?php endforeach; ?>

		<!-- <li> <a href="index.php">All</a> </li>
		<?php foreach ($tags as $tag): ?>
		<li> <a href="?tag=<?php echo $tag; ?>"> <?php echo $tag; ?>  </a> </li>
		<?php endforeach; ?> -->
	</ul>


	<ul class="gallery">
	<?php foreach ($gallery as $i => $data): ?>
		<li>
			<a href="<?php echo $data['link']; ?>" target="_blank"> 
				<img src="<?php echo $data['photo_url']; ?>" alt=""> 
			</a>
			<span><?php echo $data['title']; ?></span>
		</li>
	<?php endforeach; ?>
	</ul>
		
		<script src="dist/js/main.js"></script>
	</body>
</html>
