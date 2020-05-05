<?php get_header(); ?>
    <section class="last-news">
        <div class="container">
			<?php $args = [
				'post_type' => 'post',
				'post_per_page' => 4,
				'orderby' => 'date',
				'order' => 'DESC'
			];
			$ma_boucle = new WP_Query($args);
			$i = 0;
			// Si j'ai des articles
			if ($ma_boucle->have_posts()) :
				?>
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
						<?php while ($ma_boucle->have_posts()) : $ma_boucle->the_post(); ?>
                            <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i; ?>"
                                class="<?= $i === 0 ? 'active' : ''; ?>"></li>
							<?php $i++; endwhile; ?>
                    </ol>
                    <div class="carousel-inner">
						<?php
						$i = 0;
						while ($ma_boucle->have_posts()) : $ma_boucle->the_post();
							?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : ''; ?>">
                                <div class="row">
                                    <div class="col-12 col-md-6">
										<?= has_post_thumbnail() ? the_post_thumbnail('medium') : '<img src="https://placedog.net/250/250">' ?>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
                                        <a href="<?= get_permalink(); ?>" class="btn btn-primary">Lire la suite</a>
                                    </div>
                                </div>
                            </div>
							<?php $i++; endwhile; ?>
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
			<?php endif; ?>
        </div>
    </section>
    <section class="container mt-5">
        <div class="row">
			<?php $args = ['post_type' => 'portfolio', 'post_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC'] ?>
			<?php $portfolio = new WP_Query($args);
			if ($portfolio->have_posts()) :
				while ($portfolio->have_posts()) : $portfolio->the_post();
					?>
                    <div class="col-12 col-md-4 text-center">

                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: 'https://placehold.it/250x150' ?>" alt="">
                        <a href="<?= get_permalink(get_the_ID())?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
						<?php the_excerpt(); ?>
                    </div>
				<?php endwhile; endif; ?>
        </div>
    </section>
    <section class="informations">
        <h2 class="text-center">Informations</h2>
    </section>
    <section class="container">
        <div class="row">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-md-6">
						<?php the_post_thumbnail('medium'); ?>
                    </div>
                    <div class="col-12 col-md-6">
						<?php the_content(); ?>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>