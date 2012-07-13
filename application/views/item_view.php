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

<center>
	<a id="hide" href="">Hide Results</a>
	<a id="show" href="">Show Results</a>
</center>
                                                               
<script type="text/javascript" src="jquery-1.7.2.js"></script>          
<script type="text/javascript">                                         

	$(document).ready(function() {
 
		$("#hide").click(function() {
			$(".item-display").fadeOut(200, function() {
			});
		});
		
		$("#show").click(function() {
			$(".item-display").fadeIn(200, function() {
			});
		});
 
	});

</script>  