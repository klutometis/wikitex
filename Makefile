PRE = cat 
POST = copying.inc.ms | groff -t -ms -Tascii - | col -bx >

all: README NEWS COPYING MANIFEST

README: readme.ms
	$(PRE) $? $(POST) $@

NEWS: news.ms
	$(PRE) $? $(POST) $@

COPYING: copying.ms
	$(PRE) $? $(POST) $@

MANIFEST: manifest.ms
	$(PRE) $? $(POST) $@

clean:
	rm *~
