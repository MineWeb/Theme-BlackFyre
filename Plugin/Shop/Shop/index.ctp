<?= $this->Html->css('Shop.jquery.bootstrap-touchspin.css') ?>

<div id="content">
  <div class="container shop">
	<br />
    <?= $this->element('flash') ?>
    <?= $vouchers->get_vouchers() // Les promotions en cours ?>
    <div class="row">
      <div class="col-sm-3">
          
          <?php if($isConnected) { ?>
          <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money"></i> Mes crédits</h3>
          </div>
          <div class="panel-body">
              <span class="credits">
            <?php
            if($isConnected) {
              echo $money.' '.$Configuration->getMoneyName();
            } else {
              echo $Lang->get('SHOP__TITLE');
            }
            ?>
              </span><br />

              <?php if($isConnected AND $Permissions->can('CREDIT_ACCOUNT')) { ?>
                    <a href="#" data-toggle="modal" data-target="#addmoney" class="btn-more" style="margin-top:20px; margin-left: 15%;"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
            <?php } ?>
              
          </div><p>
        </div>
          <?php } ?>

        <div class="panel panel-default sidebar-menu">

          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> <?= $Lang->get('SHOP__CATEGORIES') ?></h3>
          </div>

          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
              <?php
              $i=0;
              foreach ($search_categories as $category_link) {
                $i++;

                echo '<li';
                  echo (isset($category) && $category_link['Category']['id'] == $category || (!isset($category) && $i == 1)) ? ' class="active"' : '';
                echo '>';
                  echo '<a href="'.$this->Html->url(array('controller' => 'c/'.$category_link['Category']['id'], 'plugin' => 'shop')).'">';
                    echo $category_link['Category']['name'];
                  echo '</a>';
                echo '</li>';

              }
              ?>
            </ul>
          </div>

        </div>
          
          <?php if($isConnected) { ?>
          <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Mon panier</h3>
              </div>
			  <p>
              <div class="panel-body">
                <?php if($isConnected) { ?>
                  <a href="#" data-toggle="modal" data-target="#cart-modal" class="btn-more" style="margin-left: 20%;"><?= $Lang->get('SHOP__BUY_CART') ?></a>
                <?php } ?>
              </div> 
			  <p>
            </div>
          <?php } ?>

      </div>
      
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading"><h1 class="panel-title"><i class="fa fa-gift"></i> <?= $Lang->get('SHOP__TITLE'); ?></h1></div>
				<div class="panel-body">
					<?= $vouchers->get_vouchers() ?>
						<?php
						$col = 4;
						$i = 0;
						foreach ($search_items as $k => $v) {
							if(!isset($category) AND $v['Item']['category'] == $search_first_category OR isset($category) AND $v['Item']['category'] == $category) {
								$i++; ?>
								<div class="col-sm-<?= $col ?> col-lg-<?= $col ?> col-md-<?= $col ?>">
										<div class="thumbnail">
												<?php if(isset($v['Item']['img_url'])) { ?><img class="img-responsive" style="max-height: 200px; min-height: 200px; margin-right: auto; max-width: 100%; display: block; margin-left: auto;" src="<?= $v['Item']['img_url'] ?>" alt=""><?php } ?>
												<div class="caption" style="height:auto; text-align: center;">
														<h2><?= before_display($v['Item']['name']) ?></h2>
														<h3><?= $v['Item']['price'] ?><?php if($v['Item']['price'] == 1) { echo  ' '.$singular_money; } else { echo  ' '.$plural_money; } ?></h3>
														<?php if($isConnected AND $Permissions->can('CAN_BUY')) { ?><button class="btn-shop display-item" style="margin-left: 5%;" data-item-id="<?= $v['Item']['id'] ?>"><?= $Lang->get('SHOP__BUY') ?></button> <?php } ?>
												</div>
										</div>
								</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
    function affich_item(id) {
      $('#buy').modal();
      $("#content_buy").hide().html('<div class="modal-body"><div class="alert alert-info"><?= $Lang->get('GLOBAL__LOADING') ?>...</div></div>').fadeIn('250');
      $.ajax({
        url: '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/'+id,
        type : 'GET',
        dataType : 'html',
        success: function(response) {
            $("#content_buy").hide().html(response).fadeIn('250');

            $('input[id="code-voucher"]').unbind('keyup');

            $('input[id="code-voucher"]').keyup(function(e) {

              var code = $(this).val();

              $.get('<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/'+code+'/'+id, function(data) {
                if(data.price !== undefined) {
                  $("#content_buy").find('#total-price').html(data.price);
                }
              });

            });
        },
        error: function(xhr) {
            alert('ERROR');
        }
      });
    }
    function buy(id) {
      $('#buy').modal();
      var code = $('#code-voucher').val();
      $('#btn-buy').attr('disabled', true);
      $('#btn-buy').addClass('disabled');
      $.ajax({
        url: '<?= $this->Html->url(array('action' => 'buy_ajax')); ?>/'+id,
        data : { code : code },
        type : 'GET',
        dataType : 'html',
        success: function(response) {
          $('#btn-buy').attr('disabled', false);
          $('#btn-buy').removeClass('disabled');
          $("#msg_buy").hide().html(response).fadeIn('1500');
        },
        error: function(xhr) {
          $('#btn-buy').attr('disabled', false);
          $('#btn-buy').removeClass('disabled');
          alert('ERROR');
        }
      });
    }

</script>

<script type="text/javascript">
  var LOADING_MSG = '<?= $Lang->get('GLOBAL__LOADING') ?>';
  var ADDED_TO_CART_MSG = '<?= $Lang->get('SHOP__BUY_ADDED_TO_CART') ?> <i class="fa fa-check"></i>';
  var CART_EMPTY_MSG = '<?= $Lang->get('SHOP__BUY_CART_EMPTY') ?>';
  var ITEM_GET_URL = '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/';
  var VOUCHER_CHECK_URL = '<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/';
  var BUY_URL = '<?= $this->Html->url(array('action' => 'buy_ajax')) ?>';

  var CART_ITEM_NAME_MSG = '<?= $Lang->get('SHOP__ITEM_NAME') ?>';
  var CART_ITEM_PRICE_MSG = '<?= $Lang->get('SHOP__ITEM_PRICE') ?>';
  var CART_ITEM_QUANTITY_MSG = '<?= $Lang->get('SHOP__ITEM_QUANTITY') ?>';
  var CART_ACTIONS_MSG = '<?= $Lang->get('GLOBAL__ACTIONS') ?>';

  var CSRF_TOKEN = '<?= $csrfToken ?>';
</script>

<?= $this->Html->script('Shop.jquery.cookie') ?>
<?= $this->Html->script('Shop.shop') ?>
<?= $this->Html->script('Shop.jquery.bootstrap-touchspin.js') ?>

<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CONFIRM') ?></h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CART') ?></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher" style="width:245px;" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
        </div>
        <button class="btn disabled"><?= $Lang->get('SHOP__ITEM_TOTAL') ?> : <span id="cart-total-price">0</span>  <?= $Configuration->getMoneyName() ?></button>
        <button type="button" class="btn btn-primary" id="buy-cart"><?= $Lang->get('SHOP__BUY') ?></button>
      </div>
    </div>
  </div>
</div>
<?= $this->element('payments_modal') ?>
