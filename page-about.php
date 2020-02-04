<?php
get_header();
?>

<div class="my-container">
<?php
while(have_posts()): the_post();
?>

<div class="about-page">
<h1><?php the_title();?></h1>
<p><?php the_content();?></p>
</div>

<?php
endwhile;
?>
</div>

<div class="about-page-contact-social my-container mx-auto">
    <div class="row">
    <div class="about-page-contact col">
        <?php
        if(is_active_sidebar('travio_widgets_footer')):
            dynamic_sidebar('travio_widgets_footer');
        endif;
        ?>
    </div>
    
    <div class="about-page-social col">
        <h3>Social</h3>
        <?php
        if(is_active_sidebar('travio_widgets_social')):
            dynamic_sidebar('travio_widgets_social');
        endif;
        ?>
    </div>
    </div>
</div>

<?php
get_footer();
?>