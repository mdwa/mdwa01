<div id="slideshow" class="fullwidthbanner-container main-slider">
  <div class="fullwidthbanner">
    <ul>
    <?php $rs_effect='fade'; ?>
    <?php foreach ($rows as $id => $row): ?>
        
      <?php 
        $view                        = views_get_current_view();
        $nid                         = $view->result[$id]->nid; 
        $node                        = node_load($nid);
        $nodeurl                     = url('node/'. $node->nid);
        $title = $node->title;
        $field_slideshow_entry_image = field_get_items('node', $node, 'field_slideshow_entry_image');
        $field_slideshow_entry_path  = field_get_items('node', $node, 'field_slideshow_entry_path');
        $field_slideshow_teaser      = field_get_items('node', $node, 'field_slideshow_teaser');

        $image  = image_style_url('slideshow', $field_slideshow_entry_image[0]['uri']); 
        $path   = ($field_slideshow_entry_path) ? $field_slideshow_entry_path[0]['safe_value'] : false;
        $teaser = ($field_slideshow_teaser) ? $field_slideshow_teaser[0]['safe_value'] : false;
      ?>
            
      <li <?php if ($path): ?>data-link="<?php print url($path); ?>"<?php endif; ?> data-transition="<?php print $rs_effect ?>" data-slotamount="1" data-masterspeed="400" data-delay="25000">

        <img src="<?php print $image; ?>"/>


        <div class="tp-caption large_bold_white_25 customin customout tp-resizeme"
							data-x="center" data-hoffset="0"
							data-y="170"
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
							data-speed="600"
							data-start="1400"
							data-easing="Power4.easeOut"
							data-endspeed="600"
							data-endeasing="Power0.easeIn"
              style="z-index: 3"><?php print $title; ?></div>

        <div class="tp-caption medium_bg_darkblue skewfromrightshort customout"
			       data-x="right" data-hoffset="0"
				  	 data-y="bottom" daata-voffset="-200"
  					 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
	  				 data-speed="500"
		  			 data-start="1900"
			  		 data-easing="Back.easeOut"
				  	 data-endspeed="500"
					   data-endeasing="Power4.easeIn"
		  			 data-captionhidden="on"
			  		 style="z-index: 14">A Professional Solution</div>
      </li>

    <?php endforeach; ?>
    </ul>

    <div class="tp-bannertimer tp-bottom"></div>

  </div>
</div>




<?php
$rs_effect_time = 25000;//(int) theme_get_setting('rs_slideshow_full_effect_time')*1000;

drupal_add_js('

    var tpj=jQuery;
    tpj.noConflict();
    
    tpj(document).ready(function($) { 

    if (tpj.fn.cssOriginal!=undefined)
        tpj.fn.css = tpj.fn.cssOriginal;

    
    var api = tpj(".fullwidthbanner").revolution({
        delay:"'.$rs_effect_time.'",
        startheight:500,
        startwidth: 1140,
        onHoverStop: "on",
        shadow: 1
    });
    
    api.bind("revolution.slide.onloaded",function (e,data) {
         jQuery(".tparrows.default").css("display", "block");
         jQuery(".tp-bullets").css("display", "block");
         jQuery(".tp-bannertimer").css("display", "block");
    });

});',
array('type' => 'inline', 'scope' => 'header'));
	
?>
