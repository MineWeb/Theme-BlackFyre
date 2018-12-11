<div class="header-top dark">
	<div class="container">
		<div class="row">
			<div class="col-xs-2 col-sm-6">
				<div class="header-top-first clearfix">
					<ul class="social-links clearfix hidden-xs">
						<?php if (!empty($findSocialButtons)): foreach ($findSocialButtons as $key => $value): ?>
							<?php endforeach; endif; ?>
							<?php if(!empty($facebook_link)): ?>
								<li><a href="<?= $facebook_link ?>"><i class="fa fa-facebook"></i></a></li>
							<?php endif; if(!empty($twitter_link)): ?>
								<li><a href="<?= $twitter_link ?>"><i class="fa fa-twitter"></i></a></li>
							<?php endif; if(!empty($youtube_link)): ?>
								<li><a href="<?= $youtube_link ?>"><i class="fa fa-youtube"></i></a></li>
							<?php endif; if(!empty($skype_link)): ?>
								<li><a href="<?= $skype_link ?>"><i class="fa fa-skype"></i></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			
			<div class="col-xs-10 col-sm-6">
				<div id="header-top-second"  class="clearfix">
					<div class="header-top-dropdown">
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" onclick="window.location.href='//<?= $theme_config['ip_vocal']; ?>'"data-toggle="dropdown" style="text-transform: uppercase;"><i class="fa fa-microphone"></i> <?= $theme_config['ip_vocal']; ?></button>
						</div>
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-clipboard-text="<?= $theme_config['ip_server']; ?>" data-toggle="dropdown" style="text-transform: uppercase;"><i class="fa fa-gamepad"></i> <?= $theme_config['ip_server']; ?></button>
						</div>
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="text-transform: uppercase;"><i class="fa fa-server"></i> <?= $server_infos['GET_PLAYER_COUNT'] ?> CONNECTÉS</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var clipboard = new ClipboardJS('.btn');

	clipboard.on('success', function(e) {
		console.info('Action:', e.action);
		console.info('Text:', e.text);
		console.info('Trigger:', e.trigger);

		e.clearSelection();
	});

	clipboard.on('error', function(e) {
		console.error('Action:', e.action);
		console.error('Trigger:', e.trigger);
	});
</script>