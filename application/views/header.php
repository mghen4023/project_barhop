<?php
// Mike Ghen
// 7/3/2012
// This is a header for Project Barhop
$this->load->helper('url');
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>Project Barhop</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
    <script src="/project_barhop/application/views/js/search_box.js"></script>
</head> 

<body> 

        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-theme="a" data-role="header" data-position="inline">
                <h1>
                    Project Barhop
                </h1>
                <div data-role="navbar" data-iconpos="bottom">
                    <ul>
                        <li>
                            <a href="<?php echo site_url("drinks"); ?>" data-theme="b" data-icon="check">
                                Drinks
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("foods"); ?>" data-theme="b" data-icon="check">
                                Food
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("friends"); ?>" data-theme="b" data-icon="check">
                                Friends
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
			
		<br />	
		<input type="search" name="search-mini" id="search-mini" value="" data-mini="true" />
		<br />
           
        
        