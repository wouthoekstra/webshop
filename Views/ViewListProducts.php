<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:23
 */
foreach ($products as $product)
{
?>
<div class="panel panel-default productItem">
	<div class="panel-heading">
		<h2><a href="?page=product&action=show&id=<?php echo $product->id; ?>"><?php echo $product->name; ?></a></h2>
	</div>
	<div class="panel-body">
		<p><?php echo $product->description;?></p>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $product->price;?>
		</div>
	</div>

</div>
<?php
}
?>