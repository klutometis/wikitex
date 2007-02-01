<?php
  /**
   * WikiTeX: expansible modTeX client for MediaWiki
   * Copyright(C) 2004-7 Peter Danenberg
   * See doc/COPYING for details.
   */

class WikitexFileError extends WikitexError
{
  public function WikitexFileError($file) {
    list($strerror, $errno) = WikitexConstants::$ERRORS['file'];
    parent::__construct(sprintf($strerror, $file), $errno);
  }
}

?>
  