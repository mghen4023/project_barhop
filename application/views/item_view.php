<?php

	foreach($items as $row)
	{
	
	?>

	<div class="item-display" data-role="collapsible-set" data-theme="" data-content-theme="">
		<div data-role="collapsible" data-collapsed="true">
			<h4>
				<?php echo $row['name'] . " ($" . $row['price'] . ")"; ?>
			</h4>
			<p>
				<?php echo $row['description']; ?>
			</p>		
		</div>
	</div>
	
	<?php }
	
?>