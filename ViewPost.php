<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:16
 */
?>
<div class="panel panel-default postItem">
	<div class="panel-heading">
		<h2><?php echo $post->title; ?></h2>
	</div>
	<div class="panel-body">
		<p><?php echo $post->content;?></p>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $post->dateCreated;?>
		</div>
		<div>
			<?php
			if ($post->dateEdited != null)
			{
				echo "Edited on: " . $post->dateEdited;
			}
			?>

		</div>

			<div><?php echo $commentsNum; ?> comments</div>

	</div>

</div>
