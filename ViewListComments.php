<h3>Comments:</h3>
<?php
foreach ($comments as $comment)
{
	?>
	<div class="panel panel-default commentItem">

		<div class="panel-body">
			<?php
			if ($owner)
			{?>
			<a href="?page=comment&action=delete&id=<?php echo $comment->id; ?>"><span class="text-danger glyphicon glyphicon-remove pull-right"></span> </a>
			<?php } ?>
			<i>By <?php echo $comment->visitorName; ?>. Written on <?php echo $comment->dateCreated; ?></i>
			<p><?php echo $comment->content; ?></p>

		</div>
	</div>
<?php
}