<?php
function google_chart_func($atts, $content = null) {
    $title = $data = $el_class = $chart_id = $data_string = '';
    extract(shortcode_atts(array(
        'style' => '',
        'title' => '',
        'data' => '',
        'animation' => '',
        'el_class' => ''
    ), $atts));
    $items = array();
    $data_string = array();
    $items = explode('|',$data);
    if($style == 'pie') { $data_string[] = array('Continent',$title);}
    if($style == 'geo') { $data_string[] = array('Country',$title);}
    foreach($items as $item){
            $info = explode(':',$item);
            if(isset($info[1])){
                $data_string[] = array($info[0],(int)$info[1]);
            }
    }
    $class = array();
    $class[] = 'google-pie-chart';
    $class[] = getCSSAnimation($animation);
    $class[] = $el_class;
    $chart_id = 'google_pie_chart' . time() . '_' . uniqid(true);
    $data_string = json_encode($data_string);
    ob_start();
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
        <div class="google-chart" data-style="<?php echo $style;?>" data-data-string='<?php echo $data_string;?>' data-title="<?php echo $title;?>" id="<?php print $chart_id;?>" style="height: 500px;"></div>
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('google-chart', 'google_chart_func'); }
