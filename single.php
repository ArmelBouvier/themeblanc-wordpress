<?php get_header(); ?>

    <div class="container">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h1><?php the_title();?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><?php the_post_thumbnail('thumbnail');?></div>
                    <div class="col-md-6"><?php the_content();?></div>
                </div>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>

<?php get_footer(); ?>