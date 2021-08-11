<?php 

function listarPosts(){

    $args = [
        'post_type' => 'post', //Listando os posts
        'posts_per_page' => 2, //Vai exibir apenas 2 posts por página
        'paged' => 1 //Exibe primeiramente a página 1
    ];

    $posts = new WP_Query($args); //Loop para consultar os posts 

    $totalPages = $posts->max_num_pages; //Consulta o número total de posts existentes.

?>
    <?php if($posts->have_posts()): ?><!-- Se existir posts -->
            <div class="itens">
                <?php while($posts->have_posts()): $posts->the_post(); ?><!-- Lista cada post que tem no loop -->
                <!-- item -->
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <h4><?php the_title(); ?></h4> <!-- Lista o título do post -->
                            <?php the_excerpt(); ?><!-- Lista apenas o resumo do post -->
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus reiciendis excepturi nulla nesciunt voluptatum ipsum numquam, obcaecati, suscipit fugiat sequi, est repellat iste, unde eveniet vitae blanditiis quos eos tempora!</p>-->
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-detalhes" data-toggle="modal" data-target="#detalhes-post">Leia mais</button>
                            <button type="button" class="btn btn-sm btn-info btn-curtir"><span class="text">Gostei</span> <span class="badge badge-light">0</span></button>
                        </div>
                    </div>
                </div>
                <!-- fim item -->
                <?php endwhile; ?><!-- Fim while -->
            </div>  
            <?php if($totalPages > 0): ?>
            <!-- paginacao -->
            <section class="paginacao">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for($i=1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?php echo ($i == 1)? 'active' : '' ?>"><span class="page-link"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </section>
		    <!-- fim paginacao --> 
            <?php endif ?> 
        <?php else : ?><!-- Se não existir posts -->
            <div class="alert alert-danger text-center">Nenhum conteúdo encontrado.</div>
        <?php endif ?>
    <?php

    exit;
}

add_action('wp_ajax_listarPosts', 'listarPosts');
add_action('wp_ajax_nopriv_listarPosts', 'listarPosts');