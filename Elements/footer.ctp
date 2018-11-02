<footer id="footer">
	<div id="footer-top">
		<div class="container">
			<div class="row">
				<div id="footer-top-first" class="col-md-5 col-sm-5">
					<h3><b>Informations</b></h3>
					<p><?= $theme_config['description'] ?></p>
				</div>
				<div id="footer-top-seconds" class="col-md-3 col-sm-3" style="color: #fff;">
					<h3><b>Statistiques</b></h3>
					<ul>
						<li><i class="fa fa-angle-double-right"></i> Inscrits aujourd'hui : <b><?= $users_count_today ?></b></li>
						<li><i class="fa fa-angle-double-right"></i> Visites du jour : <b><?= $visits_count_today ?></b></li>
						<li><i class="fa fa-angle-double-right"></i> Achats en boutique : <b><?php if($EyPlugin->isInstalled('eywek.shop')) { ?><?= ClassRegistry::init('Shop.ItemsBuyHistories')->find('count') ?><?php } ?></b></li>
						<li><i class="fa fa-angle-double-right"></i> Dernier inscrit : <b><?= $users_last['pseudo'] ?></b></li>
					</ul>
				</div>
				<div id="footer-top-trois" class="col-md-3 col-sm-3">
					<h4><b>Meilleur Voteurs</b></h4>
					<ul class="networks">
						<li>
							<div id="top-voteur">
								<?php if($EyPlugin->isInstalled('eywek.vote')) { ?>
								<?php
									$users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
									'fields' => ['username', 'COUNT(id) AS count'],
									'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
									'order' => 'count DESC',
									'group' => 'username',
									'limit' => 3
									]);
								?>
								<?php } else { ?>
									<div class="alert alert-danger"><b>Erreur :</b> Le plugin vote n'est pas installé.</div>
								<?php } ?>
									<?php $i_cl = 0;foreach($users_vote as $userv): $i_cl++; ?>
									<div id="player-info">
										<div id="title-votes">
											<img src='<?= $this->Html->url(['controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $userv['Vote']['username'], 32]); ?>' class='img-rounded' alt=''>
										</div>
										
										<strong class="player-name" style="text-transform: uppercase; color: #fff;"><?= $userv['Vote']['username']; ?></strong>
										<div id="votes" style="color: #fff;"><?= $userv[0]['count']; ?> vote<?php if($userv[0]['count'] == 1){ ?> <?php }else{ ?>s<?php }?></div>
									</div>
								<?php endforeach; ?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="pull-left">
					<ul>
						<li><a href="#" target="_blank"><b><?= $website_name ?></b></a> &copy; <?php echo date("Y");?> Tous droits réservés - <?= $theme_config['copyright_text']; ?></li>
					</ul>
				</div>
				<div class="pull-right">
					Thème <a href="http://mineweb.org">BlackFyre</a> par <b>Kuro</b> | Propulsé par <a href="http://mineweb.org">MineWeb</a>
				</div>
				 </div>
			</div>
		</div>
	</div>
</footer>