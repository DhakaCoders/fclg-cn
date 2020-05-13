<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $woocommerce, $product, $post;

$current_user               = wp_get_current_user();
$min_tickets                = $product->get_min_tickets();
$max_tickets                = $product->get_max_tickets();
$lottery_num_winners        = $product->get_lottery_num_winners();
$lottery_participants_count = !empty($product->get_lottery_participants_count()) ? $product->get_lottery_participants_count() : '0';
$lottery_dates_to           = $product->get_lottery_dates_to();
$lottery_dates_from         = $product->get_lottery_dates_from();

?>
<div class="lottery-countdown">
<?php
 if(($product->is_closed() === FALSE ) and ($product->is_started() === TRUE )) : ?>			
    <div class="custom-lottery-time" id="countdown"><?php echo apply_filters('time_text', __( '<h3>This competition ends in:</h3>', 'wc_lottery' ), $product->get_type()); ?> 
            <div class="main-lottery lottery-time-countdown" data-time="<?php echo $product->get_seconds_remaining() ?>" data-lotteryid="<?php echo $product->get_id() ?>" data-format="<?php echo get_option( 'simple_lottery_countdown_format' ) ?>"></div>
    </div>

    <div class='lottery-ajax-change wc-lottery-ajax'>

        <?php if( $max_tickets  &&( $max_tickets > 0 )  ) : ?>
                <p class="max-pariticipants"><?php  printf( __( "This competition has a maximum of %s entries", 'wc_lottery' ),$max_tickets ) ; ?></p>
        <?php endif; ?>


    </div>	

<?php elseif (($product->is_closed() === FALSE ) and ($product->is_started() === FALSE )):?>
	
	<div class="custom-lottery-time future" id="countdown"><?php echo  __( 'Lottery starts in:', 'wc_lottery' ) ?> 
		<div class="lottery-time-countdown future" data-time="<?php echo $product->get_seconds_to_lottery() ?>" data-format="<?php echo get_option( 'simple_lottery_countdown_format' ) ?>"></div>
	</div>
	
<?php endif; ?>
</div>