<?php get_header(); ?>
<div class="container-w m-auto">
    <h1>
        <a href="<?= home_url();?>/works/" style="display:inline-block;">
    <img src="<?= home_url();?>/wp-content/themes/yurt/assets/images/arrowleft.png" alt="arrowleft" class="arrowleft">
    </a>    
    <?= the_title();?></h1>
    <div class="line-post"></div>
    <img class="img-fluid post-img" src="<?= get_field('work_cover');?>" alt="wor-img" srcset="">
    <p class="light-gray-title">Description</p>
<p><?= the_content();?></p>
</div>
<?php get_footer(); ?>