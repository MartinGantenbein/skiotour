<?php
/*
 * ------------------------------------------------------------------------
 * # author Gante
 * # copyright Copyright © 2016 skiotour.com. All rights reserved.
 * # @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * # Website http://www.example.com
 * -------------------------------------------------------------------------
 */
defined ( '_JEXEC' ) or die ( 'Restricted access' );

// parameters (template)
$modernizr = $this->params->get ( 'modernizr' );
$bootstrap = $this->params->get ( 'bootstrap' );
$pie = $this->params->get ( 'pie' );
$layout = $this->params->get ( 'layout' );

// variables
$app = JFactory::getApplication ();
$doc = JFactory::getDocument ();
$params = $app->getParams ();
$pageclass = $params->get ( 'pageclass_sfx' );
$tpath = $this->baseurl . '/templates/' . $this->template;

$this->setGenerator ( null );

// load sheets and scripts
$doc->addStyleSheet ( $tpath . '/css/template.css.php?b=' . $bootstrap . '&v=1' );
if ($modernizr == 1)
	$doc->addScript ( $tpath . '/js/modernizr.js' ); // <- this script must be in the head
		                                                 
// unset scripts, put them into /js/template.js.php to minify http requests
unset ( $doc->_scripts [$this->baseurl . '/media/system/js/mootools-core.js'] );
unset ( $doc->_scripts [$this->baseurl . '/media/system/js/core.js'] );
unset ( $doc->_scripts [$this->baseurl . '/media/system/js/caption.js'] );

?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php echo $this->language; ?>">
<!--<![endif]-->

<head>
<script type="text/javascript"
	src="<?php echo $tpath.'/js/template.js.php'; ?>"></script>
<jdoc:include type="head" />
<meta name="viewport" />

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=Gvmmer6mJz">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=Gvmmer6mJz">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=Gvmmer6mJz">
<link rel="manifest" href="/site.webmanifest?v=Gvmmer6mJz">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=Gvmmer6mJz" color="#2d89ef">
<link rel="shortcut icon" href="/favicon.ico?v=Gvmmer6mJz">
<meta name="apple-mobile-web-app-title" content="Ski-O Tour">
<meta name="application-name" content="Ski-O Tour">
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#2d89ef">

  <?php if ($pie==1) : ?>
    <!--[if lte IE 8]>
      <style>
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <![endif]-->
  <?php endif; ?>
</head>

<body class="<?php echo $pageclass; ?>">
	<div id="wrapper">
		<div id="head">
			<jdoc:include type="modules" name="top" />
		</div>
		<div id="header">
			<div class="inheader">
				<jdoc:include type="modules" name="header" />
			</div>
		</div>
		<div id="top">
			<div id="intop">
				<jdoc:include type="modules" name="menu_top" />
			</div>
		</div>

		<div id="content">
			<div id="left">
				<div id="inleft">
					<jdoc:include type="modules" name="left" />
				</div>
			</div>

			<div id="main">
				<div class="inmain">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
			  </div>
			</div>
      <?php if($layout!='withoutright') :?>
      <div id="right">
			  <div id="inright">
				  <jdoc:include type="modules" name="right" />
				</div>
			</div>
      <?php endif;?>
    </div>
		<div id="footer">
      <div class="infooter">
        <jdoc:include type="modules" name="footer"/>
      	<jdoc:include type="modules" name="debug" />        
      </div>
    </div>
  </div>
</body>
</html>
