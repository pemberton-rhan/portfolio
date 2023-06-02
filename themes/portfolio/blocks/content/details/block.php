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
          
          <?php if( !get_sub_field('gravity_form') ): ?>
            <div class="section-text txt-container-small">
              <?php the_sub_field('text'); ?>
            </div>
          <?php else: ?>
            <div id="g-form" class="section-form">
              <?php 
                $form_id = get_sub_field('gravity_form');
                gravity_form( $form_id, false, false, false, '', false ); 
              ?>
            </div>
          <?php endif; ?>
          
        </section>
        
        <?php endwhile; ?>
        <?php endif; ?>
        
      </main>
      
    </div>
  </div>
  
</section>