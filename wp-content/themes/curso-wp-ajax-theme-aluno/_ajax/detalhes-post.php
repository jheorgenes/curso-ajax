<?php 

function detalhesPost(){

    echo "Detalhes do post carregado!!!";
    
    exit;
}

add_action('wp_ajax_detalhesPost', 'detalhesPost');
add_action('wp_ajax_nopriv_detalhesPost', 'detalhesPost');