<?php
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 21-5-2015
 * Time: 14:52
 */
include "config.php";
?>
<nav class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php
		if ($_SESSION['logged'])
		{
			echo "<a class='navbar-brand' href='?page=index'>" . $_SESSION['username'] . "'s Blog</a>";
		} else
		{
			echo "<a class='navbar-brand' href='?page=post'>Amazing Blog</a>";
		}
		?>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="?page=blogger">Show all bloggers</a></li>
			<?php if ($_SESSION['logged'])
			{
			?>

            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    Create <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
			        <li role="presentation" class="class="btn btn-default"><a href="?page=post&action=create">Post</a></li>
			        <li role="presentation" class="class="btn btn-default"><a href="?page=product&action=create">Product</a></li>
                </ul>
            </li>
			<li><a href='?page=post&action=manage&bloggerid=<?php echo $_SESSION['bloggerid'];?>'>Manage Blog</a></li>
			</ul>
			<ul class="navbar-form navbar-right">
				<a href="?page=login&action=delete"><button class="btn btn-primary">Log uit</button></a>
			</ul>
			<?php
			} else
			{
				echo "</ul>";
				?>
				<?php include "ViewWriteLogin.php"; ?>
			<?php
			}
			?>


	</div>

</nav>