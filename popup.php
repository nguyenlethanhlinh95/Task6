<?php 

/**
	 * Plugin Name: sdfds 
	 * Plugin URI: 
	 * Description: This is the Plugin for admin
	 * Version: 1.0.0
	 * Author: ThanhLinh
	 * Author URI: 
	 */
 add_action('media_buttons', 'add_my_media_button');
 function add_my_media_button() {
	    	// add_thickbox();
		    // echo '<a href="#" id="insert_shortcode" class="button">Add shortcode</a>';
 			$title = 'Custom Shortcode';
 			        $modalTitle = 'Add-Shortcode-Button';
 			        echo '<a href="#TB_inline?width=600&inlineId=' .$modalTitle. '" id="buttons_function" class="thickbox " title="'.$title.'">Add </a>';
		 	//echo '<a href="#TB_inline?&width=600&height=550&inlineId=my_content_id" class="button thickbox">sdaasd</a>';
		 	?>
		 	
		 	<?php //add_thickbox(); ?>
		 	<div id="Add-Shortcode-Button" style="display:none;">
			     <form>
						<div class="form-group sortby_box">
					   		<label for="exampleFormControlInput1">Display list of Woo Products by</label>
					    	<select name="display_by" class="display_by">
								<option value="" style="font-weight: bold;">-- Select Display by --</option>
								<option value="cate">Category</option>
								<option value="id">List of ID</option>
							</select>
					  	</div>

					  	<div class="form-group ListID">
					   		<label for="SelectListOfID">List of ID</label>
					   		<!-- if choose ListID then will get all Feature Product have check. -->
						   	<div class="wapper_check">
							   	<?php 
							   		$args = array( 
							   			'post_type' => "product",
							   			'post_per_page' => -1,
									    'meta_key'   => 'meta-checkbox',
									    'meta_value' => 'yes' 
								    ); ?>
								<?php $query = new WP_Query($args);?>
								
								<?php if($query->have_posts()): ?>
									<?php while($query->have_posts()): $query->the_post(); ?>

										<div class="form-check">
											<span><input type="checkbox"></span>
											<span><?php the_title(); ?></span>
										</div>							
									<?php endwhile; ?>
								<?php endif; ?>
							</div>							  		
					  	</div>

				     	<div class="form-group cate_box">
					   		<label for="exampleFormControlInput1">Choose Category</label>
					    	<select id="select_Category" name="cate">
						   		<option value="">Choose Category</option>	
							   	<?php $args = array( 
								    'hide_empty' => 0,
								    'taxonomy' => 'category',
								    'orderby' => id,
								    ); 
								    $cates = get_categories( $args ); 
								    foreach ( $cates as $cate ) {  ?>			    
										<option value="<?php echo $cate->term_id;?>"><?php echo $cate->name ?></option>
								<?php } ?>
							</select>
					  	</div>

					  	<div class="form-group sorting_box">
					   		<label for="exampleFormControlInput1">Sorting by</label>
					    	<select name="sorting_by" id="sorting_by">
								<option value="" style="font-weight: bold;">-- Select Display by --</option>
								<option value="asc">ASC</option>
								<option value="desc">DESC</option>
							</select>
					  	</div>

					  	<div class="form-group option_box">
					   		<label for="showlist">Option to show list</label>
					    	<select name="display_type" id="display_type">
								<option value="" style="font-weight: bold;">-- Select Display Type --</option>
								<option value="grid">Show Grid</option>
								<option value="list">Show List</option>
								<option value="carousel">Show Carousel</option>
							</select>
					  	</div>

					  	<div class="form-group">
					  		<textarea  rows="5" cols="20" id="area"></textarea>
					  	</div>

					  	<input type="button" id="btn_popup" value="Get code"></input>
			     </form>
			</div>
			
			
			<style>
				#TB_ajaxContent	{
					margin:1%;
				}
				#TB_ajaxContent .form-group label {
				    cursor: pointer;
				    width: 35%;
				    display: inline-block;
				    margin: 11px;
				    padding-left: 4%;
				    font-weight: bold;
				}
				#TB_ajaxContent #btn_popup{
					border: 0;
				    padding: 8px 15px 8px 15px;
				    background: #ff8500;
				    color: #fff;
				    box-shadow: 1px 1px 4px #dadada;
				    -moz-box-shadow: 1px 1px 4px #dadada;
				    -webkit-box-shadow: 1px 1px 4px #dadada;
				    border-radius: 3px;
				    -webkit-border-radius: 3px;
				    -moz-border-radius: 3px;
				        display: block;
					    float: right;
					    margin-top: 3%;
					    margin-right: 12%;
					        cursor: pointer;
				}
				#TB_ajaxContent #btn_popup:hover{
					background: #ea7b00;
					color: #fff;
					transition: 0.4s;
				}
				#TB_ajaxContent .form-group select{
					width: 45%;
				}


				.cate_box,.ListID{
					display: none;
				}
				.wapper_check{
					display: inline-block;
				}
				.ListID{
					margin-top: 1%;
				}
				.form-check {
				    margin-bottom: 7px;
				}
			</style>
		<?php }