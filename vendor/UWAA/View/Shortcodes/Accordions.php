<?php namespace UWAA\View\Shortcodes;
/*
 *  Button shortcode allows for styled buttons to be added to content
 *  [button color='gold' button-type='type' url='link url' small='true']Button Text[/button]
 *  optional small attribute makes the button small.  Assume large if not present
 */

class Accordions
{


    function __construct()
    {
        add_shortcode('accordion-title', array($this, 'accordionTitle'));
        add_shortcode('accordion-content', array($this, 'accordionContent'));
        add_shortcode('accordion-wrapper', array($this, 'accordionWrapper'));
    }



// [faq-title target="#target element for collapse"]
    public  function accordionTitle( $atts, $content="" ) {
        $a = shortcode_atts( array(
            'target' => 'the ID of the element to collapese',
            'open' => 'true/false'
        ), $atts );

        if ($a['open'] == 'true') {
        return "<span class=\"panel\"><div class=\"accordion-heading\" aria-atomic=\"true\" aria-live=\"polite\" ><span class=\"oi oi-minus\"></span><h2>$content</h2><span aria-expanded=\"false\" class=\"indicator\"></div>";
        } else {
            return "<div class=\"panel\"><div class=\"accordion-heading\" aria-atomic=\"true\" aria-live=\"polite\" ><span class=\"oi oi-plus\"></span><h2>$content</h2><span aria-expanded=\"false\" class=\"indicator\"></div>";
        }

    }

    
    public  function accordionContent( $atts, $content="" ) {
        $a = shortcode_atts( array(
            'target' => 'the ID of the element to collapese',
            'open' => 'true/false'
        ), $atts );

        if ($a['open'] == 'true') {
            return "<div class=\"collapse in\" aria-hidden=\"true\"><p>".do_shortcode($content)."</p></div></div>";    
        } else {
            return "<div class=\"collapse\" aria-hidden=\"true\"><p>".do_shortcode($content)."</p></div></div>";
        }
        
        
    }

    
    public  function accordionWrapper($atts, $content="" ) {
    return   '<div id="accordion">'.do_shortcode($content).'</div>';
    }

}