# WikiTeX: expansible modTeX client for MediaWiki
# Copyright(C) 2004-7 Peter Danenberg
# See doc/COPYING for details.
VERSION=2.0-beta
SED=sed
SEDFLAGS=-e "s/@VERSION@/${VERSION}/g"
GROFF=groff
GRFLAGS=-ms -Tascii
COL=col
COFLAGS=-xb
REORDER=./reorder.sh
DOCS=README
ALL=COPYING ${DOCS}

.SUFFIXES: .ms

all: ${ALL}

COPYING: COPYING.ms
	${GROFF} ${GRFLAGS} ${?} | \
	${COL} ${COFLAGS} > ${@}

.ms :
	${SED} ${SEDFLAGS} ${<} | \
	${GROFF} ${GRFLAGS} | \
	${COL} ${COFLAGS} > ${@:=.tmp} && \
	${REORDER} ${@:=.tmp} > ${@}

clean:
	rm -vf ${ALL} ${DOCS:=.tmp}
