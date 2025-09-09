<?php
add_filter( 'render_block_core/paragraph', 'educenter_render_progressbar_block_variation', 10, 2 );
/**
 * Render counter block markup.
 *
 * @since 1.5.2
 *
 * @param string $html  Block html content.
 * @param array  $block Block data.
 *
 * @return string
 */
function educenter_render_progressbar_block_variation( string $html, array $block ): string {
    if ( !array_key_exists('className', $block['attrs']) || $block['attrs']['className'] !== 'is-sp-progressbar' ) {
        return $html;
    }

    $dom = dom( $html );
    $p   = get_dom_element( 'p', $dom );
    
    if ( ! $p ) {
        return $html;
    }

    $defaults = [
        'progressValue' => '10',
        'progressbarLayout' => 'line',
        'progressbarStyle' => 'style1',
        'progressbarTitle' => 'Progressbar',
        'progressCircleSize' => "20",
        "progressColor" => "#000",
        "progressTextColor" => "#fff"
    ];

    $attrs = array_merge($defaults, $block['attrs']);

    // Escape the user inputs to prevent XSS vulnerability
    $escaped_layout = esc_attr($attrs['progressbarLayout']);
    $escaped_value = esc_attr($attrs['progressValue']);
    $escaped_title = esc_html($attrs['progressbarTitle']);
    $escaped_style = esc_attr($attrs['progressbarStyle']);
    $escaped_circle_size = esc_attr($attrs["progressCircleSize"]);
    $escaped_color = esc_attr($attrs["progressColor"]);
    $escaped_text_color = esc_attr($attrs["progressTextColor"]);

    if( $attrs['progressbarLayout'] != 'line') {
        $html = '
         <div class="is-sp-progressbar-wrapper layout-' . $escaped_layout . '" data-progress="' . $escaped_value . '"
            style="--progress-circle-diameter: ' . $escaped_circle_size . 'rem;
            --progress-blue:' . $escaped_color . ';
            --progress-text-color:' . $escaped_text_color . ';">
            <div class="progress" 
                style=" --progress-percent: 0; ">
                <div class="bar-overflow">
                    <div class="bar"></div>
                </div>
                <div class="circle"></div>
                <div class="info">
                    <h2 class="number" data-number="' . $escaped_value . '" data-display="0%"></h2>
                    <p>' . $escaped_title . '</p>
                    <div class="info-arrow"></div>
                </div>
                <div class="min-max">
                    <span>start</span>
                    <span>End</span>
                </div>
            </div>
        </div>';
        return $html;
    }

    $p->setAttribute("class", implode(' ', [ ' ', ...explode(' ', $p->getAttribute('class')) ]));
    $p->setAttribute("data-value", (string) $escaped_value );
    $p->setAttribute("data-layout", (string) $escaped_layout );
    $p->setAttribute("data-style", (string) $escaped_style );
    $p->setAttribute("data-title", (string) $escaped_title );

    $p->textContent = trim( esc_html($p->textContent) );

    $html = $dom->saveHTML();
    return "<div class='is-sp-progressbar-wrapper'>" . $html . "</div>";
}

add_filter( 'educenter_block_inline_css', 'educenter_add_progressbar_support_css', 10, 2 );
/**
 * Conditionally add counter JS.
 *
 * @since 1.5.2
 *
 * @param string $js   Inline js.
 * @param string $html Block html content.
 *
 * @return string
 */
function educenter_add_progressbar_support_css( string $css, string $html ): string {
    /** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'is-sp-progressbar' ) ) {
        
        $dir = dirname( __DIR__, 1 );
		$css .= file_get_contents( $dir . '/assets/css/progress.css' );
	}


	return $css;
}

add_filter( 'educenter_block_inline_js', 'educenter_add_progressbar_support_js', 10, 2 );
function educenter_add_progressbar_support_js( string $js, string $html ): string {
    /** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'is-sp-progressbar' ) ) {
        
		$dir = dirname( __DIR__, 1 );
		$js .= file_get_contents( $dir . '/assets/js/progressbar.js' );
	}


	return $js;
}