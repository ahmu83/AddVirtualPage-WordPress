<?php
/**
 * Helper class for creating a virtual 
 * page in WordPress. This can be changed 
 * to further add parameters to the custom 
 * page. For now it is only creating a simple 
 * custom URL like domain.com/custom-url-slug/
 *
 * i.e, new AddVirtualPage('custom-url-slug', $template_path);
 *
 * Once this is called don't forget to clear your 
 * permalink cache for the new virtual page to work
 * 
 * @category   WordPress
 * @package    AddVirtualPage
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://www.ahmadkarim.com/
 */
class AddVirtualPage {

  private $slug;
  private $template_path;

  /**
   * Add virtual page
   * 
   * @param string $slug
   * @param string $template_path
   */
  function __construct($slug, $template_path) {

    $this->slug = $slug;
    $this->template_path = $template_path;

    add_filter('generate_rewrite_rules', array($this, 'generate_rewrite_rules'));
    add_filter('query_vars', array($this, 'query_vars'));
    add_action('template_redirect', array($this, 'template_redirect'));

  }

  /**
   * Callback for the generate_rewrite_rules filter hook
   * 
   * @param object $wp_rewrite [description]
   * @return void
   */
  public function generate_rewrite_rules($wp_rewrite) {

    $slug = $this->slug;

    $wp_rewrite->rules = array_merge(
      array("{$slug}/?$" => "index.php?{$slug}=1"),
      $wp_rewrite->rules
    );

  }

  /**
   * Callback for the query_vars filter hook
   * 
   * @param array $query_vars
   * @return array
   */
  public function query_vars($query_vars) {

    $query_vars[] = $this->slug;

    return $query_vars;

  }

  /**
   * Callback for the template_redirect action hook
   * 
   * @return void
   */
  public function template_redirect() {

    $slug = intval(get_query_var($this->slug));
    $template_path = $this->template_path;

    if ( $slug && file_exists($template_path) ) {

      include $template_path;
      die;

    }

  }

}

