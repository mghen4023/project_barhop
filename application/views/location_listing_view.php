    <div id="location-listing-view" data-role="content" style="padding: 10px">
		<h2 class="heading">
			Top 10 Places
        </h2>

		<?php foreach($locations as $location) { ?>
        <div data-role="collapsible-set" data-theme="" data-content-theme="">
            <div data-role="collapsible" data-collapsed="true">
                
			
				<h3>
                    <?php echo $location["name"]; ?>
                </h3>
				
				<p class="location-address">
					Address: <?php echo $location["address"]; ?>
				</p>
				
				<div class="clear" style="clear: both; display: none;">&nbsp;</div>
				<!-- jquery rating plugin here http://www.wbotelhos.com/raty/ -->
				
				<p class="locaiton-rating">
					Rating: <?php echo $location["rating"]; ?>
				</p>
				
				<img class="location-map" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $location["address"]; ?>&amp;zoom=14&amp;size=288x200&amp;markers=<?php echo $details->address; ?>&amp;sensor=false" 
				height="200" width="288">
            </div>
		</div>
		<?php } ?>
		
    </div>