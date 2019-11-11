<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    mwb-wpr-points-log-template
 * @subpackage Rewardeem_woocommerce_Points_Rewards/public/partials
 */

$user_id = $user_ID;
if ( isset( $user_id ) && $user_id != '' && is_numeric( $user_id ) ) { //phpcs:ignore WordPress.PHP.YodaConditions.NotYoda 
	$point_log    = get_user_meta( $user_id, 'points_details', true );
	$total_points = get_user_meta( $user_id, 'mwb_wpr_points', true );
	if ( isset( $point_log ) && is_array( $point_log ) && $point_log != null ) {//phpcs:ignore WordPress.PHP.YodaConditions.NotYoda
		?>
		<h2><?php esc_html_e( ' Point Log Table', 'points-rewards-for-woocommerce' ); ?></h2>
		<table class="woocommerce-MyAccount-points shop_table my_account_points account-points-table mwb_wpr_table_view_log">
				<thead>
					<tr>
						<th class="view-log-Date">
							<span class="nobr"><?php echo esc_html__( 'Date', 'points-rewards-for-woocommerce' ); ?></span>
						</th>
						<th class="view-log-Status">
							<span class="nobr"><?php echo esc_html__( 'Point Status', 'points-rewards-for-woocommerce' ); ?></span>
						</th>
						<th class="view-log-Activity">
							<span class="nobr"><?php echo esc_html__( 'Activity', 'points-rewards-for-woocommerce' ); ?></span>
						</th>
					</tr>
				</thead>
	  </table>
	  <div class="mwb_wpr_slide_toggle">
		<table class="mwb_wpr_common_table">
		  <tr>
			  <?php
				if ( array_key_exists( 'registration', $point_log ) ) {
					?>
				
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider" ><?php esc_html_e( 'Signup Event', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
				  <td>
					<?php
					echo esc_html( mwb_wpr_set_the_wordpress_date_format( $point_log['registration']['0']['date'] ) );// phpcs:ignore WordPress.Security.EscapeOutput
					?>
				   </td>
				  <td>
					<?php
					echo '+' . ( $point_log['registration']['0']['registration'] ); // phpcs:ignore WordPress.Security.EscapeOutput
					?>
				  </td>
				  <td><?php esc_html_e( 'Registration Points', 'points-rewards-for-woocommerce' ); ?></td>
					<?php
				}
				?>
		  </tr>
		  <tr>
			  <?php
				if ( array_key_exists( 'import_points', $point_log ) ) {
					?>
				 
				  <td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $point_log['import_points']['0']['date'] ) ); ?></td>
				  <td><?php echo '+' . esc_html( $point_log['import_points']['0']['import_points'] ); ?></td>
				  <td><?php esc_html_e( 'Registration Points', 'points-rewards-for-woocommerce' ); ?></td>
					<?php
				}
				?>
		  </tr>
		</table>
	  </div> 
			   <?php
				if ( array_key_exists( 'Coupon_details', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Coupon Creation', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['Coupon_details'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['Coupon_details'] ); ?></td>
					<td><?php esc_html_e( 'Coupon Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
			  </table></div>
					<?php
				}
				if ( array_key_exists( 'product_details', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points Earned via Particular Product', 'points-rewards-for-woocommerce' ); ?> <a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			 
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['product_details'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['product_details'] ); ?></td>
					<td><?php esc_html_e( 'Product purchase Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
			  </table>
			  </div>
					<?php
				}
				if ( array_key_exists( 'pro_conversion_points', $point_log ) ) {
					?>
			   <div class="mwb_wpr_slide_toggle">
				<p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points earned on Order Total', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
				  <table class="mwb_wpr_common_table">
					<?php foreach ( $point_log['pro_conversion_points'] as $key => $value ) { ?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['pro_conversion_points'] ); ?></td>
					<td><?php esc_html_e( 'Product Conversion Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table>
				 </div>
					<?php
				}
				if ( array_key_exists( 'points_on_order', $point_log ) ) {
					?>
			   <div class="mwb_wpr_slide_toggle">
				<p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points on Order', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
				  <table class="mwb_wpr_common_table">
					  <?php foreach ( $point_log['points_on_order'] as $key => $value ) { ?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['points_on_order'] ); ?></td>
					<td><?php esc_html_e( 'Points earned on Order Total', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
							<?php
					  }
						?>
				 </table>
				 </div>
					<?php
				}
				if ( array_key_exists( 'comment', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points earned via giving review', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  <a class ="mwb_wpr_open_toggle"  href="javascript:;"></a>
			  <table class="mwb_wpr_common_table"> 
					<?php
					foreach ( $point_log['comment'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['comment'] ); ?></td>
					<td><?php esc_html( 'Comment Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						 <?php
					}
					?>
				 </table>
				 </div>
					<?php
				}
				if ( array_key_exists( 'reference_details', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points earned via referring someone', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['reference_details'] as $key => $value ) {
						$user_name = '';
						if ( isset( $value['refered_user'] ) && ! empty( $value['refered_user'] ) ) {
							 $user      = get_user_by( 'ID', $value['refered_user'] );
							 $user_name = $user->user_nicename;
						}
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['reference_details'] ); ?></td>
					<td>
						<?php
						esc_html_e( 'Reference Points by ', 'points-rewards-for-woocommerce' );
						echo esc_html( $user_name );
						?>
					</td>
				  </tr>
						<?php
					}
					?>
				 </table> </div>
					<?php
				}
				if ( array_key_exists( 'ref_product_detail', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			   <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points earned by the puchase has been made by referrals', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['ref_product_detail'] as $key => $value ) {
						$user_name = '';
						if ( isset( $value['refered_user'] ) && ! empty( $value['refered_user'] ) ) {
							$user      = get_user_by( 'ID', $value['refered_user'] );
							$user_name = $user->user_nicename;
						}
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['ref_product_detail'] ); ?></td>
					  <td>
						<?php
						esc_html_e( 'Product purchase by Reffered User Points ', 'points-rewards-for-woocommerce' );
						echo esc_html( $user_name );
						?>
						</td>
				  </tr>
						<?php
					}
					?>
				 </table>
				</div> 
					<?php
				}
				if ( array_key_exists( 'membership', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points deducted becuase you have entered to the membership level and may use more benefit', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  <a class ="mwb_wpr_open_toggle"  href="javascript:;"></a>
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['membership'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['membership'] ); ?></td>
					<td><?php esc_html_e( 'Membership Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table>
				 </div>
					<?php
				}
				if ( array_key_exists( 'admin_points', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			   <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Free rewards you earned becuase of loyality', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['admin_points'] as $key => $value ) {
						$value['sign']   = isset( $value['sign'] ) ? $value['sign'] : '+/-';
						$value['reason'] = isset( $value['reason'] ) ? $value['reason'] : __( 'Updated By Admin', 'points-rewards-for-woocommerce' );
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo esc_html( $value['sign'] ) . esc_html( $value['admin_points'] ); ?></td>
					<td><?php echo esc_html( $value['reason'] ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table></div>
					<?php
				}
				if ( array_key_exists( 'pur_by_points', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			   <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Deduction of points as you has purchased your product', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			   
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['pur_by_points'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['pur_by_points'] ); ?></td>
					<td><?php esc_html_e( 'Purchased through Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table></div>
					<?php
				}
				if ( array_key_exists( 'deduction_of_points', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Deduction of points for your return request', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['deduction_of_points'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['deduction_of_points'] ); ?></td>
					<td><?php esc_html_e( 'Deduct Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table> </div>
					<?php
				}
				if ( array_key_exists( 'return_pur_points', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points returned successfully on your return request', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['return_pur_points'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?> </td>
					<td><?php echo '+' . esc_html( $value['return_pur_points'] ); ?></td>
					<td><?php esc_html_e( 'Return Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				</table>
				</div>
					<?php
				}
				if ( array_key_exists( 'deduction_currency_spent', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points deducted successfully on your return request', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['deduction_currency_spent'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['deduction_currency_spent'] ); ?></td>
					<td><?php esc_html_e( 'Deduct Per Currency Spent Point', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table>
				 </div>
					<?php
				}
				if ( array_key_exists( 'Sender_point_details', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points deducted successfully as you have shared your points', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['Sender_point_details'] as $key => $value ) {
						$user_name = '';
						if ( isset( $value['give_to'] ) && ! empty( $value['give_to'] ) ) {
							$user      = get_user_by( 'ID', $value['give_to'] );
							$user_name = $user->user_nicename;
						}
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?> </td>
					<td><?php echo '-' . esc_html( $value['Sender_point_details'] ); ?></td>
					<td>
						<?php
						esc_html_e( 'Shared to ', 'points-rewards-for-woocommerce' );
						echo esc_html( $user_name );
						?>
					</td>
				  </tr>
						<?php
					}
					?>
				 </table></div>   
					<?php
				}
				if ( array_key_exists( 'Receiver_point_details', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points received successfully as someone has shared', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['Receiver_point_details'] as $key => $value ) {
						$user_name = '';
						if ( isset( $value['received_by'] ) && ! empty( $value['received_by'] ) ) {
							$user      = get_user_by( 'ID', $value['received_by'] );
							$user_name = $user->user_nicename;
						}
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['Receiver_point_details'] ); ?></td>
					<td>
						<?php
						esc_html_e( 'Received Points via ', 'points-rewards-for-woocommerce' );
						echo esc_html( $user_name );
						?>
					</td>
				  </tr>
						<?php
					}
					?>
				 </table></div>
					<?php
				}
				if ( array_key_exists( 'cart_subtotal_point', $point_log ) ) {
					?>
			  <div class="mwb_wpr_slide_toggle">
			  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points Applied on Cart', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
			  
			  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['cart_subtotal_point'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['cart_subtotal_point'] ); ?></td>
					<td><?php esc_html_e( 'Points Used on Cart Subtotal', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
				 </table></div>
					<?php
				}
				if ( array_key_exists( 'expired_details', $point_log ) ) {
					?>
		  <div class="mwb_wpr_slide_toggle">
		  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Oops!! Points are expired!', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
		  
		  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['expired_details'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['expired_details'] ); ?></td>
					<td><?php esc_html_e( 'Get Expired', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
		  </table>
		  </div> 
					<?php
				}
				if ( array_key_exists( 'deduct_currency_pnt_cancel', $point_log ) ) {
					?>
		  <div class="mwb_wpr_slide_toggle">
		  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Order Points Deducted due to Cancelation of Order', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
		  
		  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['deduct_currency_pnt_cancel'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['deduct_currency_pnt_cancel'] ); ?></td>
					<td><?php esc_html_e( 'Deducted Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
		  </table>
		  </div> 
					<?php
				}
				if ( array_key_exists( 'deduct_bcz_cancel', $point_log ) ) {
					?>
		  <div class="mwb_wpr_slide_toggle">
		  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Assigned Points Deducted due Cancelation of Order', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
		  
		  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['deduct_bcz_cancel'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['deduct_bcz_cancel'] ); ?></td>
					<td><?php esc_html_e( 'Deducted Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
		  </table>
		  </div> 
					<?php
				}
				if ( array_key_exists( 'pur_points_cancel', $point_log ) ) {
					?>
		  <div class="mwb_wpr_slide_toggle">
		  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points Returned due to Cancelation of Order', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
		  
		  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['pur_points_cancel'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '+' . esc_html( $value['pur_points_cancel'] ); ?></td>
					<td><?php esc_html_e( 'Returned Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
		  </table>
		  </div> 
					<?php
				}
				// MWB CUSTOM CODE.
				if ( array_key_exists( 'pur_pro_pnt_only', $point_log ) ) {
					?>
		  <div class="mwb_wpr_slide_toggle">
		  <p class="mwb_wpr_view_log_notice mwb_wpr_common_slider"><?php esc_html_e( 'Points deducted for purchasing the product', 'points-rewards-for-woocommerce' ); ?><a class ="mwb_wpr_open_toggle"  href="javascript:;"></a></p>
		  
		  <table class="mwb_wpr_common_table">
					<?php
					foreach ( $point_log['pur_pro_pnt_only'] as $key => $value ) {
						?>
				  <tr>
					<td><?php echo esc_html( mwb_wpr_set_the_wordpress_date_format( $value['date'] ) ); ?></td>
					<td><?php echo '-' . esc_html( $value['pur_pro_pnt_only'] ); ?></td>
					<td><?php esc_html_e( 'Product Purchased by Points', 'points-rewards-for-woocommerce' ); ?></td>
				  </tr>
						<?php
					}
					?>
		  </table>
		  </div> 
					<?php
				}
				// END OF MWB CUSTOM CODE.
				?>
		<div class="mwb_wpr_slide_toggle">
		<table class="mwb_wpr_total_points">
		  <tr>
			  <td><h4><?php esc_html_e( 'Total Points', 'points-rewards-for-woocommerce' ); ?></h4></td>
			  <td><h4><?php echo esc_html( $total_points ); ?></h4></td>
			  <td></td>
		  </tr>        
			</table>
		</div>
		<?php
	} else {
		 echo '<h3>' . esc_html__( 'No Points Generated Yet.', 'points-rewards-for-woocommerce' ) . '<h3>';
	}
}
?>