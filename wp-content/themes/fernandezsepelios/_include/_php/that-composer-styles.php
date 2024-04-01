<?php

$the_acf_styles = "";

// ----- ReadyIT Homepage
if(is_page_template("template-readyit-home.php")){
  // Hero Section
  if( have_rows('hero_section') ):
    while ( have_rows('hero_section') ) : the_row();
  
      // Image
      if( have_rows('hero_image') ):
        while ( have_rows('hero_image') ) : the_row();

          if( get_sub_field("mobile_image") != "" && get_sub_field("large_image") == "" ) {
            
            $homepage_mobile_hero_image = get_sub_field("mobile_image");
            $the_acf_styles .= ".that-hero-readyit { background-image:url('".$homepage_mobile_hero_image."');}";
            
          } elseif( get_sub_field("mobile_image") == "" && get_sub_field("large_image") != "" ) {
            
            $homepage_large_hero_image = get_sub_field("large_image");
            $the_acf_styles .= ".that-hero-readyit { background-image:url('".$homepage_large_hero_image."');}";
            
          } elseif( get_sub_field("mobile_image") != "" && get_sub_field("large_image") != ""  ) {
            $homepage_mobile_hero_image = get_sub_field("mobile_image");
            $homepage_large_hero_image = get_sub_field("large_image");
            $the_acf_styles .= ".that-hero-readyit { background-image:url('".$homepage_mobile_hero_image."');} @media only screen and (min-width : 992px) { .that-hero-readyit { background-image:url('".$homepage_large_hero_image."');}}";
          }
  
        endwhile;
      endif;
  
  
  
      // Headline
      if( have_rows('hero_headline') ):
        while ( have_rows('hero_headline') ) : the_row();
          if( get_sub_field("mobile_text_color") != "" && get_sub_field("change_for_mobile") == true ) {
            $mobile_headline_color = get_sub_field("mobile_text_color");
            $the_acf_styles .= ".that-hero-readyit h1 { color: ".$mobile_headline_color."} @media only screen and (min-width : 992px) { .that-hero-readyit h1 { color:inherit; }}";
          }
        endwhile;
      endif;
  
  
      // text
      if( have_rows('hero_text') ):
        while ( have_rows('hero_text') ) : the_row();
          if( get_sub_field("mobile_text_color") != "" && get_sub_field("change_for_mobile") == true ) {
            $mobile_headline_color = get_sub_field("mobile_text_color");
            $the_acf_styles .= ".that-hero-readyit  p { color: ".$mobile_headline_color."} @media only screen and (min-width : 992px) { .that-hero-readyit p { color:inherit; }}";
          }
        endwhile;
      endif;
   
      // CTA
      if( have_rows('cta') ):
        while ( have_rows('cta') ) : the_row();
          if( get_sub_field("mobile_text_color") != "" && get_sub_field("change_for_mobile") == true ) {
            $mobile_cta_color = get_sub_field("mobile_cta_color");
            $mobile_cta_text_color = get_sub_field("mobile_text_color");
            $the_acf_styles .= ".that-hero-readyit [class*='that-cta'] { background: ".$mobile_cta_color."; color: ".$mobile_cta_text_color.";} @media only screen and (min-width : 992px) { .that-hero-readyit [class*='that-cta'] { background-color:#2f73b9; color: #fff;} }";
          }
        endwhile;
      endif;
  
  
      
  
  
    endwhile;
  endif;
  
  
  
  
 
  
  
}
// ----- End ReadyIT Homepage







echo "<style>" . $the_acf_styles . "</style>";




?>