<?php

/*
Template name: Cart Template
*/

get_header();
?>

<div class="hero-wrap hero-bread container" style="background-image: url('<?php echo get_template_directory_uri() . "/assets/images/bg_6.jpg"; ?>)">

    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate w-100">
            <?php woocommerce_breadcrumb(); ?>
            <h1 class="mb-0 bread"><?php the_title(); ?></h1>


        </div>
    </div>






    <?php
    while (have_posts()) :
        the_post();

        the_content();

    endwhile; // End of the loop.
    ?>
</div>
<?php

get_footer();
