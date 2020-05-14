<?php 

	function lang($english,$indo)
	{
		if (isset($_GET['lang']) && $_GET['lang'] =='id')
		{
			return $indo  ;
		}
		else
		{
			return $english ;
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