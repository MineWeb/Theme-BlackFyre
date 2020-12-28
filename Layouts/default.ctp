<!DOCTYPE html>
<html lang="fr">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<meta name="author" content="Kuro">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?= $seo_config['title'] ?></title>
    <link rel="icon" type="image/png" href="<?= $seo_config['favicon_url'] ?>"/>
    <meta name="title" content="<?= $seo_config['title'] ?>">
    <meta property="og:title" content="<?= $seo_config['title'] ?>">
    <meta name="description" content="<?= $seo_config['description'] ?>">
    <meta property="og:description" content="<?= $seo_config['description'] ?>">
    <meta property="og:image" content="<?= $seo_config['img_url'] ?>">
	
	<!-- Favicons
	================================================== -->

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=1">
	
	<!-- CSS
	================================================== -->
   <link href="//fonts.googleapis.com/css?family=Changa:300" rel="stylesheet">
   <?= $this->Html->css('bootstrap.css') ?>
   <?= $this->Html->css('settings.css') ?>
   <?= $this->Html->css('animate.css') ?>
   <?= $this->Html->css('style.css') ?>
   <?= $this->Html->css('header.css') ?>
   <?= $this->Html->css('footer.css') ?>
   <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
   
   <!-- JavaScript
   =================================================== -->
   <?= $this->Html->script('jquery-1.11.0.js') ?>
   <?= $this->Html->script('easy_paginate.js') ?>
   <?= $this->Html->script('clipboard.min.js') ?>
	
</head>
<body>
	<!-- JavaScript
	================================================== -->
	<div class="page-wrapper">
	<?= $this->element('modals') ?>
	<?= $this->element('topbar') ?>
	<?= $this->element('navbar') ?>
	<?= $this->element('header') ?>
	<?php
		$flash_messages = $this->Session->flash();
		if(!empty($flash_messages)) {
		  echo '<div class="container">'.$flash_messages.'</div>';
		} 
	?>
	<?= $this->fetch('content'); ?>
	
	<?= $this->element('footer') ?>
	</div>
	

	<?= $this->Html->script('bootstrap'); ?>
	<?= $this->Html->script('modernizr.js'); ?>
	<?= $this->Html->script('jquery.themepunch.tools.min.js'); ?>
	<?= $this->Html->script('jquery.themepunch.revolution.min.js'); ?>
	<?= $this->Html->script('isotope.pkgd.min.js'); ?>
	<?= $this->Html->script('owl.carousel.js'); ?>
	<?= $this->Html->script('jquery.magnific-popup.min.js'); ?>
	<?= $this->Html->script('jquery.appear.js'); ?>
	<?= $this->Html->script('jquery.magnific-popup.min.js'); ?>
	<?= $this->Html->script('jquery.appear.js'); ?>
	<?= $this->Html->script('jquery.parallax-1.1.3.js'); ?>
	<?= $this->Html->script('jquery.browser.js'); ?>
	<?= $this->Html->script('SmoothScroll.js'); ?>
	<?= $this->Html->script('template.js'); ?>
	<?= $this->Html->script('custom.js'); ?>
	<?= $this->Html->script('app.js') ?>
	<?= $this->Html->script('form.js') ?>
	<?= $this->Html->script('notification.js') ?>
	
<script>
		jQuery(document).ready(function() {
			jQuery('.tp-banner').revolution({
				delay:6000,
				startwidth:1140,
				startheight:480,
				hideThumbs:10,
				fullWidth:"on",
				forceFullWidth:"on",
				hideCaptionAtLimit:480,
				//navigationType: "none",
				soloArrowLeftHOffset:20,
				soloArrowRightHOffset:20,
				soloArrowLeftVOffset:20,
				soloArrowRightVOffset:20
			});
	   });
</script>
<script>
    <?php if($isConnected) { ?>
    var notification = new $.Notification({
        'url': {
            'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
            'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
            'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
            'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
            'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
        },
        'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
        }
    });
    <?php } ?>
    // Config FORM/APP.JS

    var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";
</script>
<?php if (isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', '<?= $google_analytics ?>', 'auto');
        ga('send', 'pageview');
    </script>
<?php } ?>
<?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
</body>
</html>
