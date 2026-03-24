<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finura
 */

get_header();
?>
<!-- HERO SECTION -->
<div class="swiper">
    <div class="swiper-wrapper">
        <?php
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'tax_query'      => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'hero-products',
                ],
            ],
        ];

        $hero_products = new WP_Query($args);

        if ($hero_products->have_posts()) :
            while ($hero_products->have_posts()) :
                $hero_products->the_post();
                $product = wc_get_product(get_the_ID()); ?>
                <div class="swiper-slide bg-home_bg">
                    <div class="container">
                        <div class="hero_container">

                            <!-- Banner -->
                            <div class="hero_content ">
                                <h1><?php the_title(); ?></h1>
                                <p class="pb-3"><?php echo wp_strip_all_tags(get_the_excerpt()); ?></p>
                                <a c href="<?php the_permalink(); ?>" class="btn bg-500 text-white">More details</a>
                            </div>
                            <div>
                                <?php echo $product->get_image('large', ['class' => 'img-fluid']); ?>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <!-- PAGINATION SECTION -->
    <div class="swiper-pagination pb-3"></div>
</div>


<!-- CATEGORY SECTION -->
<main>
    <section class="category">
        <div class="container">
            <div class="category_grid">
                <?php
                $categories = [
                    16, // Small furniture
                    17, // Light fixtures
                    18, // Large furniture
                ];

                foreach ($categories as $index => $cat_id) :
                    $category = get_term($cat_id, 'product_cat');

                    if (!$category || is_wp_error($category)) {
                        continue;
                    }

                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image_url = wp_get_attachment_url($thumbnail_id);
                    $link = get_term_link($category);
                ?>

                    <a class="rounded category_card_<?php echo $index + 1; ?>" href="<?php echo esc_url($link); ?>">
                        <?php if ($image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                        <?php endif; ?>
                    </a>

                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Product popular SECTION -->
    <section class="products-popular py-5">
        <div class="container">

            <h2 class="mb-4">Popular products</h2>

            <?php
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => 4,
                'post_status'    => 'publish',
                'tax_query'      => [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'popular-products',
                    ],
                ],
            ];

            $popular_products = new WP_Query($args);

            if ($popular_products->have_posts()) : ?>
                <div class="row columns-4 g-4">

                    <?php while ($popular_products->have_posts()) :
                        $popular_products->the_post(); ?>

                        <div class="col-12 col-md-6 col-lg-3">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>

                    <?php endwhile; ?>

                </div>
            <?php endif;

            wp_reset_postdata();
            ?>

        </div>
    </section>

    

    <!-- Category highlight  -->

<section class="category_highlights py-5 bg-home_bg">
    <div class="container">

        <?php
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'tax_query'      => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'highlight',
                ],
            ],
        ];

        $highlight_product = new WP_Query($args);

        if ($highlight_product->have_posts()) : ?>

            <div class="row align-items-center g-5">

                <?php while ($highlight_product->have_posts()) :
                    $highlight_product->the_post();
                    global $product;
                ?>

                    <!-- IMAGE -->
                    <div class="col-md-6 position-relative">

                        <?php if (has_post_thumbnail()) : ?>
                            <img 
                                src="<?php the_post_thumbnail_url('large'); ?>" 
                                class="img-fluid rounded"
                                alt="<?php the_title(); ?>"
                            >
                        <?php endif; ?>

                        <?php if ($product->is_on_sale()) : ?>
                            <span class="badge bg-500 position-absolute top-0 end-0 mt-4 me-5 p-2 fs-4">
                                -<?php echo round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100); ?>%
                            </span>
                        <?php endif; ?>

                    </div>

                    <!-- CONTENT -->
                    <div class="col-md-6">

                        <h2 class="mb-3">
                            <?php the_title(); ?>
                        </h2>

                        <p class="text-muted mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 35); ?>
                        </p>

                        <a 
                            href="<?php the_permalink(); ?>" 
                            class="btn bg-500 text-white"
                        >
                            More details
                        </a>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php endif;

        wp_reset_postdata();
        ?>

    </div>
</section>

    <!-- Products best  -->
    <section class="products-best py-5">
        <div class="container">

            <h2 class="mb-4">Best products</h2>

            <?php
            $args = [
                'post_type'      => 'product',
                'posts_per_page' => 4,
                'post_status'    => 'publish',
                'tax_query'      => [
                    [
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'best-products',
                    ],
                ],
            ];

            $best_products = new WP_Query($args);

            if ($best_products->have_posts()) : ?>
                <div class="row g-4">

                    <?php while ($best_products->have_posts()) :
                        $best_products->the_post(); ?>

                        <div class="col-12 col-md-6 col-lg-3">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>

                    <?php endwhile; ?>

                </div>
            <?php endif;

            wp_reset_postdata();
            ?>

        </div>
    </section>

    <!-- Subscribe  -->
    <div class="subscribe">
        <div class="subscribe_container">
            <form action="" method="get" accept-charset="utf-8">

            </form>
        </div>
    </div>
</main>
<?php
get_footer() ?>