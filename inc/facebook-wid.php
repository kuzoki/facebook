<?php
/*
@package ritsuTheme
	This Wideget is Made By KUZOKITHEM Developers
	https://themeforest.net/user/kuzokithemes
===================
    WIDGET CLASSS
*/





/**
 * Adds Facebook_Page_Widget widget.
 */
class Facebook_page extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'facebook_page', // Base ID
			esc_html__( 'A Facebook Page Wid', 'ritsu_domaine' ), // Name
			array( 'description' => esc_html__( 'Display Your FaceBook Page Feed Widget', 'ritsu_domaine' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$tabs_list = $instance[ 'tabs_list' ];
		//echo($tabs_list);
		//$tab_lists = implode(",", $tabs_list);
		

		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			echo '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F'.$instance[ 'pagelink' ].'&tabs='.$tabs_list.'&width='.$instance[ 'width' ].'&height='.$instance[ 'height' ].'&small_header=false&adapt_container_width=true&hide_cover='.$instance['hidecover'].'&show_facepile=true&appId" width="'.$instance[ 'width' ].'" height="'.$instance[ 'height' ].'" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
					'
					;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Your Title... ', 'ritsu_domaine' );
		$pagelink = ! empty( $instance['pagelink'] ) ? $instance['pagelink'] : esc_html__( 'envato', 'ritsu_domaine' );
		$hidecover = ! empty( $instance['hidecover'] ) ? $instance['hidecover'] : esc_html__( 'false', 'ritsu_domaine' );	
		$width = ! empty( $instance['width'] ) ? $instance['width'] : esc_html__( '360', 'ritsu_domaine' );	
		$height = ! empty( $instance['height'] ) ? $instance['height'] : esc_html__( '500', 'ritsu_domaine' );	
		$instance['tabs_list'] = !empty($instance['tabs_list']) ? explode(",",$instance['tabs_list']) : array('');
		?>

		<!-- Title Of Widget  -->
			<p  style="margin-bottom:20px;">
				<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'ritsu_domaine' ); ?>
				</label> 
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					type="text"
					value="<?php echo esc_attr( $title ); ?>"
				/>		
			</p>
		<!-- The Url Of FaceBook Wideget -->
			<p style="margin-bottom:20px;">
				<label 
					style=" text-transform: capitalize;font-weight: 800;"
					for="<?php echo esc_attr( $this->get_field_id( 'pagelink' ) ); ?>"><?php esc_attr_e( 'Your Facebook Page Unique Name', 'ritsu_domaine' ); ?>
					
				</label><br>
				<span style="
						font-size:12px 
						margin-bottom: 10px;
						text-transform: capitalize;
						font-style: italic;
						color:grey;
					">
						You Can Get your page unique name from the url <br>
						example: www.facebook.com/<strong style='color:red'>envato</strong> <br> envato is the unique page name
					</span>
				<input class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'pagelink' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'pagelink' ) ); ?>" 
					type="text" value="<?php echo esc_attr( $pagelink ); ?>"
				/>
			
			</p>	
		<!-- Tabs Option For FaceBook Widget -->
			<p style="margin-bottom:20px;">
        		<label style=" text-transform: capitalize;font-weight: 800;"
					for="<?php echo $this->get_field_id( 'tabs_list' ); ?>"><?php _e( 'Select What You Want To Be Showen, You can choose multiple chekbox' ); ?>
				</label>
				<br />
				<p style=" display: flex;
   							justify-content: space-between;"
				>
				<?php $face_tab_args = array("timeline","event","messages");
				      	//echo implode(',',$args);
						
					//print_r($terms);
					foreach ($face_tab_args as $value ) {
						
						$checked = "";
							if(in_array($value,$instance['tabs_list'])){
								$checked = "checked='checked'";
							}
					  
						// foreach( $face_tab_args as $id => $name ) { 
						// $checked = "";
						// if(in_array($name->name,$instance['postCats'])){
						// 	$checked = "checked='checked'";
						// }
					?>
					<span>
						<input 
							type="checkbox" 
							class="checkbox" 
							id="<?php echo $this->get_field_id('tabs_list'); ?>" 
							name="<?php echo $this->get_field_name('tabs_list[]'); ?>" 
							value="<?php echo $value; ?>"  <?php echo $checked; ?>
						/>
						<label 	style=" text-transform: capitalize;font-weight: 500;" 
								for="<?php echo $this->get_field_id('tabs_list'); ?>"
						>
								<?php  echo $value; ?>
						</label>
					</span>
				<?php } 

				 
					
				
				
				?>
				</p>
			</p>

		<!-- Hide Cover For FaceBook Widget-->
			<p style="margin-bottom:20px;">
				<label 
					style=" text-transform: capitalize;font-weight: 800;"
					for="<?php echo esc_attr( $this->get_field_id( 'hidecover' ) ); ?>"><?php esc_attr_e( 'Facebook Page Cover Display or Hide Option:', 'ritsu_domaine' ); ?>
					
				</label><br> 
				
					<input type="radio" id="<?php echo esc_attr( $this->get_field_name( 'hidecover' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hidecover' ) ); ?>" value="true" 
						<?php  
							if($instance['hidecover'] == 'true'){
								echo 'checked';
							}else{
								echo '';
							}
						?>
					>
					<label for="huey">Hide Cover</label>
				
				
					<input type="radio" id="<?php echo esc_attr( $this->get_field_name( 'hidecover' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hidecover' ) ); ?>" value="false" 
						<?php  
							if($instance['hidecover'] == 'false'){
								echo 'checked';
							}else{
								echo '';
							}
						?>
					>
					<label for="huey">Display Cover</label>
							
				
			</p>
		<!-- width Of FaceBook Page -->
			<p  style="margin-bottom:20px;">
					
					<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
						for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_attr_e( 'width:', 'ritsu_domaine' ); ?>
					</label> <br>
					<span style="
						font-size:12px 
						margin-bottom: 10px;
						text-transform: capitalize;
						font-style: italic;
						color:grey;
					">
						The pixel width of the plugin. Min. is 180 & Max. is 500. Ideal Size 360
					</span>
					<input class="widefat" 
						id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"
						name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>"
						type="number"
						min="180"
						max="500"
						value="<?php echo esc_attr( $width ); ?>"
					/>		
			</p>
		<!-- Height Of FaceBook Page -->	
			<p  style="margin-bottom:20px;">
					
					<label style=" text-transform: capitalize;font-weight: 800; margin-bottom:20px;" 
						for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_attr_e( 'height:', 'ritsu_domaine' ); ?>
					</label> <br>
					<span style="
						font-size:12px 
						margin-bottom: 10px;
						text-transform: capitalize;
						font-style: italic;
						color:grey;
					">
						The pixel height of the plugin. Min. is 70
					</span>
					<input class="widefat" 
						id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"
						name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>"
						type="number"
						min="70"
						value="<?php echo esc_attr( $height ); ?>"
					/>		
			</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['pagelink'] = ( ! empty( $new_instance['pagelink'] ) ) ? sanitize_text_field( $new_instance['pagelink'] ) : '';
		$instance['hidecover'] = ( ! empty( $new_instance['hidecover'] ) ) ? sanitize_text_field( $new_instance['hidecover'] ) : '';
		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';
		$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? sanitize_text_field( $new_instance['height'] ) : '';
		$instance['tabs_list'] = !empty($new_instance['tabs_list']) ? implode(",",$new_instance['tabs_list']) : '';
		return $instance;
	}

} 

// register facebook_page widget
function register_facebook_page_widget() {
    register_widget( 'Facebook_page' );
}
add_action( 'widgets_init', 'register_facebook_page_widget' );