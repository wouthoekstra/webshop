<?php namespace webshop\views;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 14:47
 */

?>
<h1>Add blogpost!</h1>
<?php
if ($post->id == null)
{
	echo "<form id='validateForm' method='post' action='?page=post&action=store'>";
} else
{
	echo "<form id='validateForm' method='post' action='?page=post&action=update&id=" . $post->id . "'>";
}
?>
	<div class="form-group">
		<label for="title" class="form-group-addon" id="basic-addon1">Title</label>
		<input name="title" id="title" type="text" value="<?php echo $post->title; ?>" class="form-control" placeholder="Blogpost title" aria-describedby="basic-addon1">
		<span id="inputError2Status" class="sr-only">(error)</span>
	</div>
	<div class="form-group">
		<label for="content" class="form-group-addon" id="basic-addon2">Post</label>
		<textarea name="content" id="content" rows="10" class="form-control" placeholder="Blog content"><?php echo $post->content; ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Post it!</button>
	<span id="content" class="sr-only">(success)</span>
</form>