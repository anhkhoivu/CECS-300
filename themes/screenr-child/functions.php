<?php //Makes the child theme work
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

	function enqueue_parent_styles() { wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 
	}
	
/**
 * Setup page header cover - story test
 *
 * @return bool
 */
function screenr_page_header_cover_stories()
{

    if ( is_page_template( 'template-frontpage.php' ) ) {
        return false;
    }

    $image = $title = $desc = '';
/*
    if ( is_singular() && ! is_attachment() ) {
        if ( is_single() ) {
            $title = esc_html( get_theme_mod( 'page_blog_title', esc_html__( 'The Blog', 'screenr' ) ) );
        } else {
            $title = get_the_title();
        }
    } elseif ( is_search() ) {
        $title = sprintf( esc_html__( 'Search Results for: %s', 'screenr' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
    } elseif ( ( is_home() || is_front_page() ) && ! is_attachment() ) {
        $title = esc_html( get_theme_mod( 'page_blog_title', esc_html__( 'The Blog', 'screenr' ) ) );
    } elseif ( is_404() ) {
        $title = sprintf( esc_html__( '%s 404 Not Found!', 'screenr' ), '<i class="fa fa-frown-o"></i><br>' );
    } else {
        $title = get_the_archive_title();
        $desc  = get_the_archive_description();
    }
*/
	$title = 'Our Stories';
	
    if ( ! $image ) {
        $image = get_header_image();
    }

    $is_parallax  = true;
    $item = array(
        'position'  => 'center',
        'pd_top'    => get_theme_mod( 'page_header_pdtop') == '' ? 13 : get_theme_mod( 'page_header_pdtop'),
        'pd_bottom' => get_theme_mod( 'page_header_pdbottom' ) == '' ? 13 : get_theme_mod( 'page_header_pdbottom' ) ,
        'title'     => $title,
        'desc'      => $desc,
        'image'     => $image,
    );

    $classes = array(
        'section-slider',
        'swiper-slider',
    );

    if ( $is_parallax ) {
        $classes[] = 'fixed';
    }

    $item = apply_filters( 'screenr_page_header_item', $item );

    if ( $item['image'] ) {
        $classes[] = 'has-image';
    } else {
        $classes[] = 'no-image';
    }

    $classes = apply_filters( 'screenr_page_header_cover_class', $classes );

    ?>
    <section id="page-header-cover" class="<?php echo esc_attr(  join( ' ', $classes ) ); ?>" >
        <div class="swiper-container" data-autoplay="0">
            <div class="swiper-wrapper">
                <?php
                $style = "";
                if ( $item['image'] ) {
                    $style = ' style="background-image: url(\''.esc_url( $item['image'] ).'\');" ';
                }

                $html = '<div class="swiper-slide slide-align-'.esc_attr( $item['position'] ).'"'.$style.'>';

                $style  = '';
                if  ( $item['pd_top'] != '' ) {
                    $style .='padding-top: '.floatval( $item['pd_top'] ).'%; ';
                }
                if  ( $item['pd_bottom'] != '' ) {
                    $style .='padding-bottom: '.floatval( $item['pd_bottom'] ).'%; ';
                }
                if ( $style != '' ) {
                    $style = ' style="'.$style.'" ';
                }
                $html .= '<div class="swiper-slide-intro">';
                $html .= '<div class="swiper-intro-inner"'.$style.'>';
                if ( $item['title'] ) {
                    $html .= '<h2 class="swiper-slide-heading">'.wp_kses_post( $item['title'] ).'</h2>';
                }
                if ( $item['desc'] ) {
                    $html .= '<div class="swiper-slide-desc">'.apply_filters( 'screenr_content_text', $item['desc'] ).'</div>';
                }

                $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="overlay"></div>';
                $html .= '</div>';

                echo $html;
                ?>
            </div>
        </div>
    </section>
    <?php
}

add_action( 'screenr_after_site_header_stories', 'screenr_page_header_cover_stories' );
//asd

//facts header banner
/**
 * Setup page header cover - facts
 *
 * @return bool
 */
function screenr_page_header_cover_facts()
{

    if ( is_page_template( 'template-frontpage.php' ) ) {
        return false;
    }

    $image = $title = $desc = '';
/*
    if ( is_singular() && ! is_attachment() ) {
        if ( is_single() ) {
            $title = esc_html( get_theme_mod( 'page_blog_title', esc_html__( 'The Blog', 'screenr' ) ) );
        } else {
            $title = get_the_title();
        }
    } elseif ( is_search() ) {
        $title = sprintf( esc_html__( 'Search Results for: %s', 'screenr' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
    } elseif ( ( is_home() || is_front_page() ) && ! is_attachment() ) {
        $title = esc_html( get_theme_mod( 'page_blog_title', esc_html__( 'The Blog', 'screenr' ) ) );
    } elseif ( is_404() ) {
        $title = sprintf( esc_html__( '%s 404 Not Found!', 'screenr' ), '<i class="fa fa-frown-o"></i><br>' );
    } else {
        $title = get_the_archive_title();
        $desc  = get_the_archive_description();
    }
*/
	$title = 'The Facts';
	
    if ( ! $image ) {
        $image = get_header_image();
    }

    $is_parallax  = true;
    $item = array(
        'position'  => 'center',
        'pd_top'    => get_theme_mod( 'page_header_pdtop') == '' ? 13 : get_theme_mod( 'page_header_pdtop'),
        'pd_bottom' => get_theme_mod( 'page_header_pdbottom' ) == '' ? 13 : get_theme_mod( 'page_header_pdbottom' ) ,
        'title'     => $title,
        'desc'      => $desc,
        'image'     => $image,
    );

    $classes = array(
        'section-slider',
        'swiper-slider',
    );

    if ( $is_parallax ) {
        $classes[] = 'fixed';
    }

    $item = apply_filters( 'screenr_page_header_item', $item );

    if ( $item['image'] ) {
        $classes[] = 'has-image';
    } else {
        $classes[] = 'no-image';
    }

    $classes = apply_filters( 'screenr_page_header_cover_class', $classes );

    ?>
    <section id="page-header-cover" class="<?php echo esc_attr(  join( ' ', $classes ) ); ?>" >
        <div class="swiper-container" data-autoplay="0">
            <div class="swiper-wrapper">
                <?php
                $style = "";
                if ( $item['image'] ) {
                    $style = ' style="background-image: url(\''.esc_url( $item['image'] ).'\');" ';
                }

                $html = '<div class="swiper-slide slide-align-'.esc_attr( $item['position'] ).'"'.$style.'>';

                $style  = '';
                if  ( $item['pd_top'] != '' ) {
                    $style .='padding-top: '.floatval( $item['pd_top'] ).'%; ';
                }
                if  ( $item['pd_bottom'] != '' ) {
                    $style .='padding-bottom: '.floatval( $item['pd_bottom'] ).'%; ';
                }
                if ( $style != '' ) {
                    $style = ' style="'.$style.'" ';
                }
                $html .= '<div class="swiper-slide-intro">';
                $html .= '<div class="swiper-intro-inner"'.$style.'>';
                if ( $item['title'] ) {
                    $html .= '<h2 class="swiper-slide-heading">'.wp_kses_post( $item['title'] ).'</h2>';
                }
                if ( $item['desc'] ) {
                    $html .= '<div class="swiper-slide-desc">'.apply_filters( 'screenr_content_text', $item['desc'] ).'</div>';
                }

                $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="overlay"></div>';
                $html .= '</div>';

                echo $html;
                ?>
            </div>
        </div>
    </section>
    <?php
}

add_action( 'screenr_after_site_header_facts', 'screenr_page_header_cover_facts' );



?>