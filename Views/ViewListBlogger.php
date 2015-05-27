<h1>Alle bloggers</h1>
<?php
foreach ($bloggers as $blogger)
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><a href="?page=post&bloggerid=<?php echo $blogger->id; ?>"><?php echo $blogger->username; ?></a></h2>
		</div>
	</div>
<?php
}
?>