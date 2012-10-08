<?php

function connect_to_db() {
	$db_hostname = 'localhost';
	$db_database = 'nail';
	$db_username = 'general';
	$db_password = 'generalpass';
	
	$con = mysql_connect($db_hostname, $db_username, $db_password)
	or die("Could not connect. Error file:mainconfig.php".mysql_error());
	
	mysql_select_db($db_database)
	or die("Could not select database: ".mysql_error());
}

connect_to_db();

function build_category_list($category) {

	$query = "SELECT * FROM coisas WHERE category = '".$category."';";
	
	$results = mysql_query($query);
	
	$ul = '<ul id="category-list" class="category-results-list" >';
	
	while ($row = mysql_fetch_assoc($results) ) {
		
		$ul .= '<li id="'.$row['id'].'">';
			
			$ul .= '<div class="img-container">';
				$ul .= '<img src="'.$row['image'].'" />';
			$ul .= '</div>';
		
		$ul .= '</li>';
	}
	
	$ul .= '</ul>';
	
	return $ul;

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
  
  <html> 
<head>

	<title>
		Nail On Wall
	</title>

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="css/index-css.css?<?php echo rand(); ?>" />

	<script type="text/javascript" id="jQuery-script" src="js/jquery-1.7.2.js?<?php echo rand(); ?>" ></script>
	<script type="text/javascript" id="JSON-parser-script" src="js/json2.js?<?php echo rand(); ?>" ></script>
	
	<script type="text/javascript" id="jQuery-fillwidth" src="js/jquery.fillwidth.js?<?php echo rand(); ?>" ></script>
	
	<script type="text/javascript" id="nail-script" src="js/nail-js.js?<?php echo rand(); ?>" ></script>
	
	<script>
	</script>
	
  <style>

  </style>	
</head>

<body>
	<div id="top-fixed">

		<ul id="left-main-nav" class="main-nav">
			<li id="logo">
				<img src="images/logo/001.jpg" />
			</li>
			<li id="search">
				<input type="text" id="search-field" value="Search Nail..."/>
			</li>
		</ul>

		<ul id="right-main-nav" class="main-nav">
			<li id="browse">
				Browse
			</li>
			<li id="filter">
				Filter
			</li>
			<li id="collection">
				Collection
			</li>
			<li id="user">
				Simon Fan
			</li>
		</ul>
		
		<!-- helpers, sub menus, drop downs of the main nav -->
		
		<!-- -->
		
	</div>
	
	<div id="page-wrapper">
	
		<div id="page-filter">
		
			<div id="filter-nav">
				<div id="categories" class="filter-div">
					<div class="menu-header">CATEGORIAS</div>
					<ul>
						<li id="cat:architecture" class="category-nav-item filter-item"><a href="#category:architecture">Architecture</a></li>
						<li id="cat:chair" class="category-nav-item filter-item"><a href="#category:chairs" >Chairs</a></li>
						<li id="cat:art" class="category-nav-item filter-item"><a href="#category:art" >Art</a></li>
					</ul>
				</div>
				<div id="color" class="filter-div">
					<div class="menu-header">CORES</div>
					<ul>
						<li id="clr:dark" class="color-nav-item filter-item"><a href="#color:dark">Dark</a></li>
						<li id="clr:light" class="color-nav-item filter-item"><a href="#color:light">Light</a></li>
						<li id="clr:blue" class="color-nav-item filter-item"><a href="#color:blue">Blue</a></li>
						<li id="clr:red" class="color-nav-item filter-item"><a href="#color:red">Red</a></li>
					</ul>
				</div>
				<div id="sub-category" class="filter-div">
				
				</div>
			</div>
			
			<div id="filter-results">
				<?php
				
					echo build_category_list('art');
				
				?>
				
				<div id="#wrapper" >
				
				</div>
			</div>
			
		</div>


	


	
	</div>
</body>

</html>
