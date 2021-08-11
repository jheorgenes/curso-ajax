jQuery(function($){

    /*****************************
     *  Listar Posts             *
     *                           *
     * Requisitos básicos:       *
     * (x) função php            *
     * (x) admin-ajax.php        *
     * () função js              *
     *****************************/

    var listarPostsAjax = function(){
        /* 
         Pra chamar uma função do jquery, é necessário chamar dollar ($), ponto ajax (ajax é uma função)
         Dentro dos parênteses, abre uma chave aonde será passado os parametros como objeto e os valores do objeto. 
        */
        $.ajax({
          //Parametro: valorParametro
            url: wp.ajaxurl, //Objeto e variável recebida do arquivo functions.php  através da função wp_localize_script
            type: 'GET', //Método GET passado para realizar a requisição.
            data:{ //Parametro definido como array, para realizar uma ou várias ações.
                action: 'listarPosts' //Parametro action busca a função listarPosts que está dentro do arquivo listar-posts.php da pasta _ajax
            },
            beforeSend: function(){ //Permite passar para o usuário uma ação, antes de executar a função
                $('.progress').removeClass('d-none'); //Adicionando a barra de progresso ao remover a class d-none
            }
        })
        .done(function(resposta){ //Executa depois do ajax, a função. Está sendo recebido como parametro, a resposta da função listarPosts do ajax
            $('.progress').addClass('d-none'); //Removendo a barra de progresso ao adicionar a classe d-none
            $('#lista-posts').html(resposta); //Exibindo o HTML da resposta da função listarPosts
        })
        .fail(function(){
            console.log('ooopss... algo deu errado na requisição')
        })

    }

    listarPostsAjax();

    //ação do botão da categoria
    $('.list-group-item').on('click', function(){ //Ao clicar nas categorias
        listarPostsAjax(); //Chama a função ajax de listarPosts
        $('.list-group-item').removeClass('active'); //Encontra o seletor azul (active) de list-group-item e remove
        $(this).addClass('active'); //Coloca o seletor Azul (active) no item que foi clicado.
    });

    //ação do botão paginação
    $('.page-item').on('click', function(){ //Ao clicar no icone paginação
        listarPostsAjax();
        $('.page-item').removeClass('active');
        $(this).addClass('active');
    });

    //Ação do botão Limpar Busca
    $('#btn-limpar').on('click', function(){ //Ao clicar no icone limpar
        listarPostsAjax();
        $(this).addClass('d-none');
        $('#campo-busca').val('');
    });

    //Ação ao digitar uma palavra na busca
    $('#campo-busca').on('keyup', function(){ //Ao apertar uma tecla e soltar, no input buscar
        listarPostsAjax();
        $('#btn-limpar').removeClass('d-none');
    });
    

    /*****************************
     *  Detalhes Post            *
     *****************************/

    var detalhesPostAjax = function(){
        $.ajax({
            
            url: wp.ajaxurl, 
            type: 'GET', 
            data:{ 
                action: 'detalhesPost' 
            },
            beforeSend: function(){ 
                $('.progress').removeClass('d-none');
            }
        })
        .done(function(resposta){ 
            $('.progress').addClass('d-none');
        })
    }
    //detalhesPostAjax();

    //ação do botão leia mais
    $('.btn-detalhes').on('click', function(){
        detalhesPostAjax();
    });

    /*****************************
     * Curtir e descurtir Post   *
     *****************************/

    var curtirPostToggleAjax = function(){
        $.ajax({
            
            url: wp.ajaxurl, 
            type: 'GET', 
            data:{ 
                action: 'curtirPostToggle' 
            },
            beforeSend: function(){ 
                $('.progress').removeClass('d-none');
            }
        })
        .done(function(resposta){ 
            $('.progress').addClass('d-none');
        })
    }

    //curtirPostToggleAjax();

    //Ação do botão Curtir
    $('.btn-curtir').on('click', function(){
        curtirPostToggleAjax();
    });

});