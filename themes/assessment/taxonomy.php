<?php 
/**
 * Template Name: Shop Page
 */
get_header();?>
<div class="container">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'employees',       
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
        $posts = new WP_Query( $args );
        if ( $posts -> have_posts() ):
            while ( $posts -> have_posts() ): 
                $posts->the_post();
        ?>

                <div class="col mb-5">
                    <div class="card h-100" style="width: 18rem;">
                    
                        <div class="d-flex justify-content-center img-thumbnail img-fluid">
                            <?php the_post_thumbnail('thumbnail');?>
                        </div>
                        <br><p>Department: <?php echo custom_get_terms($post->ID, 'department');?></p>

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h2 class="card-title" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a class="text-decoration-none"href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                <p class="card-text"><?php the_excerpt();?></p>
                                                          
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="<?php the_permalink();?>">View</a></div>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        endif;
            

        wp_reset_query();
        ?>
                
    </div>
</div>
<?php get_footer();?>