<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Lottery won emails 
 *
 * Lottery won emails are sent when a user wins the lottery.
 * @class 		WC_Email_SA_Outbid
 * @extends 	WC_Email
 */

class WC_Email_Lottery_No_Luck extends WC_Email {
		
    /** @var string */
    var $title;

    /** @var string */
    var $lottery_id;


    /**
     * Constructor
     *
     * @access public
     * @return void
     */
    function __construct() {

        global $wc_lottery;

        $this->id             = 'lottery_no_luck';
        $this->title          = __( 'Lottery No Luck', 'wc_lottery' );
        $this->description    = __( 'Lottery no luck emails are sent to users that did not win lottery but are participating in it.', 'wc_lottery' );
        
        $this->template_html  = 'emails/lottery_no_luck.php';
        $this->template_plain = 'emails/plain/lottery_no_luck.php';
        $this->template_base  = $wc_lottery->get_path() .  'templates/';
        
        $this->subject        = __( 'No luck on {blogname}', 'wc_lottery');
        $this->heading        = __( 'Better luck next time!', 'wc_lottery');		

        add_action( 'wc_lottery_won_notification', array( $this, 'trigger' ) );

        // Call parent constructor
        parent::__construct();
    }

    /**
     * trigger function.
     *
     * @access public
     * @return void
     */
    function trigger( $product_id ) {		

        if ( !$this->is_enabled() ) return;


        if ( $product_id ) {

            $product_data  = wc_get_product(  $product_id );
            $winning_users =  get_post_meta( $product_id, '_lottery_winners');
            $participants  =  get_post_meta( $product_id, '_participant_id');
            $no_luck_users = array_diff($participants, $winning_users);
            $uniquep_no_luck_users= array_unique($no_luck_users);


            if ( $product_data && !empty($uniquep_no_luck_users)) {

                foreach ($uniquep_no_luck_users as $user) {
                    $this->object     = new WP_User( $user );
                    $this->recipient  = $this->object->user_email;
                    $this->lottery_id = $product_id;
                    $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );						
                }
            }

        }
    }
    /**
     * get_content_html function.
     *
     * @access public
     * @return string
     */
    function get_content_html() {
        ob_start();
        wc_get_template( 	
            $this->template_html, array(
                    'email_heading' => $this->get_heading(),
                    'blogname'      => $this->get_blogname(),
                    'product_id'    => $this->lottery_id				
            ) );
        return ob_get_clean();
    }
    /**
     * get_content_plain function.
     *
     * @access public
     * @return string
     */
    function get_content_plain() {
        ob_start();
        wc_get_template( 
            $this->template_plain, array(
                'email_heading' => $this->get_heading(),
                'blogname'      => $this->get_blogname(),
                'product_id'    => $this->lottery_id				
            ) );
        return ob_get_clean();
    }
}