<?php namespace webshop\views;
?>
<div class="panel panel-default orderItem">
	<div class="panel-heading">
		<h2>Order step 1/2 - Order overview</h2>
	</div>
	<div class="panel-body">
		<p>Your order with order number <?php echo $order->id; ?> is placed. Further details:</p>
		<table>
            <tr>
                <td>Product number</td>
                <td><?php echo $order->product_id;?></td>
            </tr>
            <tr>
                <td>Customer reference number</td>
                <td><?php echo $order->customer_id;?></td>
            </tr>
            <tr>
                <td>Order date</td>
                <td><?php echo $order->dateCreated;?></td>
            </tr>
        </table>
        <a href="?page=customer&action=create"><button class="btn btn-primary">Next step</button></a>
	</div>
	<div class="panel-footer">
		<div>
			Created on: <?php echo $order->dateCreated;?>
		</div>
	</div>

</div>
