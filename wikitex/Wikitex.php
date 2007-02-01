<?php
  /**
   * WikiTeX: expansible modTeX client for MediaWiki
   * Copyright(C) 2004-7 Peter Danenberg
   * See doc/COPYING for details.
   */

class Wikitex {
  public static function registerHooks($parser) {
    foreach (WikitexConstants::$HOOKS as $action => $hook) {
      $parser->setHook($action, array(__CLASS__, $hook));
    }
  }

  public static function music($content, array $parms) {
    $ACTION = __FUNCTION__;
    $SRC_MIME = WikitexConstants::$MIMES['music'];
    $IMG_MIME = WikitexConstants::getDefaultImageMime();
    $ERR_MIME = WikitexConstants::$MIMES['error'];
    $MID_MIME = WikitexConstants::$MIMES['midi'];

    $request = new WikitexRequest($ACTION, $content);

    try {
      $redditum = $request->render(array($IMG_MIME, $SRC_MIME, $MID_MIME),
                                   FALSE);
      if (!empty($redditum[$ERR_MIME])) {
        return $redditum[$ERR_MIME];
      }
      if (empty($redditum[$MID_MIME])) {
        $response = new WikitexImage($redditum[$SRC_MIME],
                                     $redditum[$IMG_MIME]);
      } else {
        $response = new WikitexMusic($redditum[$SRC_MIME],
                                     $redditum[$IMG_MIME],
                                     $redditum[$MID_MIME]);
      }
      return (string) $response;
    } catch (Exception $e) {
      return (string) new WikitexError($e->getMessage(), $e->getCode());
    }
    return (string) new WikitexError('Bizzarly, execution continued <em>ins Nichts</em>: this shouldn\'t happen');
  }

  /**
   * Superclass for all image-based renderers.
   *
   * Is itself inaccessible from the wiki; must be accessed through its
   * subclasses.
   *
   * @param content the twixt-tag-content.
   * @param parms a dictionary of attribute-value pairs.
   * @param action the remoted render-method to be invoked (probably identical
   * to its local name).
   * @return The rendered content
   */
  public static function image($content, array $parms, $action, $src_mime, $img_mime=NULL) {
    if ($img_mime == NULL) {
      $img_mime = WikitexConstants::getDefaultImageMime();
    }
    $ERR_MIME = WikitexConstants::$MIMES['error'];

    $request = new WikitexRequest($action, $content);

    try {
      $redditum = $request->render(array($img_mime, $src_mime));
      if (!empty($redditum[$ERR_MIME])) {
        return $redditum[$ERR_MIME];
      }
      return (string) new WikitexImage($redditum[$src_mime],
                                       $redditum[$img_mime]);
    } catch (Exception $e) {
      return (string) new WikitexError($e->getMessage(), $e->getCode());
    }
    return (string) new WikitexError('Bizzarly, execution continued <em>ins Nichts</em>: this shouldn\'t happen');
  }

  public static function plot($content, array $parms) {
    return self::image($content, $parms, __FUNCTION__, WikitexConstants::$MIMES['gnuplot']);
  }

  public static function graphviz($content, array $parms, $action=__FUNCTION__) {
    return self::image($content, $parms, $action, WikitexConstants::$MIMES['graphviz']);
  }

  public static function dot($content, array $parms, $action=__FUNCTION__) {
    return self::graphviz($content, $parms, __FUNCTION__);
  }

  public static function neato($content, array $parms, $action=__FUNCTION__) {
    return self::graphviz($content, $parms, __FUNCTION__);
  }

  public static function fdp($content, array $parms, $action=__FUNCTION__) {
    return self::graphviz($content, $parms, __FUNCTION__);
  }

  public static function circo($content, array $parms, $action=__FUNCTION__) {
    return self::graphviz($content, $parms, __FUNCTION__);
  }

  public static function twopi($content, array $parms, $action=__FUNCTION__) {
    return self::graphviz($content, $parms, __FUNCTION__);
  }

  public static function latex($content, array $parms, $action=__FUNCTION__) {
    return self::image($content, $parms, $action, WikitexConstants::$MIMES['latex']);
  }

  public static function math($content, array $parms) {
    return self::latex($content, $parms, __FUNCTION__);
  }
}

?>
