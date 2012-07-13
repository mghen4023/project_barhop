    <div data-role="content" style="padding: 10px">
		
	<center>
		<h2>
            <?php echo $details->name; ?>
        </h2>
			
		
		<p>
			<?php echo $details->address; ?>
		</p>
				
		<div class="clear" style="clear: both; display: none;">&nbsp;</div>
		<!-- jquery rating plugin here http://www.wbotelhos.com/raty/ -->
		<h2>
			<?php echo $details->rating; ?>
		</h2>
				
        <img src="https://maps.googleapis.com/maps/api/staticmap?center=Doylestown,%20PA&amp;zoom=14&amp;size=288x200&amp;markers=Doylestown,%20PA&amp;sensor=false" 
		height="200" width="288">
		
	</center>	

        <div data-role="collapsible-set" data-theme="" data-content-theme="">
            <div data-role="collapsible" data-collapsed="true">
                <h3>
                    Top Drinks
                </h3>
				<p>
					<ul>
					<?php foreach($drink as $drink_item): ?>
						<li><?php echo $drink_item['name'] . " ($" . $drink_item['price'] . ")"; ?></li>
					<?php endforeach; ?>
					</ul>
				<p>
            </div>
            <div data-role="collapsible" data-collapsed="true">
                <h3>
                    Top Foods
                </h3>
				<p>
					<ul>
					<?php foreach($food as $food_item): ?>
						<li><?php echo $food_item['name'] . " ($" . $food_item['price'] . ")"; ?></li>
					<?php endforeach; ?>
					</ul>
				<p>
            </div>
        </div>
		
    </div>