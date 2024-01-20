<?php 
	
	$config = mysqli_connect("localhost", "root", "", "a_blog_db"); 
	if (!$config) 
	{
		echo "Not Connected";
	}
?>