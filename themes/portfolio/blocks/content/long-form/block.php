<section id="content-long-form" class="<?php echo $block['id'] ?>">
  
  <div class="container-outer">
    <div class="content-inner">
      
      <aside>
        <h2>
          <?php the_field('content_long_form_title'); ?>
        </h2>
      </aside>
      
      <main>
        
        <?php if( have_rows('content_long_form_sections') ): ?>
        <?php while ( have_rows('content_long_form_sections') ) : the_row(); ?>
        
        <section class="long-form-section">
          
          <h3 class="section-title">
            <?php the_sub_field('title'); ?>
          </h3>
          
          <div class="articles">
          
            <?php if( have_rows('section_item') ): ?>
            <?php while ( have_rows('section_item') ) : the_row(); ?>
            
              <?php if( !get_sub_field('type_of_article') ): ?>
                
                <?php 
                  $selected_post = get_sub_field('internal_article');
                  $post_title = get_the_title($selected_post);
                  $post_excerpt = get_the_excerpt($selected_post);
                  $post_permalink = get_the_permalink($selected_post);
                ?>
                
                <article class="internal-article">
                  <a href="<?php echo $post_permalink ?>">
                    <h3><?php echo $post_title ?></h3>
                  </a>
                  <?php echo $post_excerpt ?>
                </article>
                
              <?php else: ?>
                
                <article class="external-article">
                  <?php the_sub_field('external_article')?>
                </article>
                
              <?php endif; ?>
            
            <?php endwhile; ?>
            <?php endif; ?>
            
          </div>  
          
        </section>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
      </main>
      
    </div>
  </div>
  
</section>