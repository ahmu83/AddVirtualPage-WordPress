# AddVirtualPage-WordPress

This is a helper class for creating a virtual page in WordPress.

i.e, domain.com/custom-url-slug/

Currently this only adds a simple virtual page without any parameters, but this can be modified to add custom parameters to the url.

# Usage

`
$template_path = get_stylesheet_directory() . '/custom-pages/the-template.php';
new AddVirtualPage('custom-url-slug', $template_path);
`

The `$template_path` should be a fully qualified template path

This will add a new virtual page: domain.com/custom-url-slug/

Don't forget to clear your permalink cache for the new virtual page to work


