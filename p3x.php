<?php
/*
Plugin Name: p3x actualité web
Plugin URI: https://www.p3x.fr/atelier
Description: Affichez les dernières actualités du Web sur votre site Internet et les scripts, astuces et tutos de référencement et programmation.
Author: p3x
Version: 1.0
Author URI: https://www.p3x.fr
*/

add_shortcode('p3x_actualite', 'p3x_actualite');

function p3x_actualite()
{
	$html = '<h2>Scripts, astuces et tutos du Web</h2>
			<ul>';
	
	$xmlfile = 'https://www.p3x.fr/atelier.xml';
	$xml = simplexml_load_file($xmlfile);
	
	foreach($xml->channel->item as $item)
	{
		$html .= '<li><a href="'.$item->link.'" target="_blank">'.$item->title.'</a></li>';
	}
	
	$html .= '</ul>';
	
	return $html;
}