<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));
if(isset($config['logo']) && $config['logo']) {
    $form_input['img'] = $config['logo'];
    $form_input['filename'] = 'theme_logo.png';
}
echo $this->Html->script('admin/tinymce/tinymce.min.js');
?>

<section class="content">
    <div class="row">
        <form method="post" enctype="multipart/form-data" data-ajax="false">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_accueil" data-toggle="tab">Accueil</a></li>
                        <li><a href="#tab_footer" data-toggle="tab">Footer</a></li>
                        <li><a href="#tab_other" data-toggle="tab">Autres options</a></li>
                    </ul>
                    <div class="tab-content" style="padding: 15px;">
                        <div class="tab-pane active" id="tab_accueil">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre de news sur l'accueil</label>
                                        <select name="limit_news" class="form-control">
                                            <option value="0" <?= ($theme_config['limit_news'] == "0") ? ' selected' : '' ?>>0</option>
											<option value="1" <?= ($theme_config['limit_news'] == "1") ? ' selected' : '' ?>>1</option>
                                            <option value="2" <?= ($theme_config['limit_news'] == "2") ? ' selected' : '' ?>>2</option>
                                            <option value="3" <?= ($theme_config['limit_news'] == "3") ? ' selected' : '' ?>>3</option>
                                            <option value="4" <?= ($theme_config['limit_news'] == "4") ? ' selected' : '' ?>>4</option>
                                            <option value="5" <?= ($theme_config['limit_news'] == "5") ? ' selected' : '' ?>>5</option>
                                            <option value="6" <?= ($theme_config['limit_news'] == "6") ? ' selected' : '' ?>>6</option>
                                            <option value="7" <?= ($theme_config['limit_news'] == "7") ? ' selected' : '' ?>>7</option>
                                            <option value="8" <?= ($theme_config['limit_news'] == "8") ? ' selected' : '' ?>>8</option>
                                            <option value="9" <?= ($theme_config['limit_news'] == "9") ? ' selected' : '' ?>>9</option>
                                            <option value="10" <?= ($theme_config['limit_news'] == "10") ? ' selected' : '' ?>>10</option>
                                            <option value="999" <?= ($theme_config['limit_news'] == "999") ? ' selected' : '' ?>>Afficher toutes les news</option>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label>Ip du serveur</label>
                                        <input type="text" class="form-control" name="ip_server" value="<?= $config['ip_server'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Adresse du serveur vocal</label>
                                        <input type="text" class="form-control" name="ip_vocal" value="<?= $config['ip_vocal'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Message dans la banniere</label>
                                        <input type="text" class="form-control" name="header_text_1" value="<?= $config['header_text_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL de l'image de la banniere</label>
                                        <input type="text" class="form-control" name="header" value="<?= $config['header'] ?>">
                                    </div>
                                </div>
								<div class="col-md-6">
									<?= $this->element('form.input.upload.img', $form_input) ?>
									<div class="form-group">
                                        <label>Largeur du logo</label>
                                        <input type="text" class="form-control" name="logo_width" value="<?= $config['logo_width'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Hauteur du logo</label>
                                        <input type="text" class="form-control" name="logo_height" value="<?= $config['logo_height'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
						
                        <div class="tab-pane" id="tab_footer">
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
                                        <label>Description</label>
										<p>Décrivez votre serveur en quelques phrases</p>
                                        <textarea class="form-control" rows="3" name="description"><?= $config['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texte du footer</label>
										<p>Ajouter votre texte dans le copyright</p>
                                        <textarea class="form-control" rows="3" name="copyright_text"><?= $config['copyright_text'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_other">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Texte récompense top voteur #1</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_1" value="<?= $config['top_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Texte récompense top voteur #3</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_2" value="<?= $config['top_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Texte récompense top voteur #3</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_3" value="<?= $config['top_3'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
