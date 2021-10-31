<?php
/**
 * imgwithcontent Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function img_with_content_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {
// Create id attribute allowing for custom "anchor" value.
    $id = 'img_with_content_gutenberg_'.$block['id'];
    //print_r
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
    $className = 'img-with-content-block';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    if( !empty($block['align_text']) ) {
        $className .=  $block['align_text'];
    }
    if( !empty($block['align_content']) ) {
        $className .=  $block['align_content'];
    }
    $enable_layout = get_field('use_second_layout');
    //print_r($slider_enable);
    if($enable_layout == 1){
        $enable = 'load-other-layout';
    }else{
        $enable = '';
    }

    // Load values and assign defaults.
        $title_sco = get_field('heading_scoping');
        $summary = get_field('summary_text_scop');
        $body_text = get_field('body_text');
        $link_btn = get_field('link_btn_scope');
   
?>
<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
    <div class="imgwith-content <?php echo $enable; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="iwt-content">
                        <?php if(!empty($title_sco)):?>
                        <h2><?php echo $title_sco;?></h2>
                        <?php endif;?>

                        <?php if(!empty($summary)):?>
                        <p class="body-text">
                            <?php echo $summary;?>
                            <span class="readmore-btn">
                                Read more
                            </span>
                        </p>
                        <?php endif;?>
                        <!-- /.body-text -->
                        <?php if(!empty($body_text)):?>
                        <p class="redmore-text">
                            <?php echo $body_text;?>
                        </p>
                        <!-- /.redmore-text -->
                        <?php endif; ?>
                        <?php 
                        if(!empty($link_btn)): 
                            $link_url = $link_btn['url'];
                            $link_title = $link_btn['title'];
                            $link_target = $link_btn['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="default-btn text-uppercase" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    <!-- /.iwt-content -->
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="iwc-img">
                        <?php 
                        $images_scope = get_field('images_scope');
                        if( !empty( $images_scope ) ): ?>
                        <img src="<?php echo esc_url($images_scope ['url']); ?>" alt="<?php echo esc_attr($images_scope['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <!--iwt-img-->
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.imgwith-content -->
</section>
<?php } ?>