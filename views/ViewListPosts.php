<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:23
 */
//spl_autoload_register(function($class) {
//	include $class . '.php';
//});
foreach ($posts as $post)
{
?>
<div class="panel panel-default postItem">
	<div class="panel-heading">
		<h2><a href="?page=post&action=show&id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h2>
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
	</div>

</div>
<?php
}
?>