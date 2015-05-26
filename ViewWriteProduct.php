<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 14:47
 */

?>
<h1>Add product!</h1>
<?php
if (!isset($product->id)) {
    echo "<form id='validateForm' method='post' action='?page=product&action=store'>";
} else {
    echo "<form id='validateForm' method='post' action='?page=product&action=update&id=" . $product->id . "'>";
}
?>
<div class="form-group">
    <label for="title" class="form-group-addon" id="basic-addon1">Product</label>
    <input name="name" id="name" type="text" value="<?php echo $product->name; ?>" class="form-control"
           placeholder="Product name" aria-describedby="basic-addon1">
    <span id="inputError2Status" class="sr-only">(error)</span>
</div>
<div class="form-group">
    <label for="content" class="form-group-addon" id="basic-addon2">Product description</label>
    <textarea name="content" id="description" rows="5" class="form-control"
              placeholder="Product description"><?php echo $product->description; ?></textarea>
</div>
    <div class="row">
        <div class="form-group col-md-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-eur"></span></span>
                <input name="price" id="price" type="text" value="<?php echo $product->price; ?>" class="form-control"
                       placeholder="Product price" aria-describedby="basic-addon1">
                <span id="inputError2Status" class="sr-only">(error)</span>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tint"></span></span>
                <input name="color" id="color" type="text" value="<?php echo $product->color; ?>" class="form-control"
                       placeholder="Product color" aria-describedby="basic-addon1">
                <span id="inputError2Status" class="sr-only">(error)</span>
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><span
                        class="glyphicon glyphicon-equalizer"></span></span>
                <input name="stock" id="stock" type="text" value="<?php echo $product->stock; ?>" class="form-control"
                       placeholder="Product stock" aria-describedby="basic-addon1">
                <span id="inputError2Status" class="sr-only">(error)</span>
            </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary">Place product</button>
<span id="content" class="sr-only">(success)</span>
</form>