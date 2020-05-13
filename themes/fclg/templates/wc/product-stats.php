<?php 
global $product;
$stats = get_field('stats', $product->get_id());
if( $stats ){
?>
<section class="product-stats-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="pro-stats-sec-grd-cntlr">
          <ul class="reset-list clearfix">
            <?php foreach( $stats as $stat ): ?>
            <li>
              <div class="pro-stat-grd-item">
                <?php if( !empty($stat['icon']) ){?>
                <i><img src="<?php echo $stat['icon']; ?>" alt="<?php echo cbv_get_image_alt( $stat['icon'] ); ?>"></i>
                <?php } ?>
                <div class="pro-stat-grd-item-des">
                  <?php 
                    if( !empty($stat['title']) ) printf('<span>%s</span>', $stat['title']);
                    if( !empty($stat['value']) ) printf('<strong>%s</strong>', $stat['value']);
                  ?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>