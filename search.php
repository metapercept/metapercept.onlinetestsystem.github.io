<?php
/**
 * The template for displaying Search Results pages.
 *


 */

get_header(); ?>

	<section id="primary" class="content-area boxed">
		<h3 class="section-title">
			<span><?php printf( __( 'Search Results for: %s', 'upright' ), '<span>' . get_search_query() . '</span>' ); ?></span>
		</h3>

		<?php $upright_layout_class = upright_get_option( 'post_layout_default' ) ? upright_get_option( 'post_layout_default' ) : 'two-column'; ?>

		<div id="content" class="site-content group <?php echo esc_attr( $upright_layout_class ); ?>" role="main">

			<?php if ( have_posts() ) : ?>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content' ); ?>

				<?php endwhile; ?>

				<?php upright_pagination(); ?>
				<div class="layout-toggle group">
					<a class="layout-grid" href="#"><?php _e( 'Grid', 'upright' ); ?></a>
					<a class="layout-list" href="#"><?php _e( 'List', 'upright' ); ?></a>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/no-results', 'search' ); ?>

			<?php endif; ?>

		</div>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>