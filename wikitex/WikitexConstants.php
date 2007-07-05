<?php
  /**
   * WikiTeX: expansible mod_tex client for MediaWiki
   * Copyright(C) 2004-7 Peter Danenberg
   * See doc/COPYING for details.
   */

class WikitexConstants
{
  public static $CONFIG_DIR = 'config';
  public static $DEFAULT_CONFIG = 'default.php';
  public static $LOCAL_CONFIG = 'local.php';

  public static $SAWS =
    array('cached_error' => '<span class="error">[Cached]</span>');

  /**
   * Relative path from wikitex's root in the file system
   * to the cache directory.
   */
  public static $CACHE_FILEPATH = 'cache';

  /**
   * Relative path from MediaWiki's web-URI to the cache-URI.
   */
  public static $CACHE_WEBPATH = 'extensions/wikitex/cache';

  /**
   * Mappeth MIME-types to extensions.
   */
  public static $MIME_TO_EXT =
    array(
          'audio/midi' => 'midi',
          'image/png' => 'png',
          'text/x-gnuplot' => 'gp',
          'text/x-graphviz' => 'dot',
          'text/x-latex' => 'tex',
          'text/x-lilypond' => 'ly',
          'text/x-go-sgf' => 'sgf',
          'text/x-wikitex-error' => 'error',
          );

  /**
   * Convenient handles to MIMEs.
   */
  public static $MIMES =
    array(
          'error' => 'text/x-wikitex-error',
          'gnuplot' => 'text/x-gnuplot',
          'graphviz' => 'text/x-graphviz',
          'latex' => 'text/x-latex',
          'midi' => 'audio/midi',
          'music' => 'text/x-lilypond',
          'go' => 'text/x-go-sgf',
          'png' => 'image/png',
          );

  public static $ERRORS =
    array(
//           'generic' => array('<span class="error">WikiTeX hath failed, milord: %s. (<em>Pecca fortiter!</em>)</span>',
//                              0),
          'generic' => array('<span class="error">WikiTeX failure:</span> <pre>%s</pre>',
                             0),
          'blank' => array('We received a blank document from the webserver',
                           1),
          'curl' => array('Curl reported error %d: %s', 2),
          'directory' => array('Can\'t create directory `%s\'', 3),
          'file' => array('Can\'t write to file `%s\'', 4),
//           'fault' => array('The RPC-server reported fault %d: &ldquo;%s&rdquo;', 5),
          'fault' => array('%s', 5),
          );

  public static $AGENT = 'WikiTeX-WikiMedia';

  /**
   * Mappeth public handles (<code>&lt;handle&gt;&lt;/handle&gt;</code>) to
   * internal functions.
   */
  public static $HOOKS =
    array(
          'amsmath' => 'math',
          'chess' => 'chess',
          'circo' => 'circo',
          'chem' => 'xymtex',
          'dot' => 'dot',
          'fdp' => 'fdp',
          'graph' => 'dot',
          'feyn' => 'feyn',
          'music' => 'music',
          'neato' => 'neato',
          'plot' => 'plot',
          'twopi' => 'twopi',
          'go' => 'go',
          );

  public static $CLASSES =
    array(
          'Wikitex' => 'Wikitex.php',
          'WikitexCache' => 'WikitexCache.php',
          'WikitexConfig' => 'WikitexConfig.php',
          'WikitexConstants' => 'WikitexConstants.php',
          'WikitexCurlError' => 'errors/WikitexCurlError.php',
          'WikitexDirectoryError' => 'errors/WikitexDirectoryError.php',
          'WikitexError' => 'errors/WikitexError.php',
          'WikitexFileError' => 'errors/WikitexFileError.php',
          'WikitexImage' => 'WikitexImage.php',
          'WikitexMusic' => 'WikitexMusic.php',
          'WikitexRequest' => 'WikitexRequest.php',
          'WikitexRPCFaultError' => 'errors/WikitexRPCFaultError.php',
          'WikitexRPCResponseError' => 'errors/WikitexRPCResponseError.php',
          );

  public static function getDir() {
    return dirname(__FILE__);
  }

  public static function getCacheFilepath() {
    return sprintf('%s/%s', self::getDir(), self::$CACHE_FILEPATH);
  }

  public static function getCacheWebpath() {
    global $wgScriptPath;
    return sprintf('%s/%s', $wgScriptPath, self::$CACHE_WEBPATH);
  }

  public static function getClasses() {
    $dir = self::getDir();
    $classes = array();
    foreach (self::$CLASSES as $class => $file) {
        $classes[$class] = "$dir/$file";
      }
    return $classes;
  }
  
  public static function getConfig($config) {
    return sprintf('%s/%s/%s', dirname(__FILE__), self::$CONFIG_DIR, $config);
  }

  public static function getDefaultConfig() {
    return self::getConfig(self::$DEFAULT_CONFIG);
  }
  
  public static function getLocalConfig() {
    return self::getConfig(self::$LOCAL_CONFIG);
  }

  public static function getDefaultImageMime() {
    return self::$MIMES['png'];
  }
}

?>
