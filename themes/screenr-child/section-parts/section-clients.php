<?php
$title      = get_theme_mod( 'clients_title' );
$subtitle   = get_theme_mod( 'clients_subtitle', esc_html__( 'We had been featured on', 'screenr' ) );
$desc       = get_theme_mod( 'clients_desc' );
$classes = 'section-clients section-padding section-padding-lg screenr-section';
?>
<?php if ( ! screenr_is_selective_refresh() ) { ?>
<section id="<?php echo esc_attr( get_theme_mod( 'clients_id', 'clients' ) ); ?>" class="<?php echo esc_attr( apply_filters( 'screenr_section_class', $classes, 'clients' ) ); ?>">
<?php } ?>
    <div class="container">
        <?php if (  $title || $subtitle || $desc ) { ?>
        <div class="section-title-area">
            <?php if ( $subtitle ) { ?><div class="section-subtitle"><?php echo esc_html( $subtitle ); ?></div><?php } ?>
            <?php if ( $title ) { ?><h2 class="section-title"><?php echo esc_html( $title ); ?></h2><?php } ?>
            <?php if ( $desc ) { ?><div class="section-desc"><?php echo apply_filters( 'screenr_content_text', $desc ); ?></div><?php } ?>
        </div>
        <?php } ?>
        <?php
        $items = get_theme_mod( 'clients_items' );

        if ( is_array( $items ) && ! empty( $items ) ) {
            $layout = absint( get_theme_mod( 'clients_layout', 5 ) );
            if ( $layout == 0 ){
                $layout = 5;
            }
            ?>
            <div class="section-client-content">
                <div class="clients-wrapper client-6-cols"> <!-- <?php echo esc_attr( $layout ); ?> -->
                    <?php
                    $count = 0;
                    foreach ( $items as $item ){
                        $item = wp_parse_args( $item, array(
                            'title' => '',
                            'image' => '',
                            'url'   => '',
                        ) );

                        $image =  screenr_get_media_url( $item['image'] );
                        if ( ! $image ){
                            continue;
                        }
                        ?>
                        <div class="client-col" id="client<?php echo $count?>" title="<?php echo esc_attr( $item['title'] ); ?>">
                            <?php if ( $item['url'] ){ ?><a title="<?php echo esc_attr( $item['title'] ); ?>" href="<?php echo esc_url( $item['url'] ); ?>"><?php } ?>
                            <img src="<?php echo esc_url( $image ) ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                            <?php if ( $item['url'] ){ ?></a><?php } ?>
                        </div>
                        <?php
                        $count++;
                    }// end loop items
                    //this section is for extra activist
                    ?>
                    <div class="client-col" id="client5" title="Nyle DiMarco Foundation">
                        <a title="Nyle DiMarco Foundation" href="https://nyledimarcofoundation.com/about/">
                        <img src="/wp-content/uploads/2016/11/NDF-Logo.png" alt="Nyle DiMarco Foundation">
                        </a>
                    </div>
                    <!-- end extra activist -->
                    
                </div><!-- /.clients-wrapper -->
            </div>
            <?php
            wp_reset_postdata();
        }
        ?>
    </div>
<?php if ( ! screenr_is_selective_refresh() ) { ?>
</section>
<?php } ?>
