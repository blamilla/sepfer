
<?php 

$path = get_template_directory();
$path .= '/_include/'; 
 
// -------------- Array of css files
$css = array(		
    get_template_directory() . '/style.min.css', /* core styles */    
);

// -------------- Conditionally push css files to array
global $wp_query;




/* Blog page styles */
//if ( isset( $wp_query ) && (bool) $wp_query->is_posts_page )   {
    //array_push($css, $path . '_css/that-blog.css');
//}


/* Home page styles */
//if ( is_page_template("template-home.php") )   {
    //array_push($css, $path . '_css/that-home.css');
//}

/* Landing page styles */
//if ( is_page_template("template-landing-page.php") )   {
//    array_push($css, $path . '_css/that-landing-page.css');
//}



// ----------------------------------------------------
 

// -------------- Minify CSS files
$css_content = '';
foreach ($css as $css_file) {
  $css_content .= file_get_contents($css_file);
}
require_once $path . '_php/minify/src/Minify.php';
require_once $path . '_php/minify/src/CSS.php';
/*require_once $path . '_php/minify/src/JS.php';*/
require_once $path . '_php/minify/src/Exception.php';
require_once $path . '_php/minify/src/Exceptions/BasicException.php';
require_once $path . '_php/minify/src/Exceptions/FileImportException.php';
require_once $path . '_php/minify/src/Exceptions/IOException.php';
require_once $path . '_php/path-converter/src/ConverterInterface.php';
require_once $path . '_php/path-converter/src/Converter.php';
use MatthiasMullie\Minify;
$minifier = new Minify\CSS($css_content);
$minified = $minifier->minify();

// -------------- Print minified CSS
echo "<style>" . $minified . "</style>";   

?>