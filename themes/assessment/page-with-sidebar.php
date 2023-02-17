<?php 
/*
Template Name: Page With Sidebar
*/
get_header();?>
        <h1 class='title'>
            <?php if(is_front_page()){ 
                'Home'; 
                } else{wp_title('');
            }?>
        </h1>
<div class="page-sidebar">
    <div class="widget-sidebar">
        <?php get_sidebar();?>
    </div>

    <div class='container'>
        <div class='row'>
            <?php
                if(have_posts()):
                    while(have_posts()):
                        the_post();
            ?>
                        
            <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
            <small>Posted on: <?php the_time('F j, Y');?> at <?php the_time('g:i a')?></small>
            <?php the_category();?>
            <div class="thumbnail-img"><?php the_post_thumbnail('medium');?></div>
            <?php the_excerpt();?>

            <?php endwhile;?>
                    <div class="pagination">
                        <div class="left">
                            <?php previous_posts_link();?>
                        </div>
                        <div class="right">
                            <?php next_posts_link();?>
                        </div>
                    </div>
                <?php else:?>
                    <p><?php _e('Sorry! No Posts were found.');?></p>
        <?php endif;?>
            </div>
        </div>   
    </div>





<?php get_footer();?>