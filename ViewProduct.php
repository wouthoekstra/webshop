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
		<h2><?php echo $product->title; ?></h2>
	</div>
	<div class="panel-body">
		<p><?php echo $product->content;?></p>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $product->dateCreated;?>
		</div>
		<div>
			<?php
			if ($product->dateEdited != null)
			{
				echo "Edited on: " . $product->dateEdited;
			}
			?>

		</div>

			<div><?php echo $commentsNum; ?> comments</div>

	</div>

</div>
