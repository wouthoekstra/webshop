<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:16
 */
?>
<div class="panel panel-default orderItem">
	<div class="panel-heading">
		<h2><?php echo $order->title; ?></h2>
	</div>
	<div class="panel-body">
		<p><?php echo $order->content;?></p>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $order->dateCreated;?>
		</div>
	</div>

</div>
