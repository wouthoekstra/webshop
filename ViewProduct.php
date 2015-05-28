<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:16
 */
?>

<h1><?php echo $product->name; ?></h1>
<div class="panel panel-default product">
    <div class="row">
        <div class="panel-body">
        <div class="col-md-3">
            <img src='resources/img/<?php echo $product->imageurl;?>' alt="<?php echo $product->name; ?>"/>
        </div>
        <div class="col-md-7 description">
		    <p><?php echo $product->description;?></p>
        </div>
            </div>
    </div>
</div>

        <a href="?page=order&action=update&id=<?php echo $product->id;?>"><span class="glyphicon glyphicon-shopping-cart"></span>Order now</a>
			Created on: <?php echo $product->price;?>
