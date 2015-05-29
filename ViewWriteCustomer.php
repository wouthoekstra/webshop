<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 14:47
 */
?>
<h1>Order step 2/2 - Your information</h1>
<form id='validateForm' method='post' action='?page=customer&action=store'>
    <div class="form-group">
        <label for="name" class="form-group-addon" id="basic-addon1">name</label>
        <input name="name" id="name" type="text" value="" class="form-control" placeholder="Your name" aria-describedby="basic-addon1">
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <div class="form-group">
        <label for="street" class="form-group-addon" id="basic-addon1">Street</label>
        <input name="street" id="street" type="text" value="" class="form-control" placeholder="Street" aria-describedby="basic-addon1">
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <div class="form-group">
        <label for="house_number" class="form-group-addon" id="basic-addon1">House number</label>
        <input name="house_number" id="house_number" type="text" value="" class="form-control" placeholder="Street" aria-describedby="basic-addon1">
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <div class="form-group">
        <label for="zip" class="form-group-addon" id="basic-addon1">Zip code</label>
        <input name="zip" id="zip" type="text" value="" class="form-control" placeholder="Zip code" aria-describedby="basic-addon1">
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <div class="form-group">
        <label for="city" class="form-group-addon" id="basic-addon1">City</label>
        <input name="city" id="city" type="text" value="" class="form-control" placeholder="City" aria-describedby="basic-addon1">
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <button type="submit" class="btn btn-primary">Confirm order!</button>
    <span id="content" class="sr-only">(success)</span>
</form>