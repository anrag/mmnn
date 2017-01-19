<?php
$wooshops = array(
		'shopcarousel'
);


$elements = array(
                'block-number',
                'block-text',
                'block',
                'blog',
                'box-feature-figure',
                'breadcrumb',
                'bubble',
                'dropcap',
                'featured-box',
                'google-chart',
                'grid',
                'icon',
                'page-title',
                'panel-box',
                'piegraph',
                'plan',
                'portfolio',
                'postcarousel',
                'social',
                'stats',
                'title',
                'zoomimg',
                'newsletter',
                'video'
    
);
foreach ($elements as $element) {
	include($element .'/'. $element.'.php');
}
if(class_exists('Woocommerce')){
	foreach ($wooshops as $wooshop) {
		include($wooshop .'/'. $wooshop.'.php'); 
	}
}