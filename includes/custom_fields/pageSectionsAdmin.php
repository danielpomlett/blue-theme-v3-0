<?php
function add_post_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Page sections', // $title
		'show_post_fields_meta_box', // $callback
		array('post', 'page'), // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_post_fields_meta_box' );

function show_post_fields_meta_box() {
global $post;  
	$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

<p class="adminDesc">Check this box to make the first section sit at the top of the page above the content area...</p>
<p>
<label for="your_fields[make_first_section_the_introduction]">
	<input type="checkbox" name="your_fields[make_first_section_the_introduction]" value="checkbox" <?php if ( $meta['make_first_section_the_introduction'] === 'make_first_section_the_introduction' ) echo 'checked'; ?>>Make first section the introduction?
</label>
</p>

<script type="text/javascript">
jQuery(document).ready(function( $ ){
	$( '#add-row' ).on('click', function() {
		var row = $( '.repeater.empty-row.screen-reader-text' ).clone(true);
		row.removeClass( 'empty-row screen-reader-text' );
		row.insertBefore( '#repeaterWrapper .repeater:last' );
		return false;
	});
	
	$( '.remove-row' ).on('click', function() {
		$(this).parents('.repeater').remove();
		return false;
	});
});
</script>

<div id="repeaterWrapper">
	<?php
	if ( $repeatable_fields ) :
	foreach ( $repeatable_fields as $field ) {
	?>
	<?php
	} endif; ?>
	<div class="repeater empty-row screen-reader-text">
		<div class="repeaterPadding">
			<div class="sectionDivider">
			    <p class"adminTitle">Section type</p>
			    <p class="adminDesc">Choose the type of section you want to add.</p>
			    <p>
				    <select name="your_fields[section_type]" id="your_fields[section_type]">
						<option value="textCenter" <?php selected( $meta['select'], 'textCenter' ); ?>>Text center/image center</option>
						<option value="textLeft" <?php selected( $meta['select'], 'textLeft' ); ?>>Text left/image right</option>
						<option value="textRight" <?php selected( $meta['select'], 'textRight' ); ?>>Text right/image left</option>
						<option value="services" <?php selected( $meta['select'], 'services' ); ?>>Services breakdown</option>
						<option value="carousel" <?php selected( $meta['select'], 'carousel' ); ?>>Carousel</option>
						<option value="testimonials" <?php selected( $meta['select'], 'testimonials' ); ?>>Testimonials</option>
					</select>
				</p>
			</div>
			<div class="sectionDivider">
				<p class"adminTitle">Light or dark?</p>
				<p class="adminDesc">Choose whether this section should be light or dark in tone...</p>
				<p>
					<select name="your_fields[light_or_dark]" id="your_fields[light_or_dark]">
						<option value="light" <?php selected( $meta['select'], 'light' ); ?>>Light</option>
						<option value="dark" <?php selected( $meta['select'], 'dark' ); ?>>Dark</option>
					</select>
				</p>
			</div>
			<div class="sectionDivider">
				<p>
				    <label for="your_fields[background_image]">Background image</label>
				    <br/><i>Add a background image if required...</i><br/>
				    <input type="text" name="your_fields[background_image]" id="your_fields[background_image]" class="meta-image regular-text" value="<?php echo $meta['background_image']; ?>">
				    <input type="button" class="button image-upload" value="Browse">
				</p>
			  	<div class="image-preview"><img src="<?php echo $meta['intro_image']; ?>" style="max-width: 250px;"></div>
			  	
			  	<p class"adminTitle">Fixed background image</p>
				<p class="adminDesc">Fix the background image on scroll?...</p>
				<p>
					<select name="your_fields[fixed_background_image]" id="your_fields[fixed_background_image]">
						<option value="nonFixed" <?php selected( $meta['select'], 'nonFixed' ); ?>>No</option>
						<option value="fixed" <?php selected( $meta['select'], 'fixed' ); ?>>Yes</option>
					</select>
				</p>
			</div>
			<div class="sectionDivider">
				<p class"adminTitle">
					<label for="your_fields[section_header]">Section header</label>
				</p>
				<p class="adminDesc">Add a header to this section if required...</p>
				<p>
		   		 <input type="text" name="your_fields[section_header]" id="your_fields[section_header]" class="regular-text" value="<?php echo $meta['section_header']; ?>">
		   		</p>
		   	</div>
		   	<div class="sectionDivider">
				<p><a class="button remove-row" href="#">Remove section</a></p>
			</div>
		</div>
	</div>
</div>

<p><a id="add-row" class="button" href="#">Add a section</a></p>

<p>
    <label for="your_fields[text]">Input Text</label>
    <br>
    <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php echo $meta['text']; ?>">
  </p>
  <p>
    <label for="your_fields[textarea]">Textarea</label>
    <br>
    <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
  </p>
  <p>
    <label for="your_fields[select]">Select Menu</label>
    <br>
    <select name="your_fields[select]" id="your_fields[select]">
				<option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Option One</option>
				<option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Option Two</option>
		</select>
  </p>
  <p>
    <label for="your_fields[intro_image]">Image Upload</label><br>
    <input type="text" name="your_fields[intro_image]" id="your_fields[intro_image]" class="meta-image regular-text" value="<?php echo $meta['intro_image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['intro_image']; ?>" style="max-width: 250px;"></div>
  <script>
	jQuery(document).ready(function(){
		// Image upload on custom fields
		var meta_image_frame;
		  // Runs when the image button is clicked.
		  jQuery('.image-upload').click(function (e) {
		    // Get preview pane
		    var meta_image_preview = jQuery(this).parent().parent().children('.image-preview');
		    // Prevents the default action from occuring.
		    e.preventDefault(); 
		    var meta_image = jQuery(this).parent().children('.meta-image');
		    // If the frame already exists, re-open it.
		    if (meta_image_frame) {
		      meta_image_frame.open();
		      return;
		    }
		    // Sets up the media library frame
		    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
		      title: meta_image.title,
		      button: {
		        text: meta_image.button
		      }
		    });
		    // Runs when an image is selected.
		    meta_image_frame.on('select', function () {
		      // Grabs the attachment selection and creates a JSON representation of the model.
		      var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
		      // Sends the attachment URL to our custom image input field.
		      meta_image.val(media_attachment.url);
		      meta_image_preview.children('img').attr('src', media_attachment.url);
		    });
		    // Opens the media library frame.
		    meta_image_frame.open();
		  });
	});
	</script>
<?php }

function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	
	$old = get_post_meta( $post_id, 'your_fields', true );
	$new = $_POST['your_fields'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'your_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'your_fields', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );?>