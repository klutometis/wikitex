.ig
WikiTeX: expansible mod_tex client for MediaWiki
Copyright(C) 2004-7 Peter Danenberg
See doc/COPYING for details.
..
.so heading.ms
.\" Footnotes-numbers trailed by `.'.
.nr FF 1
.\" Redefine footnote-numberer to have enclosing braces;
.\" but only in ascii.
.if '\*(.T'ascii' \{\
.       ds * [\\*[par@sup-start]\En+[fn*text-num]\\*[par@sup-end]]
.\}
