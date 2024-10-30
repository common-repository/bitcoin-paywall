<?php
/*
Plugin Name: Bitcoin Paywall
Plugin URI:  https://ba.net/bitcoin-paywall
Description: Accept BTC, BCH, ETH, PayPal, Credit Cards. No registration, 0% Fees. Non-Custodial. Instant Pay Buttons. It automates your sales of digital goods or premium content. Bitcoin Paywall.
Version:     2.9
Author:      BA.net
Author URI:  https://ba.net/
License:     Open Source MIT
License URI: https://ba.net/bitcoin-paywall/tos.html

Copyright YEAR PLUGIN_AUTHOR_NAME (email : your email address)
(Plugin Name) is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
(Plugin Name) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with (Plugin Name). If not, see 
(https://ba.net/digital-paywall-btc-bch to your plugin license).
*/

function bitcoin_paywall_register_settings() {
   add_option( 'bitcoin_paywall_option_name', '1example44NkZ35zLtfp12iaFRf4EoFm');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name', 'bitcoin_paywall_callback' );

   add_option( 'bitcoin_paywall_option_name2', 'yoursales@example.com');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name2', 'bitcoin_paywall_callback' );

   add_option( 'bitcoin_paywall_option_name3', 'bch');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name3', 'bitcoin_paywall_callback' );

   add_option( 'bitcoin_paywall_option_name4', 'Product-Name');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name4', 'bitcoin_paywall_callback' );

   add_option( 'bitcoin_paywall_option_name5', '9.99');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name5', 'bitcoin_paywall_callback' );

   add_option( 'bitcoin_paywall_option_name6', '0X1aa814776f64ca11b12f02aa5ff2c1221a27bef6');
   register_setting( 'bitcoin_paywall_options_group', 'bitcoin_paywall_option_name6', 'bitcoin_paywall_callback' );

}
add_action( 'admin_init', 'bitcoin_paywall_register_settings' );

function bitcoin_paywall_register_options_page() {
  add_options_page('Page Title', 'Bitcoin Paywall', 'manage_options', 'bitcoin_paywall', 'bitcoin_paywall_options_page');
}
add_action('admin_menu', 'bitcoin_paywall_register_options_page');


function bitcoin_paywall_option_page()
{
  //content on page goes here

}




?>

<?php function bitcoin_paywall_options_page()
{
?>
  <div>
  <?php screen_icon(); ?>
  <h2>Bitcoin Cash Paywall</h2>
  <form method="post" action="options.php">
  <?php settings_fields( 'bitcoin_paywall_options_group' ); ?>

<img src=<?php echo plugin_dir_url( __FILE__ )."paybutton.gif"; ?> width=160 height=160 align=right>

  <p>Configure your payment buttons here. Then cut and paste the links or buttons on your wordpress pages, or external sites and social media. 
<p>
Pro version can manage payment status and automatic product delivery. <a href="https://ba.net/bitcoin-pay-button/wordpress.html" target=_blank>Upgrade Here</a>

<p><br>
  <table>
  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name">BCH or BTC Address</label></th>
  <td><input type="text" id="bitcoin_paywall_option_name" name="bitcoin_paywall_option_name" size="40"  
value="<?php echo get_option('bitcoin_paywall_option_name'); ?>" /></td>
  </tr>

  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name6">ETH Address</label></th>
  <td><input type="text" id="bitcoin_paywall_option_name6" name="bitcoin_paywall_option_name6" size="40"
value="<?php echo get_option('bitcoin_paywall_option_name6'); ?>" /></td>
  </tr>


  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name2">Sales Support Email</label></th>
  <td><input type="text" id="bitcoin_paywall_option_name2" name="bitcoin_paywall_option_name2" size="40" 
value="<?php echo get_option('bitcoin_paywall_option_name2'); ?>" /></td>
  </tr>

  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name3">Coin</label></th>
  <td>
<select id="bitcoin_paywall_option_name3" name="bitcoin_paywall_option_name3">
<option value="bch" <?php if (get_option('bitcoin_paywall_option_name3')=="bch") echo "selected"; ?> >
BCH</option>
<option value="btc" <?php if (get_option('bitcoin_paywall_option_name3')=="btc") echo "selected"; ?> >
BTC</option>
<option value="eth" <?php if (get_option('bitcoin_paywall_option_name3')=="eth") echo "selected"; ?> >
ETH</option>
<option value="paypal" <?php if (get_option('bitcoin_paywall_option_name3')=="paypal") echo "selected"; ?> >
PayPal</option>
<option value="paypal" <?php if (get_option('bitcoin_paywall_option_name3')=="paypal") echo "selected"; ?> >
CCs</option>
</select>

  </tr>

  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name4">Product Name (no spaces)</label></th>
  <td><input type="text" id="bitcoin_paywall_option_name4" name="bitcoin_paywall_option_name4"
value="<?php echo get_option('bitcoin_paywall_option_name4'); ?>" /></td>
  </tr>

  <tr valign="top">
  <th scope="row"><label for="bitcoin_paywall_option_name5">Amount US$</label></th>
  <td><input type="text" id="bitcoin_paywall_option_name5" name="bitcoin_paywall_option_name5"
value="<?php echo get_option('bitcoin_paywall_option_name5'); ?>" /></td>
  </tr>

  </table>
  <?php  submit_button(); ?>
  </form>
  </div>

<p><br>



<?php

//echo "<p>address ".get_option('bitcoin_paywall_option_name');
//echo "<p>emailsupport ".get_option('bitcoin_paywall_option_name2');
//echo "<p>coin ".get_option('bitcoin_paywall_option_name3');
//echo "<p>product ".get_option('bitcoin_paywall_option_name4');
//echo "<p>amount $ ".get_option('bitcoin_paywall_option_name5');
//echo "<p>ABSPATH".ABSPATH;
//echo "<p> ".site_url();

if (get_option('bitcoin_paywall_option_name3') == "bch")
 $button = "https://ba.net/pay/button/bchpay.php?address=".get_option('bitcoin_paywall_option_name')."&supportemail=".get_option('bitcoin_paywall_option_name2')."&product=".get_option('bitcoin_paywall_option_name4')."&amount=".get_option('bitcoin_paywall_option_name5')."";

if (get_option('bitcoin_paywall_option_name3') == "btc")
 $button = "https://ba.net/pay/button/btcpay.php?address=".get_option('bitcoin_paywall_option_name')."&supportemail=".get_option('bitcoin_paywall_option_name2')."&product=".get_option('bitcoin_paywall_option_name4')."&amount=".get_option('bitcoin_paywall_option_name5')."";

if (get_option('bitcoin_paywall_option_name3') == "eth")
 $button = "https://ba.net/pay/button/ethpay.php?address=".get_option('bitcoin_paywall_option_name6')."&supportemail=".get_option('bitcoin_paywall_option_name2')."&product=".get_option('bitcoin_paywall_option_name4')."&amount=".get_option('bitcoin_paywall_option_name5')."";

if (get_option('bitcoin_paywall_option_name3') == "paypal")
 $button = "https://ba.net/pay/button/paypal.php?address=".get_option('bitcoin_paywall_option_name')."&supportemail=".get_option('bitcoin_paywall_option_name2')."&product=".get_option('bitcoin_paywall_option_name4')."&amount=".get_option('bitcoin_paywall_option_name5')."";

echo "<center>
<a href=".$button." target=_blank>your customised pay link</a> 
<p><br>
<button OnClick=window.location.href='".$button."' style='font-size:100%'><b>your customised pay button</b></button>
<p><br>
";

echo "<p><br>Cut and Paste on your WordPress Site or Social Media
<p><textarea cols=80 rows=12>
<a href='".$button."'>your custom pay link</a>

<button OnClick=window.location.href='".$button."' style='font-size:100%'><b>your custom pay button</b></button>

<iframe src='".$button."' width=600 height=500 frameborder=no></iframe>

</textarea> ";

echo "<p><br><br>";
echo "<p><br><br>";



?>




<?php

} ?>
