<?php
/**
 * Plugin Name: URC CTA
 * Description: Show call to action buttons for accessibility.
 * Version: 1.0
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// HIDE SUBSCRIBE FIELDS IN THESE PAGES
function urc_cta_hidden() {

    return array(
        'free-ebook',
        'members-section',
        'ebook',
        'bookone-audio',
        'booktwo-ebook',
        'audioprogram1',
        'audioprogram2',
        'audioprogram3',
        'audioprogram4',
        'login',
    );

}


// MAIN FUNCTION
add_action( 'genesis_before_content', 'urc_ctas', 20 );
function urc_ctas() {

    global $post; //$post->ID
        
    $upload_dir = wp_upload_dir();
    
    $donate_page = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LKGTSSLYJ93J6';
    
    //$phone_coaching_page = get_permalink( get_page_by_path( "phone-coaching" ) );
    $phone_coaching_page = get_permalink( '22818' );
    
    $products_page = get_permalink( get_page_by_path( "products" ) );

    $free_ebook_page = get_permalink( get_page_by_path( "free-ebook" ) );

    ?><div class="module-cta"><?php
        
        if( $post && !in_array( $post->post_name, urc_cta_hidden() ) ) :
            echo '<div class="module cta-icon"><div class="module-wrap">
                    <div><a class="item image link" href="'.$free_ebook_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-free-ebook-icon.png" alt="" class="wp-image-41165" width="50" height="50"></a></div>
                    <div class="items info"><div><a class="item title link" href="'.$free_ebook_page.'" data-type="page" data-id="1519">Free eBooks & Audio Program</a></div></div>
                </div></div>';
        endif;

        echo '<div class="module cta-icon"><div class="module-wrap">
                <div><a class="item image link" href="'.$phone_coaching_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-coaching-icon.png" alt="" class="wp-image-41163" width="50" height="50"></a></div>
                <div class="items info"><div><a class="item title link" href="'.$phone_coaching_page.'" data-type="page" data-id="1519">Phone/Skype Coaching Session</a></div></div>
            </div></div>
            <div class="module cta-icon"><div class="module-wrap">
                <div><a class="item image link" href="https://teespring.com/stores/coach-corey-wayne"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-products-icon.png" alt="" class="wp-image-41161" width="50" height="50"></a></div>
                <div class="items info"><div><a class="item title link" href="https://teespring.com/stores/coach-corey-wayne">Coach Corey Wayne Merchandise</a></div></div>
            </div></div>
            <div class="module cta-icon"><div class="module-wrap">
                <div><a class="item image link" href="'.$donate_page.'" data-type="page" ><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-donate-icon.png" alt="" class="width="50" height="50"></a></div>
                <div class="items info"><div><a class="item title link" href="'.$donate_page.'">Make A Donation</a></div></div>
            </div></div>
            <div class="module cta-icon"><div class="module-wrap">
                <div><a class="item image link" href="'.$products_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-all-books-icon.png" alt="" class="wp-image-41162" width="50" height="50"></a></div>
                <div class="items info"><div><a class="item title link" href="'.$products_page.'" data-type="page">Books & Recommended Products</a></div></div>
            </div></div>';
            
    ?></div><?php



}