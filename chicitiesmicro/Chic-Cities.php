<?php

header ("Content-Type:text/xml");

/* 

	Script PHP utilizat pentru efectuarea transformarilor XSLT
	Functioneaza pentru PHP versiunea 5.x
	Realizat pe baza exemplelor de la [http://profs.info.uaic.ro/~busaco] 

*/   

// Initializam si rulam procesul XSLT
function xslt_transf($xml, $xsl) {

	try {
		// incarcam documentul XML
		$doc = new DomDocument;
		$doc->load($xml);

		// incarcam foaia XSLT
		$transf = new DomDocument;
		$transf->load($xsl);

		// folosim procesorul XSLT
		$proc = new xsltprocessor;
		$proc->importStyleSheet($transf); // atasam foaia de stiluri
		$resu = $proc->transformToXML($doc); // afisam rezultatul transformarii
		echo str_replace(' xmlns=""', '', $resu);
	}
	catch (Exception $e) {
	
		// a aparut o exceptie
		return FALSE;
	}
	
	// totul OK
	return TRUE;
}

$data = explode("/", $HTTP_SERVER_VARS['PATH_INFO']);
$page = "welcome";
foreach ($data as $value)
{
	if (strlen($value) > 0)
	{
		$page = $value;
		break;
	}
}

if (!is_file ('Chic-Cities.html') || !is_file ('Chic-Cities.xsl')) {

	// eroare
	echo ("Probleme tehnice / Nu a fost implementat inca");
} 

if (!xslt_transf('Chic-Cities.html', 'Chic-Cities.xsl')) { 

	// eroare
	echo ("Probleme tehnice / Nu a fost implementat inca");
}  	 

?>
