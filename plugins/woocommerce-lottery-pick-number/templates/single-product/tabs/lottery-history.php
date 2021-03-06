<?php
/**
 * Lottery history tab template
 * 
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/lottery-history.php
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post, $product;
$heading = esc_html(  __( 'Lottery History', 'wc-lottery-pn' )  );
$lottery_winers = get_post_meta($post->ID, '_lottery_winners');
$users_names = '';
$use_answers = wc_lottery_use_answers( $post->ID );
$use_ticket_numbers = get_post_meta( $post->ID , '_lottery_use_pick_numbers', true );
$answers = maybe_unserialize( get_post_meta( $post->ID, '_lottery_pn_answers', true ) );
?>

<h2><?php echo $heading; ?></h2>


<?php if(($product->is_closed() === TRUE ) and ($product->is_started() === TRUE )) : ?>
	
	<p><?php _e('Lottery has finished', 'wc-lottery-pn') ?></p>
	<?php if ($product->get_lottery_fail_reason() == '1'){
		 _e('Lottery failed because there were no minimal number of participants', 'wc-lottery-pn');
	} else{

		if ( count($lottery_winers) > 1 ) { ?>

		   <p><?php _e('Lottery winners are', 'wc-lottery-pn') ?>: <?php foreach ($lottery_winers as $winner_id) {
		   	if( intval( $winner_id ) > 0) {
					$users_names .= "<span>";
					$users_names .= get_userdata($winner_id)->display_name;
					$users_names .= "</span>, ";
				}
			} ?><?php echo rtrim( $users_names , ', '); ?></p>
		
		<?php } elseif( count($lottery_winers) === 1 ) {
			$winner = reset($lottery_winers);

			if ( ! empty ( $winner ) ) { ?>
			<p><?php _e('Lottery winner is:', 'wc-lottery-pn') ?> <span><?php echo get_userdata($winner)->display_name ?></span></p>
		<?php } 
		}
	} ?>
							
<?php endif; ?>	

<table>
	<thead>
		<tr>
			<th><?php _e('Date', 'wc-lottery-pn') ?></th>
			<th><?php _e('User', 'wc-lottery-pn') ?></th>
			<?php if ($use_ticket_numbers === 'yes' ) :?>
				<th><?php _e('Ticket number', 'wc-lottery-pn') ?></th>
			<?php endif; ?>
			<?php if ($use_answers === true && 'yes' === get_option('lottery_answers_in_history', 'yes')  && ( 'no' === get_option('lottery_answers_in_history_finished', 'no') || $product->is_closed() === TRUE ) ) :?>
				<th><?php _e('Answer', 'wc-lottery-pn') ?></th>
			<?php endif; ?>
		</tr>
	</thead>
	<?php 
		$lottery_history = $product->lottery_history();
		
		if( $lottery_history ) {		 
		
			foreach ($lottery_history as $history_value) {

				echo "<tr>";
				echo "<td class='date'>".date_i18n( get_option( 'date_format' ), strtotime( $history_value->date )).' '.date_i18n( get_option( 'time_format' ), strtotime( $history_value->date ))."</td>";
				echo $history_value->userid ? "<td class='username'>".get_userdata($history_value->userid)->display_name."</td>" : '';

				if ($use_ticket_numbers === 'yes' ) {
					echo "<td class='ticket_number'>$history_value->ticket_number</td>";
				}
				
				if ( $use_answers === true && 'yes' === get_option('lottery_answers_in_history', 'yes')  && ( 'no' === get_option('lottery_answers_in_history_finished', 'no') || $product->is_closed() === TRUE ) ){
					$answer = isset( $answers[$history_value->answer_id] ) ? $answers[$history_value->answer_id] : false;
					
					echo "<td class='answer'>";
					echo $answer !== true ? $answer['text'] : "" ;
					echo "</td>";
				}
				
				echo "</tr>";
			}
		
		}
	?>	
	<tr class="start">
			<?php 
				$lottery_dates_to = $product->get_lottery_dates_from();
			
			if ($product->is_started() === TRUE ){
				echo '<td class="date">'.date_i18n( get_option( 'date_format' ),  strtotime( $lottery_dates_to )).' '.date_i18n( get_option( 'time_format' ),  strtotime( $lottery_dates_to )).'</td>';				
				echo '<td class="started">';
				echo apply_filters('auction_history_started_text', __( 'Lottery started', 'wc-lottery-pn' ), $product);
				echo '</td>';

			} else {
				echo '<td class="date">'.date_i18n( get_option( 'date_format' ),  strtotime( $lottery_dates_to )).' '.date_i18n( get_option( 'time_format' ),  strtotime( $lottery_dates_to )).'</td>';				
				echo '<td class="starting">';
				echo apply_filters('auction_history_starting_text', __( 'Lottery starting', 'wc-lottery-pn' ), $product);
				echo '</td>' ;
			}?>
	</tr>
</table>