<?php

/*********************************************
* INCLUDES
**********************************************/

include('_ajax/listar-posts.php'); //Incluindo as funções do ajax do php que estão nesse arquivo
include('_ajax/detalhes-post.php');
include('_ajax/curtir-post-toggle.php');

include("_inc/limpar-codigo.php");

/*********************************************
* ASSETS
**********************************************/

function app_scripts() {

	// assets folder

	$css_folder =  get_template_directory_uri() . '/_assets/_css';
	$js_folder	=  get_template_directory_uri() . '/_assets/_js';

	// versão
	$versao 	= rand(0,999); //Faz um sorteio entre 0 e 999


	// jQuery
	
	//wp_enqueue_script( 'jquery', $js_folder . './jquery.js', null, $versao, true );
	wp_enqueue_script('jquery');


	// bootstrap
	wp_enqueue_script( 'popper', $js_folder . '/popper.min.js', null, 1, true );
	wp_enqueue_script( 'bootstrap', $js_folder . '/bootstrap.js', null, 1, true );
	wp_enqueue_style( 'bootstrap', $css_folder . '/bootstrap.css', 1, 1, 'all' );

	// tema
	
	wp_enqueue_style( 'theme', get_stylesheet_uri(), 1, $versao, 'all' );
	wp_enqueue_script( 'app', $js_folder . '/app.js', null, $versao, true ); //Chamando o arquivo app.js e atribuindo uma variável que sorteia um numero diferente para identificação de cache
	
	$wpVars = [
		'ajaxurl' => admin_url('admin-ajax.php'),
	];

	wp_localize_script( 'app', 'wp', $wpVars );
}

add_action("wp_enqueue_scripts", "app_scripts");