<?php get_header(); ?>

    <section class="last-news">
        <div class="container">
            <?php $args = ['post_type' => 'post',
                            'post-per_page' => 4,
                            'orderby' => 'date',
                            'order' => 'DESC'
            ];
            $i = 0; ?>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <?php $ma_boucle = new WP_Query($args);
                    // Je teste si j'ai des articles
                    if ($ma_boucle->have_posts()) :
                        while( $ma_boucle->have_posts()) : $ma_boucle->the_post();
                    ?>
                    <div class="carousel-item <?= $i === 0 ? 'active' : ''; ?>">
                        <img src="https://placehold.it/1280x450" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php the_title();?></h5>
                            <?php the_excerpt();?>
                        </div>
                    </div>
                    <?php $i++; endwhile; endif; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <section class="container pt-5">
        <div class="row">
            <div class="col-md-4"><img src="https://placehold.it/250x150" class="d-block w-100" alt="...">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci enim ipsam maiores
                    nulla odit.</p>
            </div>
            <div class="col-md-4"><img src="https://placehold.it/250x150" class="d-block w-100" alt="...">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci alias cumque eius rem
                    vero.</p>
            </div>
            <div class="col-md-4"><img src="https://placehold.it/250x150" class="d-block w-100" alt="...">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eveniet iure molestias tempore
                    tenetur veritatis.</p>
            </div>
        </div>
    </section>
    <section class="informations">
        <h2 class="text-center">Informations</h2>
    </section>
    <section class="container">
        <div class="row">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-6">
                        <?php the_post_thumbnail('medium');?>
                    </div>
                    <div class="col-md-6">
                        <?php the_content(); ?>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>