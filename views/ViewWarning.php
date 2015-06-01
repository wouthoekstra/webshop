<?php namespace webshop\views;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 22-5-2015
 * Time: 15:40
 */
if (isset($_GET['warning']))
{
	$warning = $_GET['warning'];
} else
{
	$warning = "";
}
switch ($warning)
{
	case "incorrectlogin":
		$message = "Username and password do not match!";
		break;
	default:
		$message = "";
}
if ($message !== "")
{
?>

<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Error:</span>
	<?php echo $message; ?>
</div>
<?php
}
?>