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
		<h2><?php echo $product->name; ?></h2>
	</div>
	<div class="panel-body">
        <a href="?page=order&action=update&id=<?php echo $product->id;?>"><span class="glyphicon glyphicon-shopping-cart"></span>Order now</a>
		<p><?php echo $product->description;?></p>
		<p><img src='resources/img/<?php echo $product->imageurl;?>' alt="<?php echo $product->name; ?>"/></p>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $product->price;?>
		</div>
	</div>

</div>
