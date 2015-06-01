<h1>Alle blogitems</h1>
<?php

foreach ($posts as $post)
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><a href="?page=post&action=show&id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h2>
			<a href="?page=post&action=edit&id=<?php echo $post->id; ?>"><button class="btn btn-danger">Edit</button> </a>
		</div>

	</div>
<?php
}
?>