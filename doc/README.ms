.ig
WikiTeX: expansible mod_tex client for MediaWiki
Copyright(C) 2004-7 Peter Danenberg
See doc/COPYING for details.
..
.so header.ms
.RP
.DA
.ds LH README
.ds RH WikiTeX @VERSION@
.P1
.TL
WikiTeX @VERSION@ README
.AU
Peter Danenberg <pcd at wikitex dot org>
.AI
http://wikisophia.org
.AB
Installation and configuration of the mod_tex client for MediaWiki.
.AE
.XH 1 Prerequisites S 0
.IP \(bu
PHP 5.2+ compiled with curl and xmlrpc
.IP \(bu
MediaWiki 1.6+
.IP \(bu
mod_tex 0.1\**
.FS
http://modtex.org
.FE
.XH 1 Installation
.nr i 0 1
.IP \n+i.
Copy ../wikitex to MEDIAWIKI/extensions.
.IP \n+i.
Copy config/default.php to config/local.php; edit local.php.
.IP \n+i.
Add the following line to LocalSettings.php:
.QP
\%require_once("$IP/extensions/wikitex/main.php");
.so footer.ms
