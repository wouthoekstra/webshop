<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:23
 */
?>
<?php
foreach ($products as $product) {
    ?>
    <div class="col-md-6">
        <div class="panel panel-default productItem">
            <div class="panel-heading">
                <a href="?page=order&action=update&id=<?php echo $product->id; ?>">
                    <span class="glyphicon glyphicon-shopping-cart pull-right"></span>
                    </a>
                <span class="price">Price: &euro; <?php echo $product->price; ?></span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src='resources/img/<?php echo $product->imageurl; ?>'/>
                    </div>
                    <div class="col-md-7">
                        <h2><a href="?page=product&action=show&id=<?php echo $product->id; ?>"><?php echo $product->name; ?></a></h2>
                        <p><?php echo $product->description; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>