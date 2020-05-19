<?php 

	function lang($english,$indo)
	{
		if (isset($_GET['lang']) && $_GET['lang'] =='en')
		{
			return $english ;
		}
		else
		{
			return $indo  ;
		}
	}

	function param()
	{
		if (isset($_GET['lang']))
		{
			return "?lang=".$_GET['lang'] ;
		}
	}

?>