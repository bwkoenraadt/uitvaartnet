<?php
	function breadcrumb() {
		$url = preg_replace('/\?.*/', '',$_SERVER['REQUEST_URI']);
		$urlArray = explode('/', rtrim($url, '/'));

		// Set $dir to the first value
		array_shift($urlArray);

		$dir = home_url();

		$breadcrumb = '<nav class="breadcrumb"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell">
							<ul
						 	itemscope
							itemtype="http://schema.org/BreadcrumbList">
							<li><a itemprop="item" href="' . $dir . '">Home</a><meta itemprop="position" content="1" /></li>';
		$i = 1;
		foreach($urlArray as $text) {
			$dir .= "/" .  $text;

			$e = $i;
			$e++;

			if(sizeof($urlArray) != $i){
				$breadcrumb .= '<li itemprop="itemListElement" itemscope
			       						itemtype="http://schema.org/ListItem">

											<a itemprop="item" href="'.$dir.'">
												<span  itemprop="name">'
													. urldecode(ucfirst(strtr($text, '_-', '  '))) . '
												</span>
											</a>
											<meta itemprop="position" content="' . $e . '" />

									 </li>';
			}else{
				$breadcrumb .= '<li itemprop="itemListElement" itemscope
			      					itemtype="http://schema.org/ListItem">'
											. urldecode(ucfirst(strtr($text, '_-', '  '))) .
										'<meta itemprop="position" content="' . $e . '" />
									</li>';
			}
			$i++;
		}

		$breadcrumb .= '</ul></div></div></div></nav>';
		echo $breadcrumb;
	}

	function shorten_string($string, $wordsreturned, $strip_tags = 1 )
	{
		$retval = $string;
		$array = explode(' ', $string);
		if (count($array)<= $wordsreturned) {
			$retval = $string;
		}
		else {
			array_splice($array, $wordsreturned);
			$retval = implode(' ', $array) ;
		}
		if($strip_tags)
			return strip_tags($retval);
		else
			return $retval;
	}


	function get_help_box() {
		return'
			<!--  / help container \ -->
			<section class="helpBox">

				<div class="row">
					<div class="left-help">
						<h2>Heb je hulp nodig met vergelijken?</h2>
						<span>We zijn tot 17:30 voor jou bereikbaar</span>
					</div>

					<div class="right-help">
						<ul>
							<li><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/phone-img1.png" alt=""><a href="">helpdesk@uitvaartnet.nl</a></li>
							<!-- <li><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/phone-img1.png" alt=""> 010 - 34 000 20</li> -->
						</ul>
					</div>
				</div>

			</section>
			<!--  \ help container / -->';

	}
?>
