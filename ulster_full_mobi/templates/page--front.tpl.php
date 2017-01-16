<?php 
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page">

  <header id="header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <hgroup id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup><!-- /#name-and-slogan -->
    <?php endif; ?>

  </header>

  <?php print render($page['alert']); ?>

  <div id="main">

    <div id="content" class="column" role="main">
    
      <div id="navigationnew">
        
        <a href="#" id="gov-icon-bg"><span class="menu-title">GOVERNMENT</span></a>        
        <nav id="gov-dropdown" role="navigation">          
           <?php print render($page['navigation_government']); ?>   
        </nav>
        
        <a href="#" id="departments-icon-bg"><span class="menu-title">DEPARTMENTS A - Z</span></a>        
        <nav id="departments-dropdown" role="navigation">          
           <?php print render($page['navigation_departments']); ?>   
        </nav>
        
        <a href="#" id="residents-icon-bg"><span class="menu-title">RESIDENTS</span></a>        
        <nav id="residents-dropdown" role="navigation">          
           <?php print render($page['navigation_residents']); ?>   
        </nav>
        
        <a href="#" id="business-icon-bg"><span class="menu-title">BUSINESS</span></a>        
        <nav id="business-dropdown" role="navigation">          
           <?php print render($page['navigation_business']); ?>   
        </nav>
        
        <a href="#" id="visitors-icon-bg"><span class="menu-title">VISITORS</span></a>        
        <nav id="visitors-dropdown" role="navigation">          
           <?php print render($page['navigation_visitors']); ?>   
        </nav>
        
        <a href="/search-page" id="dept-icon-bg"><span class="menu-title">SEARCH</span></a>
        
        <script type="text/javascript">
		jQuery(document).ready(function($) {
			
			$("#closeBan" ).click(function() {
				$('.region-alert').hide();
			});
			
			
			$("#gov-icon-bg").click(function() { 
				$("#residents-dropdown").hide();
				$("#residents-icon-bg").removeClass('open');
				$("#business-dropdown").hide();
				$("#business-icon-bg").removeClass('open');
				$("#visitors-dropdown").hide();
				$("#visitors-icon-bg").removeClass('open');
				$("#departments-dropdown").hide();
				$("#departments-icon-bg").removeClass('open');
				
				$("#gov-dropdown").toggle();
				$("#gov-icon-bg").toggleClass('open');
			});
			$("#residents-icon-bg").click(function() { 
			    $("#gov-dropdown").hide();
				$("#gov-icon-bg").removeClass('open');
				$("#business-dropdown").hide();
				$("#business-icon-bg").removeClass('open');
				$("#visitors-dropdown").hide();
				$("#visitors-icon-bg").removeClass('open');
				$("#departments-dropdown").hide();
				$("#departments-icon-bg").removeClass('open');
				
				$("#residents-dropdown").toggle();
				$("#residents-icon-bg").toggleClass('open');
			});
			$("#business-icon-bg").click(function() { 
			    $("#gov-dropdown").hide();
				$("#gov-icon-bg").removeClass('open');
				$("#residents-dropdown").hide();
				$("#residents-icon-bg").removeClass('open');
				$("#visitors-dropdown").hide();
				$("#visitors-icon-bg").removeClass('open');
				$("#departments-dropdown").hide();
				$("#departments-icon-bg").removeClass('open');
				
				$("#business-dropdown").toggle();
				$("#business-icon-bg").toggleClass('open');
			});
			$("#visitors-icon-bg").click(function() { 
			    $("#gov-dropdown").hide();
				$("#gov-icon-bg").removeClass('open');
				$("#residents-dropdown").hide();
				$("#residents-icon-bg").removeClass('open');
				$("#business-dropdown").hide();
				$("#business-icon-bg").removeClass('open');
				$("#departments-dropdown").hide();
				$("#departments-icon-bg").removeClass('open');
				
				$("#visitors-dropdown").toggle();
				$("#visitors-icon-bg").toggleClass('open');
			});
			$("#departments-icon-bg").click(function() { 
			    $("#gov-dropdown").hide();
				$("#gov-icon-bg").removeClass('open');
				$("#residents-dropdown").hide();
				$("#residents-icon-bg").removeClass('open');
				$("#business-dropdown").hide();
				$("#business-icon-bg").removeClass('open');
				$("#visitors-dropdown").hide();
				$("#visitors-icon-bg").removeClass('open');
				
				$("#departments-dropdown").toggle();
				$("#departments-icon-bg").toggleClass('open');
			});
		});
		</script>
		
		 <!-- /#navigation -->	 
    </div> 
    
    
      <?php print render($page['header']); ?>
    
      <?php print render($page['highlighted']); ?>
      <?php //print $breadcrumb; ?>
      <a id="main-content"></a>
      
      <?php
		  // Render the sidebars to see if there's anything in them.
		  $sidebar_first  = render($page['sidebar_first']);
		  $sidebar_second = render($page['sidebar_second']);
		?>
      
      <?php if ($sidebar_first || $sidebar_second): ?> 
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
      <div class="clearboth"></div><!-- /.sidebars -->
    <?php endif; ?>
      
    </div><!-- /#content -->
    
    
    

  </div><!-- /#main -->

  <?php print render($page['footer']); ?>
  <div class="switch"><a href="/?mobile=off">Load Desktop Site</a></div>

</div><!-- /#page -->
