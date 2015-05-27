<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 15:16
 */
//spl_autoload_register(function($class) {
//	include $class . '.php';
//});
?>

<h3>Write your own comment:</h3>
<div class="container">
	<div class="row">
		<form id="validateForm" method="post" action="?page=comment&action=store&id=<?php echo $id; ?>">
			<div class="form-group col-md-3">
				<label for="name" class="form-group-addon" id="basic-addon1">Your name</label>
				<input name="name" id="name" type="text" class="form-control" placeholder="Your name" aria-describedby="basic-addon1">
			</div>
			<div class="form-group col-md-12">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="content" class="form-group-addon" id="basic-addon2">Post</label>
						<textarea name="content" id="content" rows="3" class="form-control" placeholder="Your comment"
							  aria-describedby="basic-addon2"></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<button type="submit" class="btn btn-primary">Post it!</button>
			</div>
		</form>
	</div>
</div>