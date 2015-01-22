PWRef
=====

<h4>A web application for storing and retrieving scientific references.</h4>

<em>An application to store and retrieve by a web browser the kind of bibliographic information
that a scientist needs when writing publications, grant proposals, progress reports, etc.</em>

<p>The code consists of JavaScript and PHP. A mySQL database contains the references.
References are of two major kinds: Articles and "Books". The kind "Books" is subdivided in
subclasses, as in BiBTeX. The number of authors of an article and "book" is unlimited. In
practice the single parameter $max_authors (set at 250) protects against buffer overflow
attacks. Upon retrieval of references the output can be returned in several formats, among
them HTML and BiBTeX. Input can be typed in by hand or by copy/paste from digital sources.

<h5><em>Comment at the first attempt to make a repository of the files of PWRef
existing on my home disk:</em></h5>

Great problems because of instructions that were not for
Windows (for Mac?). It says "Navigate to change button", but no change
button in sight. And when you hit the wrong button your are left drowning.
Unfriendly software, they would better say what they are doing (what directories
and files they pollute your directories with and in what way they
modify the register). Users of GitHub can handle that. I had to
clean up my system thoroughly and download again and again before I
got my files here. And now, how do I get rid of "xxxxxxxx"?

<b>Answer to the last question:</b> "xxxxxxxx" is a commit remark. Make some
changes at the client side (for instance rename), add a more meaningful comment, commit
and sync (at the client). The more meaningful comment will replace "xxxxxxxx".
