<?php get_header();?>
<main class="body-container">
  <div class="container">
    <div class="row">
      <div class="col-md-9 on-content-area">
	<!-- artikel -->
    <?php 
if (have_posts()) :
    while(have_posts()) : the_post(); ?>
        <article>
            <header class="header-post">
                <h2 class="title-post">
                       <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h2>
            </header>
            <div class="post-meta">
                    <span class="date-post">
                      <em class="glyphicon glyphicon-time"></em>
                      Diposting pada
                      <?php the_time ('g:i a, D, j F y');?>
                    </span>
                    <span class="author-post">
                      <em class="glyphicon glyphicon-user"></em>
                      oleh
                      <?php the_author();?>
                    </span>
                    <span class="categories">
                      <em  class="glyphicon glyphicon-tag"></em>
                      dalam
                      <?php the_category();?>
                    </span>
                </div>
            <div class="entry">
                <?php the_excerpt();?>
            </div>
        </article>
    <?php
    endwhile;
else : ?>
    <article>
        <header class="title-post">
            <h1>Oops!! Artikel Tidak Ditemukan</h1>
        </header>
    </article>
<?php endif;?>
      </div>
      <?php get_sidebar();?>
   </div>
</div>
</main>
<?php get_footer();?>