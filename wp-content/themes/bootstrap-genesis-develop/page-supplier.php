<?php
/**
 * Template Name: Page - Supplier
 * Description: Used as a page template to show page Supplier
 */
 ?>

<?php get_header(); ?>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<div class="site-inner container">
        <div class="row center rowbottompadding">
            <div class="col-md-8" style="text-align:left;">
                <div><?php the_field('leftside_content'); ?></div>
                <div class="tenspacer"></div>
            </div>
            <div class="col-md-4" style="text-align:left;">
            	<h3><?php the_field('form_title'); ?></h3>
            	<div class="demoform suppform" style="padding:20px 10px 20px 20px;">
                	<form action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

<input type=hidden name="oid" value="00D1h0000004crP">
<input type=hidden name="retURL" value="https://www.avidxchange.com/">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!--  <input type="hidden" name="debug" value=1>                              -->
<!--  <input type="hidden" name="debugEmail" value="ylin@avidxchange.com">    -->
<!--  ----------------------------------------------------------------------  -->

<label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>

<label for="street">Street</label><br><textarea name="street"></textarea><br>

<label for="city">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" /><br>

<label for="state">State/Province</label><input  id="state" maxlength="20" name="state" size="20" type="text" /><br>

<label for="zip">Zip</label><input  id="zip" maxlength="20" name="zip" size="20" type="text" /><br>

<label for="country">Country</label><input  id="country" maxlength="40" name="country" size="20" type="text" /><br>

Federal Tax ID:<input  id="00Ni000000BR4FA" maxlength="10" name="00Ni000000BR4FA" size="20" type="text" /><br>

Contacting on Behalf Of:<textarea  id="00Ni000000BR3wp" name="00Ni000000BR3wp" type="text" wrap="soft"></textarea><br>

<label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>

<label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

Available Payment Options:<select  id="00Ni000000BR4FZ" multiple="multiple" name="00Ni000000BR4FZ" title="Available Payment Options"><option value="Check">Check</option>
<option value="MasterCard">MasterCard</option>
<option value="ACH">ACH</option>
</select><br>

Flat Fee $:<input  id="00Ni000000FUosR" name="00Ni000000FUosR" size="20" type="text" /><br>

Flat Fee %:<input  id="00Ni000000FUosg" name="00Ni000000FUosg" size="20" type="text" /><br>

Primary Max. Transaction Limit:<input  id="00Ni000000FUp1J" name="00Ni000000FUp1J" size="20" type="text" /><br>

Additional Payment Instructions:<textarea  id="00Ni000000EjjwP" name="00Ni000000EjjwP" type="text" wrap="soft"></textarea><br>

Preferred Language:<select  id="00N1Y00000Hl3S2" name="00N1Y00000Hl3S2" title="Preferred Language"><option value="">--None--</option><option value="English">English</option>
<option value="Spanish">Spanish</option>
<option value="French">French</option>
<option value="German">German</option>
<option value="Portuguese">Portuguese</option>
<option value="Chinese">Chinese</option>
<option value="Italian">Italian</option>
</select><br>

Campaign Type:<select  id="00Ni000000EjTcO" name="00Ni000000EjTcO" title="Campaign Type"><option value="">--None--</option><option value="ACH Request">ACH Request</option>
<option value="Analyst Research">Analyst Research</option>
<option value="Comdata">Comdata</option>
<option value="Direct Mail 1">Direct Mail 1</option>
<option value="JIT">JIT</option>
<option value="Letter">Letter</option>
<option value="Non-PayForUs">Non-PayForUs</option>
<option value="Online Lead">Online Lead</option>
<option value="Prime Target">Prime Target</option>
<option value="Strategic Call">Strategic Call</option>
<option value="Strongroom Blitz">Strongroom Blitz</option>
<option value="Supplier Site">Supplier Site</option>
<option value="VCC Predictive">VCC Predictive</option>
</select><br>

VCC Email Remit Address:<input  id="00Ni000000BR4A9" maxlength="80" name="00Ni000000BR4A9" size="20" type="text" /><br>

Supplier Consent Given:<select  id="00N1Y00000IM2zN" name="00N1Y00000IM2zN" title="Supplier Consent Given"><option value="">--None--</option><option value="Yes">Yes</option>
<option value="No">No</option>
<option value="Not Decision Maker">Not Decision Maker</option>
<option value="Didn&#39;t Ask">Didn&#39;t Ask</option>
</select><br>

<input type="submit" name="submit">

</form>
                
				</div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>