# Thin CC Exporter

A plugin that extends Pressbooks export functionality.

## Synopsis

[Pressbooks](https://github.com/pressbooks/pressbooks) is a plugin that turns your Wordpress multisite installation into a book publishing platform. Thin CC Exporter allows users to export books as a Thin Common Cartridge. The plugin currently exports to CC 1.3, and can produce zip files with either LTI or simple web links. In order to use the LTI links, you'll need to configure Pressbooks to act as an LTI provider, which requires additional configuration (for example, https://github.com/lumenlearning/lti and https://github.com/lumenlearning/candela-lti)

## Installation

### Manually

1. Download or clone Thin CC Exporter into your wordpress multisite plugins directory: `/path/to/wordpress/wp-content/plugins`
1. Log in to your Wordpress multisite instance and navigate to `Network Admin > Plugins` and activate the Thin CC Exporter plugin
1. Navigate to `wp-admin/tools.php?page=pb-thin-exporter.php` on your Pressbooks install in your browser

## License

MIT - See LICENSE for more information
