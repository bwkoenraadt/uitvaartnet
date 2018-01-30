<?php

	function create_creditcard_post_type(){
		register_post_type("verzekeraar",
			array(
				"labels" => array(
					"name" => __("Verzekeraar's"),
					"singular_name" => __("verzekeraar")
					),
				"public" => true,
				"rewrite" => array("slug" => "verzekeraar"),
				"has_archive" => true,
				"menu_icon" => get_template_directory_uri() . "/assets/images/custom-post-verzekeraar-icon.png",
				"supports" => array('title',
									'editor',
									'comments',
									'excerpt',
									'revisions',
									'thumbnail',
									'revisions' )
				)
			);
	}

	add_action("init", "create_creditcard_post_type");


	function create_uitvaartverzekering_post_type(){
		register_post_type("uitvaartverzekering",
			array(
				"labels" => array(
					"name" => __("uv"),
					"singular_name" => __("uv")
					),
				"public" => true,
				"rewrite" => array("slug" => "uitvaartverzekering"),
				"has_archive" => true,
				"menu_icon" => get_template_directory_uri() . "/assets/images/custom-post-vragen-icon.png",
				"supports" => array('title',
									'editor',
									'comments',
									'excerpt',
									'revisions',
									'thumbnail',
									'revisions' )
				)
			);
	}

	add_action("init", "create_uitvaartverzekering_post_type");


	function create_uitvaartverzekering_tax() {
		register_taxonomy(
			'v_tax',
			'uitvaartverzekering',
			array(
				'label' => __( 'Categorie' ),
				'rewrite' => array( 'slug' => 'categorie' ),
				'hierarchical' => true
			));
	}

	add_action( 'init', 'create_uitvaartverzekering_tax' );


	function create_overlijdensrisicoverzekering_post_type(){
		register_post_type("orv",
			array(
				"labels" => array(
					"name" => __("orv"),
					"singular_name" => __("orv")
					),
				"public" => true,
				"rewrite" => array("slug" => "overlijdensrisicoverzekering"),
				"has_archive" => true,
				"menu_icon" => get_template_directory_uri() . "/assets/images/custom-post-vragen-icon.png",
				"supports" => array('title',
									'editor',
									'comments',
									'excerpt',
									'revisions',
									'thumbnail',
									'revisions' )
				)
			);
	}

	add_action("init", "create_overlijdensrisicoverzekering_post_type");


	function create_overlijdensrisicoverzekering_tax() {
		register_taxonomy(
			'orv_tax',
			'orv',
			array(
				'label' => __( 'Categorie' ),
				'rewrite' => array( 'slug' => 'categorie' ),
				'hierarchical' => true
			));
	}

	add_action( 'init', 'create_overlijdensrisicoverzekering_tax' );
?>
