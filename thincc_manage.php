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
          <div class="options">
            <div><input name="use_web_links" id="use_web_links" type="checkbox" /><label for="use_web_links">Use normal web links instead of LTI links</label></div>-->
            <div><input name="include_parts" id="include_parts" type="checkbox" /><label for="include_parts">Include links to Parts</label></div>
<!-- remove ?           <div><input name="include_guids" id="include_guids" type="checkbox" /><label for="include_guids">Include GUIDs</label></div>
-->
            <div><label for="cc_version_selector">CC Version:</label>
              <select id="cc_version_selector" name="version">
                <option value="1.3" selected>1.3 (Canvas/Sakai/D2L)</option>
                <option value="flat">Flat CC (For Lumen Pre-Processing)</option>
              </select>
            </div>
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
