<?php
  /**
   * WikiTeX: expansible modTeX client for MediaWiki
   * Copyright(C) 2004-7 Peter Danenberg
   * See doc/COPYING for details.
   */

class WikitexMusic
{
  // Internationalize
  const ELEMENT = '<a href="%s"><img src="%s" /></a><a href="%s">[Listen]</a>';

  /**
   * URI to the source behind the image.
   */
  protected $source = NULL;

  /**
   * URI to the image itself.
   */
  protected $image = NULL;

  protected $sound = NULL;

  public function WikitexMusic($source, $image, $sound) {
    $this->source = $source;
    $this->image = $image;
    $this->sound = $sound;
  }

  public function __toString() {
    return sprintf(self::ELEMENT, $this->source, $this->image, $this->sound);
  }
}

?>
