<div class="banner">
	<div class="slideshow white-bg">
		<div class="slider-banner-container">
			<div class="slider-banner-2 bullets-with-bg">
				<ul>
					<li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on" data-title="Slide 2">
						<div id="particles-js" style="background-image: url('<?php if(empty($theme_config['header'])) { echo "/theme/BlackFyre/images/header.png"; } else { echo $theme_config['header']; } ?>')"></div>

						<div class="tp-caption dark-translucent-bg"
							data-x="center"
							data-y="bottom"
							data-speed="800"
							data-start="0"
							style="background-color:rgba(0,0,0,0.5);">
						</div>
						<div class="tp-caption sfr large_text text-center tp-resizeme"
							data-x="center"
							data-y="430" 
							data-speed="600"
							data-start="0"><?= $theme_config['header_text_1']; ?>
						</div>
						<div class="tp-caption sfl tp-resizeme"
							data-x="center"
							data-y="30" 
							data-speed="600"
							data-start="0">
							<div class="navbar-brand no-txt" >
								<?php
									if(isset($theme_config['logo']) && $theme_config['logo']) {
									echo '<img src="'.$theme_config['logo'].'" style="min-width:'.$theme_config['logo_width'].'px; max-width:'.$theme_config['logo_width'].'px; min-height:'.$theme_config['logo_height'].'px; max-height:'.$theme_config['logo_height'].'px; display: block; margin-right: auto; margin-left: auto;">';
									} else {
									echo '<img src="/theme/BlackFyre/images/Logo.png" style="min-width:'.$theme_config['logo_width'].'px; max-width:'.$theme_config['logo_width'].'px; min-height:'.$theme_config['logo_height'].'px; max-height:'.$theme_config['logo_height'].'px; display: block; margin-right: auto; margin-left: auto;">';
									}
								?>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>