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

	function encrypt_custom($sData)
	{
	    $id=(double)$sData*45646.24;
	    return base64_encode($id);
    }

    function decrypt_custom($sData)
    {
	    $url_id=base64_decode($sData);
	    $id=(double)$url_id/45646.24;
	    return $id;
    }

?>