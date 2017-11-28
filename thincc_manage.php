<?php

function thincc_add_js()
{
  wp_enqueue_style('thin_cc_css', plugins_url('thincc.css', __FILE__));
  wp_enqueue_script('thin_cc_js', plugins_url('thincc.js', __FILE__));

  $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
  $params = array(
      'ajaxurl' => admin_url('admin-ajax.php', $protocol)
  );
  wp_localize_script('thin_cc_js', 'thin_cc_js', $params);

}

function thincc_manage()
{
if (!current_user_can('export'))
wp_die(__('You do not have sufficient permissions to export the content of this site.'));

global $wpdb;
?>

<div class="thincc" xmlns="http://www.w3.org/1999/html">
  <div class="wrap">

    <h2>Export to Common Cartridge</h2>

    <div id="main">

      <form id="thincc-form" action="" method="post">
          <div class="instructions">
            <p>This export plugin will produce a Thin Common Cartridge which you can use to import a Pressbook into a Learning Management System.</p>
            <p>By default, the plugin will produce a Thin CC with LTI links, and will include all chapters in the book (including front and back matter) which have been selected for export. To use these LTI links, you'll need to add a plugin which allows Pressbooks to act as an LTI consumer and configure Pressbooks as an LTI app with your LMS.</p>
            <p>To use simple web links instead of LTI links, check the option below. The export can also create 'discussion' and 'assignment' activities from chapters in your book. To do this, the title of the chapter should be prefaced with 'Discussion:' or 'Assignment:', respectively.</p>
          <div class="options">
            <div><input name="use_web_links" id="use_web_links" type="checkbox" /><label for="use_web_links">Use normal web links instead of LTI links</label></div>
            <div><input name="include_parts" id="include_parts" type="checkbox" /><label for="include_parts">Include links to Parts</label></div>
          </div>

          <div class="submit">
            <input type="hidden" name="cc_download" value="<?php echo get_home_path(); ?>"/>

            <a href="#" class="button-secondary">Preview Flat-CC</a>
            <input class="button button-primary" type="submit" value="Download Cartridge" name="submit">
          </div>
      </form>

      <div id="thincc_modal">
        <div id="thincc-results-close-holder"><a href="#" id="thincc-results-close">Close</a></div>
        <div id="thincc-results">Results</div>
      </div>

    </div>
  </div>
</div>


<?php
}
?>
