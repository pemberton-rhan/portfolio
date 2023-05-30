<section id="content-misc" class="<?php echo $block['id'] ?>">
  
  <div class="container-outer">
    <div class="content-inner">
      
      <aside>
        <h2>
          <?php the_field('content_misc_title'); ?>
        </h2>
      </aside>
      
      <main>
        
        <?php if( have_rows('content_misc_sections') ): ?>
        <?php while ( have_rows('content_misc_sections') ) : the_row(); ?>
        
        <section class="misc-section">
          <h3 class="section-title">
            <?php the_sub_field('title'); ?>
          </h3>
          
          
          
        </section>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
      </main>
      
    </div>
  </div>
  
</section>