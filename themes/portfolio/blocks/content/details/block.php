<section id="content-details" class="<?php echo $block['id'] ?>">
  
  <div class="container-outer">
    <div class="content-inner">
      
      <aside>
        <h2>
          <?php the_field('content_details_title'); ?>
        </h2>
      </aside>
      
      <main>
        
        <?php if( have_rows('content_details_sections') ): ?>
        <?php while ( have_rows('content_details_sections') ) : the_row(); ?>
        
        <section class="details-section">
          <h3 class="section-title">
            <?php the_sub_field('title'); ?>
          </h3>
          <div class="section-text">
            <?php the_sub_field('text'); ?>
          </div>
        </section>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
      </main>
      
    </div>
  </div>
  
</section>