<div id="cs-blog-loading" class="cs_loading" style="display: block;">
	<div id="followingBallsG">
	<div id="followingBallsG_1" class="followingBallsG">
	</div>
	<div id="followingBallsG_2" class="followingBallsG">
	</div>
	<div id="followingBallsG_3" class="followingBallsG">
	</div>
	<div id="followingBallsG_4" class="followingBallsG">
	</div>
	</div>
</div>
<div id="cs-blog-metabox" class='cs_metabox' style="display: none;">
	<div id="cs-tab-blog" class='categorydiv'>
	<ul class='category-tabs'>
	   <li class='cs-tab'><a href="#tabs-general"><i class="dashicons dashicons-admin-settings"></i> <?php echo _e('GENERAL','organicfood');?></a></li>
           <li class='cs-tab'><a href="#tabs-header"><i class="dashicons dashicons-menu"></i> <?php echo _e('HEADER','organicfood');?></a></li>
        </ul>
 	<div class='cs-tabs-panel'>
 		<div id="tabs-general">
                        <?php
                        global $smof_data;$blog_layout = $smof_data['layout'];
 			$this->select('blog_layout',
							'Layout',
							array('boxed' => 'Boxed', 'full' => 'Full Width'),
							$blog_layout,
							''
			);
			?>
 		</div>
	 	<div id="tabs-header">
			<?php
                        $headers = array('global' => 'Global', 'v1' => 'Header 1', 'v2' => 'Header 2','v3' => 'Header 3');
                        if (class_exists('Woocommerce')) {
                            $headers['shop'] = 'Header Shop';
                        }
			$this->select('header',
					'Header',
					$headers,
					'',
					''
			);
                        ?>
			<?php
			$this->select('header_fixed_top',
					'Header Fixed',
					array('0' => 'No', '1' => 'Yes'),
					'',
					''
			);
                        ?>
			<?php
			$this->select('display_widget_top',
					'Display Widget Header Top',
					array('global' => 'Global','0' => 'No', '1' => 'Yes'),
					'',
					''
			);
                        ?>
			<p class="cs_info"><i class="dashicons dashicons-format-image"></i><?php echo _e('Background Setting:','organicfood');?></p>
			<?php
			$this->text('header_bg_color',
					'Background Color (HEX)',
					''
			);
			$this->text('header_bg_opacity',
					'Background Opacity (1 -> 100)',
					''
			);
			?>
			<p class="cs_info"><i class="dashicons dashicons-megaphone"></i><?php echo _e('Manage Locations','organicfood'); ?></p>
			<?php
			$menus = array();
			$menus[''] = 'Defualt';
			$obj_menus = wp_get_nav_menus();
			foreach ($obj_menus as $obj_menu){
				$menus[$obj_menu->term_id] = $obj_menu->name;
			}
			$this->select('main_menu',
					'Main Menu',
					$menus,
					'',
					''
			);
			?>
		</div>
            </div>
	</div>
</div>