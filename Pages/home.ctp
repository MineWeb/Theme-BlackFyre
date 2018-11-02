<div class="section clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><h2>Nouvelles <?= $website_name ?></h2></center>
				<div class="separator"></div>

				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php if(!empty($search_news)) { ?>
							<ul class="list-unstyled">
								<?php foreach ($search_news as $k => $v) { ?>
								<li class="wow zoomIn">
									<div class="news-all" style="width:100%;">
										<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" style="position: relative; bottom: 20px;">
											<h2><?= cut($v['News']['title'], 70) ?></h2>
										</a>
										<span class="date">Le <?= $Lang->date($v['News']['created']); ?></span>
										<?php if(isset($theme_config['news_caractere']) && $theme_config['news_caractere']) { ?>
										<div class="texte">
											<?= $this->Text->truncate($v['News']['content'], $theme_config['news_caractere'],array('ellipsis' => '...', 'html' => true)) ?>
										</div>
										<?php } else { ?>
										<div class="texte">
											<?= $this->Text->truncate($v['News']['content'], 900,array('ellipsis' => '...', 'html' => true)) ?>
										</div>
										<?php } ?>
										<?php if(!isset($theme_config['news_commentaires']) || $theme_config['news_commentaires'] == "true") { ?>
										<div class="commentaires" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= count($v['Comment']) ?> personne(s) a/ont commenté(s) cet article">
											<?= count($v['Comment']) ?> <i class="fa fa-comments" aria-hidden="true"></i>
										</div>
										<?php } ?>
										<?php if(!isset($theme_config['news_likes']) || $theme_config['news_likes'] == "true") { ?>
										<div class="likes" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= $this->Text->truncate($v['News']['count_likes']) ?> personne(s) aime(nt) cet article">
											<?= $this->Text->truncate($v['News']['count_likes']) ?> <i class="fa fa-thumbs-up"></i>
										</div>
										<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="btn-more pull-right"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
										<?php } else { ?>
										<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="btn-more pull-right" style="margin-top:-30px;"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
										<?php } ?>
									</div>
								</li>
								<?php } ?>
							</ul>
							<ol id="pagination"></ol>
							<?php } else { echo '<center><h3>'.$Lang->get('NEWS__NONE_PUBLISHED').'</h3></center>'; } ?>
						</div>
					</div>
				</div>
			</div> 		
		</div>


			<div class="separator"></div>
			</div>
		</div>
	</div>
</div>