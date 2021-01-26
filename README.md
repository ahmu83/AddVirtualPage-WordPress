# AddVirtualPage-WordPress

This is a helper class for creating a virtual page in WordPress.

i.e, domain.com/custom-url-slug/

Currently this only adds a simple virtual page without any parameters, but this can be modified to add custom parameters to the url.

# Usage

`new AddVirtualPage('custom-url-slug', $template_path)`

This will add a new virtual page: domain.com/custom-url-slug/

Don't forget to clear your permalink cache for the new virtual page to work


