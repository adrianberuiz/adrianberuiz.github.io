<?php 
//$the_query = new WP_Query( 'category_name=works,pagina_web'); ?>
  <?php if($the_query -> have_posts()) : while ($the_query -> have_posts()): $the_query -> the_post();?>

<!--Codigo que se ejecutara cuando se encuentren articulos-->
    <?php 
    if (has_post_thumbnail()) {
      $image = wp_get_attachment_url(get_post_thumbnail_id( $page_id ));
    } 
    $imageContent = get_the_content();
    $stripped = strip_tags($imageContent, '<p> <a>');
    
    ?>

    <div class="item">
     <img src="<?php echo $image;?>" alt="">
     <a href="<?php echo $stripped; ?>" class="info">
        <div class="detalles">
          <?php 
          $categories = get_the_category();
          
          if ( ! empty( $categories ) ) {
              echo "<p> ".$categories[0]->name."</p>"; 
          }
          ?>
          <h4><?php the_title();?></h4>
        </div>
     </a>
   </div>
  <?php endwhile;else: ?>

<?php endif; ?>