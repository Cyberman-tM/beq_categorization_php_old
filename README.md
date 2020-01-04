# beq_categorization
Categorization of klingon words

An attempt to add categories to klingon words, to make it easier to look for a fitting translation.
It is intended to be DEScriptive, not PREscriptive! In other words: it's not so much a guideline as a "well, here's what we've used so far".

As with beq, this relies on the database from boQwI', which is considered to be the higher authority. If boQwI' says that a word is in category X, it stays there.
(Doesn't mean it can't also be in Y, Z, A and perhaps even B :-D)

The XML file is copied regularly from the server where the actual collection (via beq) happens. This repository is therefore mainly a static public place to look for it.

The PHP files can safely be ignored, all that matters is this file:

beq_categories.txt

(It's an XML file with TXT extension to prevent over-eager plugins to render it instead of simply copying it.)

Since apostrophes are a problem in XML names, I had to encode the kingon word in the uhmal encoding. Sorry about that, but at least now it's easier to sort :-)
