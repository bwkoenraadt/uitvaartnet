<?php 
// [lees-meer id=123,456 title="nieuwe titel" text="nieuwe bijschrift" img="http://www.url.naar/nieuwe-afbeelding.jpg" no-date=1]
// id verplicht!
function lees_meer_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'id' 		=> 0,
        'title' 	=> 0,
		'text' 		=> 0,
		'img'		=> 0,
		'read-more-text'	=> 0,
    ), $atts );
	
	if($a['id']){
		
		if($a['read-more-text']){
			$read_more_text = $a['read-more-text'];
		}else{
			$read_more_text = 'Lees ook';
		}
		
		$html .= '<div class="read-more"><h2 class="blue-sub"><strong>' . $read_more_text . '</strong></h2>'; 
		
		foreach(explode(',', $a['id']) as $id){

			$the_post = get_post($id);
			
			if($a['title']){
				$title = $a['title'];
			}else{
				$title = $the_post->post_title;
			}
			
			if($a['text']){
				$text = $a['text'];
			}else{
				$text = get_field("intro", $id);
			}
			
			if($a['img']){
				$img = $a['img'];
			}else{
				$img = get_field('thumbnail', $id);
				$img = wp_get_attachment_image_src( $img, 'thumbnail' );	
				$img = $img[0];;	
			}
			
			
			$html .= '
					<div class="news-article">
						<div class="news-img"></div>
						<div class="news-info">
							<a href="' . get_permalink($id) . '">
								<h3 class="news-title">' . $title . '</h3>
							</a>
							<span class="date-posted">' . $date . '</span>
							<p class="news-desc">
								' . $text  . '
							</p>
						</div>
						<a href="' . get_permalink($id) . '">
							<img class="caret-right hidden-xs" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/caret-right-gray.png" />
						</a>
					</div>';
			}
			
		$html .= '</div>';
		
		return $html;
	
	}else{
	    return '';
	}
}
add_shortcode( 'lees-meer', 'lees_meer_shortcode' );
?>