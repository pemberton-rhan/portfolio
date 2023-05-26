<section id="hero-primary" class="<?php echo $block['id'] ?>">
  
  <div class="container-outer">
    <div class="container-inner">
      
      <?php if( get_field('hero_primary_eyebrow') ): ?>
        <p class="eyebrow">
          <?php the_field('hero_primary_eyebrow') ?>
        </p>
      <?php endif; ?>
      
      <h1>
        <?php the_field('hero_primary_callout') ?>
      </h1>
      
    </div>
  </div>
  
</section>