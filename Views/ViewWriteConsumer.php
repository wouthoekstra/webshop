<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 14:47
 */

?>
<h1>Your information</h1>
<form id='validateForm' method='post' action='?page=post&action=store'>
	<div class="form-group">
		<label for="name" class="form-group-addon" id="basic-addon1">name</label>
		<input name="name" id="name" type="text" value="" class="form-control" placeholder="Blogpost title" aria-describedby="basic-addon1">
		<span id="inputError2Status" class="sr-only">(error)</span>
	</div>
	<div class="form-group">
		<label for="content" class="form-group-addon" id="basic-addon2">Post</label>
		<textarea name="content" id="content" rows="10" class="form-control" placeholder="Blog content"><?php echo $post->content; ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Post it!</button>
	<span id="content" class="sr-only">(success)</span>
</form>