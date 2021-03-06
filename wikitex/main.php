<?php
  /**
   * WikiTeX: expansible mod_tex client for MediaWiki
   * Copyright(C) 2004-7 Peter Danenberg
   * See doc/COPYING for details.
   */

  // Paradox? Include to initiate autoload.
include_once('WikitexConstants.php');

  // Global magic
$wgExtensionFunctions[] = 'wikitexRegisterHooks';
$wgAutoloadClasses = array_merge($wgAutoloadClasses,
                                 WikitexConstants::getClasses());

function wikitexRegisterHooks() {
  global $wgParser;
  Wikitex::registerHooks($wgParser);
}

?>
