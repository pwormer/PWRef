<!DOCTYPE html SYSTEM 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PWRef book input preparation </title>
    <meta http-equiv = "content-type" content = "text/html; charset=UTF-8" />
</head>

<body>

<?php     // >

    require_once "../Setup.php";
    Setup();      // Open database, set table and column names
    echo "Opened database <b> " . ucfirst($database). "</b> with character set: " . $pubDB->character_set_name() . "<br><br>\n";
    global $filenames;
    require_once $filenames['Book_class1'];

// Book 1
$authors    = array(
array("I. W. M.", "Smith"),
array("C. S.", "Cockell"),
array("S.", "Leach"));
$editors    = array();
$title = "Astrochemistry and AstrobiologyPhysical Chemistry in Action";
$publisher = "Springer London";
$year = 2013;
$project = "";
$isbn = "";
$url  = "http://books.google.nl/books?id=6MpmLwEACAAJ";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 2
$authors    = array(
array("Miguel A. L.", "Marques"),
array("Neepa T.", "Maitra"),
array("Fernando Manuael", "da Silva Nogueira"),
array("E. K. U.", "Gross"),
array("Angel", "Rubio"));
$editors    = array();
$title = "Fundamentals of Time-Dependent Density Functional TheoryLecture Notes in Physics 837";
$publisher = "Springer, Heidelberg";
$year = 2012;
$project = "";
$isbn = "";
$url  = "www.springerlink.com/content/978-3-642-23517-7";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 3
$authors    = array();
$editors    = array(
array("Lydia", "Pintscher"));
$title = "Open Advice, FOSS: What we wish we had known when we started";
$publisher = "Lydia Pintscher";
$year = 2012;
$project = "";
$isbn = "";
$url  = "http://open-advice.org";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 4
$authors    = array(
array("Simon L.", "Altmann"),
array("Peter", "Herzig"));
$editors    = array();
$title = "Point-Group Theory Tables";
$publisher = "Oxford, Vienna";
$year = 2011;
$project = "";
$isbn = "";
$url  = "http://phaidra.univie.ac.at/o:103913";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 5
$authors    = array();
$editors    = array(
array("Matthias", "Weidemüller"),
array("Claus", "Zimmermanns"));
$title = "Cold atoms and molecules";
$publisher = "Wiley, Weinheim";
$year = 2009;
$project = "pr:cold pr:ultracold";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 6
$authors    = array();
$editors    = array(
array("Roman V.", "Krems"),
array("William C.", "Stwalley"),
array("Bretislav", "Friedrichs"));
$title = "Cold Molecules: Theory, Experiment, Applications";
$publisher = "CRC, Boca Raton";
$year = 2009;
$project = "pr:cold pr:ultracold";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 7
$authors    = array(
array("Patricia", "Gosling"),
array("Bart", "Noordam"));
$editors    = array();
$title = "Mastering your PhD; Survival and success in the doctoral years and beyond";
$publisher = "Springer, New York";
$year = 2009;
$project = "";
$isbn = "";
$url  = "http://www.springer.com/mathematics/book/978-3-642-15846-9";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 8
$authors    = array(
array("Giel", "Berden"),
array("Richard", "Engeln"));
$editors    = array();
$title = "Cavity Ring-Down Spectroscopy: Techniques and Applications";
$publisher = "Wiley";
$year = 2009;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 9
$authors    = array(
array("E.", "Herbst"),
array("T. J.", "Millar"));
$editors    = array();
$title = "Low Temperatures and Cold Molecules";
$publisher = "Imperial College Press, London";
$year = 2008;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 10
$authors    = array(
array("Jean-Michel", "Hartmann"),
array("C.", "Boulet"),
array("D.", "Robert"));
$editors    = array();
$title = "Collisional effects on molecular spectra";
$publisher = "Elsevier";
$year = 2008;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 11
$authors    = array();
$editors    = array(
array("John C.", "Lindon"));
$title = "Encyclopedia of spectroscopy and spectrometry";
$publisher = "Elsevier, amsterdam";
$year = 2007;
$project = "";
$isbn = "";
$url  = "http://proxy.ubn.kun.nl:8080/login?url=http://www.sciencedirect.com/science/referenceworks/9780122266805";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 12
$authors    = array(
array("James", "Lequeux"));
$editors    = array();
$title = "The interstellar medium";
$publisher = "Springer, Berlin";
$year = 2005;
$project = "pr:astro";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 13
$authors    = array(
array("John", "Brown"),
array("Alan", "Carrington"));
$editors    = array();
$title = "Rotational spectroscopy of diatomic molecules";
$publisher = "Cambridge Univerisity Press";
$year = 2003;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 14
$authors    = array(
array("C. J.", "Pethick"),
array("H.", "Smith"));
$editors    = array();
$title = "Bose-Einstein condensation in dilute gases";
$publisher = "Cambridge University Press, Cambridge";
$year = 2002;
$project = "pr:condensate pr:cold pr:ultracold";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 15
$authors    = array(
array("S. A.", "Rice"),
array("M.", "Zhao"));
$editors    = array();
$title = "Optical Control of Molecular Dynamics";
$publisher = "Wiley";
$year = 2000;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 16
$authors    = array(
array("H.", "Hettema"));
$editors    = array();
$title = "Quantum Chemistry: Classic Scientific Papers";
$publisher = "World Scientific, Singapore";
$year = 2000;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 17
$authors    = array(
array("T.", "Helgaker"),
array("P.", "Jørgensen"),
array("J.", "Olsen"));
$editors    = array();
$title = "Molecular Electronic Structure Theory";
$publisher = "Wiley, Chichester";
$year = 2000;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 18
$authors    = array(
array("F.", "Jensen"));
$editors    = array();
$title = "Introduction to computational chemistry";
$publisher = "Chichester, Wiley";
$year = 1999;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 19
$authors    = array(
array("P.", "Ball"));
$editors    = array();
$title = "Life's matrix: A biography of water";
$publisher = "Farrar and Straus and Giroux, New York";
$year = 1999;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 20
$authors    = array(
array("E.", "Anderson"),
array("Z.", "Bai"),
array("C.", "Bischof"),
array("S.", "Blackford"),
array("J.", "Demmel"),
array("J.", "Dongarra"),
array("J.", "Du Croz"),
array("A.", "Greenbaum"),
array("S.", "Hammarling"),
array("A.", "McKenney"),
array("D.", "Sorensen"));
$editors    = array();
$title = "LAPACK Users' Guide, 3rd edition";
$publisher = "Society for Industrial and Applied Mathematics, Philadelphia, PA";
$year = 1999;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 21
$authors    = array(
array("W.", "Demtröder"));
$editors    = array();
$title = "Laser Spectroscopy, 2nd edition";
$publisher = "Springer, Berlin";
$year = 1998;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 22
$authors    = array(
array("P. R.", "Bunker"),
array("P.", "Jensen"));
$editors    = array();
$title = "Molecular symmetry and spectroscopy, 2nd edition";
$publisher = "NRC Research Press, Ottawa";
$year = 1998;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 23
$authors    = array(
array("S.", "Scheiner"));
$editors    = array();
$title = "Hydrogen bonding";
$publisher = "Oxford University Press, New York";
$year = 1997;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 24
$authors    = array();
$editors    = array(
array("D. R.", "Lide"),
array("H. P. R.", "Frederikses"));
$title = "Handbook of Chemistry and Physics";
$publisher = "Chemical Rubber, Boca Raton";
$year = 1997;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 25
$authors    = array(
array("J.", "Warnatz"),
array("U.", "Maas"),
array("R. W.", "Dibble"));
$editors    = array();
$title = "Combustion: Physical and Chemical Fundamentals, Modeling and Simulation, Experiments; Pollutant Formation";
$publisher = "Springer-Verlag, Berlin";
$year = 1996;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 26
$authors    = array(
array("Anthony J.", "Stone"));
$editors    = array();
$title = "The Theory of Intermolecular Forces";
$publisher = "Oxford University Press, Oxford";
$year = 1996;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 27
$authors    = array(
array("G. H.", "Golub"),
array("C.", "Van Loan"));
$editors    = array();
$title = "Matrix Computations, 3rd edition";
$publisher = "Johns Hopkins University Press, Baltimore";
$year = 1996;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 28
$authors    = array(
array("I.", "Glassman"));
$editors    = array();
$title = "Combustion";
$publisher = "Academic Press, New York";
$year = 1996;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 29
$authors    = array(
array("E. R.", "Bernstein"));
$editors    = array();
$title = "Chemical Reactions in Clusters";
$publisher = "Oxford University Press, Oxford";
$year = 1996;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 30
$authors    = array();
$editors    = array(
array("G. C.", "Tabisz"),
array("M. N.", "Neumans"));
$title = "Collision- and Interaction-Induced Spectroscopy, volume 452 of NATO ASI Series C";
$publisher = "Kluwer, Dordrecht";
$year = 1995;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 31
$authors    = array(
array("C. W.", "Gardiner"));
$editors    = array();
$title = "Springer Series in Synergetics";
$publisher = "Springer, Berlin";
$year = 1994;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 32
$authors    = array(
array("L.", "Frommhold"));
$editors    = array();
$title = "Collision-Induced Absorption in Gases";
$publisher = "Cambridge Univ. Press, Cambridge";
$year = 1994;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 33
$authors    = array(
array("S. L.", "Altmann"),
array("P.", "Herzig"));
$editors    = array();
$title = "Point-Group Theory Tables";
$publisher = "Oxford University Press, Oxford";
$year = 1994;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 34
$authors    = array(
array("R.", "Schinke"));
$editors    = array();
$title = "Photodissociation Dynamics";
$publisher = "Cambridge University Press, Cambridge";
$year = 1993;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 35
$authors    = array(
array("R.", "Schinke"));
$editors    = array();
$title = "Photodissociation Dynamics";
$publisher = "Cambridge University Press, Cambridge";
$year = 1993;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 36
$authors    = array(
array("D. M.", "Brink"),
array("G. R.", "Satchler"));
$editors    = array();
$title = "Angular Momentum, 3rd edition";
$publisher = "Clarendon, Oxford";
$year = 1993;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 37
$authors    = array(
array("N. G.", "van Kampen"));
$editors    = array();
$title = "Stochastic Processes in Physics and Chemistry";
$publisher = "Elsevier Science, Amsterdam";
$year = 1992;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 38
$authors    = array(
array("W. H.", "Press"),
array("S. A.", "Teukolsky"),
array("W. T.", "Vetterling"),
array("B. P.", "Flannery"));
$editors    = array();
$title = "Numerical Recipes in C. The Art of Scientific Computing, 2nd edition";
$publisher = "University Press, Cambridge";
$year = 1992;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 39
$authors    = array(
array("H. W.", "Kroto"));
$editors    = array();
$title = "Molecular Rotation Spectra";
$publisher = "Dover, New York";
$year = 1992;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 40
$authors    = array(
array("D. T.", "Gillespie"));
$editors    = array();
$title = "Markov Processes: An Introduction for Physical Scientists";
$publisher = "Academic Press Limited, London";
$year = 1992;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 41
$authors    = array(
array("R. P.", "Wayne"));
$editors    = array();
$title = "An Introduction to the Chemistry of the Atmospheres of Earth, the Planets, and their Satellites";
$publisher = "Oxford University Press, London";
$year = 1991;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 42
$authors    = array();
$editors    = array(
array("N.", "Halberstadt"),
array("K. C.", "Jandas"));
$title = "Dynamics of polyatomic van der Waals complexes, volume 227 of NATO ASI Series B";
$publisher = "Plenum, New York";
$year = 1991;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 43
$authors    = array(
array("G. D.", "Mahan"),
array("K. R.", "Subbaswamy"));
$editors    = array();
$title = "Local density theory of polarizability";
$publisher = "Plenum Press, New York";
$year = 1990;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 44
$authors    = array(
array("A.", "van der Avoird"));
$editors    = array();
$title = "Interacties tussen Moleculen";
$publisher = "Wolters-Noordhoff, Groningen";
$year = 1989;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 45
$authors    = array(
array("R.", "Parr"),
array("W.", "Yang"));
$editors    = array();
$title = "Density-function theory of atoms and molecules";
$publisher = "Oxford University Press, New York";
$year = 1989;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 46
$authors    = array(
array("R.", "McWeeny"));
$editors    = array();
$title = "Methods of Molecular Quantum Mechanics, 2nd edition";
$publisher = "Academic, London";
$year = 1989;
$project = "";
$isbn = "";
$url  = "";
$note = "Chapter 5";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 47
$authors    = array(
array("R. N.", "Zare"));
$editors    = array();
$title = "Angular Momentum";
$publisher = "Wiley, New York";
$year = 1988;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 48
$authors    = array(
array("D. A.", "Varshalovich"),
array("A. N.", "Moskalev"),
array("V. K.", "Khersonskii"));
$editors    = array();
$title = "Quantum Theory of Angular Momentum";
$publisher = "World Scientific, Singapore";
$year = 1988;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 49
$authors    = array(
array("T. J.", "Millar"),
array("D. A.", "Williams"));
$editors    = array();
$title = "Rate coefficients in astrochemistry";
$publisher = "Kluwer, Dordrecht";
$year = 1988;
$project = "pr:astro-ewine";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 50
$authors    = array();
$editors    = array(
array("A.", "Weber"));
$title = "Structure and dynamics of weakly bound molecular complexes, volume 212,";
$publisher = "Reidel Press, Dordrecht";
$year = 1987;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 51
$authors    = array(
array("H.", "Lefebvre-Brion"),
array("R. W.", "Field"));
$editors    = array();
$title = "Perturbations in the spectra of diatomic molecules";
$publisher = "Academic, New York";
$year = 1986;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 52
$authors    = array(
array("I.", "Kaplan"));
$editors    = array();
$title = "Theory of Molecular Interaction";
$publisher = "Elsevier, Netherlands";
$year = 1986;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 53
$authors    = array(
array("D. E.", "Amos"));
$editors    = array();
$title = "A Subroutine Package for Bessel Functions of a Complex Argument and Nonnegative Order";
$publisher = "Sandia National Laboratory Report";
$year = 1985;
$project = "pr:prop";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 54
$authors    = array(
array("D. P.", "Craig"),
array("T.", "Thirunamachandran"));
$editors    = array();
$title = "Molecular quantum electrodynamics";
$publisher = "Academic, London";
$year = 1984;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 55
$authors    = array(
array("Walter", "Glöckle"));
$editors    = array();
$title = "The few body problem";
$publisher = "Springer, Berlin";
$year = 1983;
$project = "pr:scattering";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 56
$authors    = array(
array("I.", "Lindgren"),
array("J.", "Morrison"));
$editors    = array();
$title = "Atomic Many-Body Theory";
$publisher = "Springer-Verlag, Berlin Heidelberg New York";
$year = 1982;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 57
$authors    = array();
$editors    = array(
array("R. C.", "Weast"),
array("M. J.", "Asths"));
$title = "Handbook of Chemistry and Physics";
$publisher = "Chemical Rubber, Boca Raton";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 58
$authors    = array(
array("G. C.", "Maitland"),
array("M.", "Rigby"),
array("E. B.", "Smith"),
array("W. A.", "Wakeham"));
$editors    = array();
$title = "Intermolecular Forces";
$publisher = "Clarendon, Oxford";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 59
$authors    = array(
array("P.", "Jørgensen"),
array("J.", "Simons"));
$editors    = array();
$title = "Second Quantization-Based Methods in Quantum Chemistry";
$publisher = "Academic, New York";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 60
$authors    = array(
array("F.", "Franks"));
$editors    = array();
$title = "Polywater";
$publisher = "M.I.T. Press, Cambridge, Mass";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 61
$authors    = array(
array("Karl", "Blum"));
$editors    = array();
$title = "Density Matrix Theory and ApplicationsPhysics of atoms and molecules";
$publisher = "Plenum, New York";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 62
$authors    = array(
array("L. C.", "Biedenharn"),
array("J. D.", "Louck"));
$editors    = array();
$title = "Angular Momentum in Quantum Physics, volume 8 of Encyclopedia of Mathematics";
$publisher = "Addison-Wesley, Reading";
$year = 1981;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 63
$authors    = array(
array("J.", "Stoer"),
array("R.", "Bulirsch"));
$editors    = array();
$title = "Introduction to Numerical Analysis";
$publisher = "Springer-Verlag, New York";
$year = 1980;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 64
$authors    = array(
array("J. H.", "Dymond"),
array("E. B.", "Smith"));
$editors    = array();
$title = "The Virial Coefficients of Pure Gases and Mixtures";
$publisher = "Clarendon, Oxford";
$year = 1980;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 65
$authors    = array(
array("W.", "Warowny"),
array("J.", "Stecki"));
$editors    = array();
$title = "The Second Cross Virial Coefficients of Gaseous Mixtures";
$publisher = "Polish Scientific Publishers PWN, Warsaw";
$year = 1979;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 66
$authors    = array(
array("K. P.", "Huber"),
array("G.", "Herzberg"));
$editors    = array();
$title = "Molecular Spectra and Molecular Structure. IV. Constants of Diatomic Molecules";
$publisher = "Van Nostrand Reinhold, New York";
$year = 1979;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 67
$authors    = array(
array("Tang", "Au-Chin"));
$editors    = array();
$title = "Theoretical Method of the Ligand Field Theory";
$publisher = "Science Press, Beijing";
$year = 1979;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 68
$authors    = array(
array("H.", "Okabe"));
$editors    = array();
$title = "Photochemistry of small molecules";
$publisher = "Wiley, New York";
$year = 1978;
$project = "pr:astro-ewine";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 69
$authors    = array(
array("F. A.", "Gianturco"));
$editors    = array();
$title = "The Transfer of Molecular Energies by Collision: Recent Quantum Treatments, volume 11 of Lecture Notes in Chemistry";
$publisher = "Springer, New York";
$year = 1978;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 70
$authors    = array(
array("W. H.", "Flygare"));
$editors    = array();
$title = "Molecular Structure and Dynamics";
$publisher = "Prentice-Hall, Englewood Cliffs";
$year = 1978;
$project = "pr:zeeman";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 71
$authors    = array(
array("A. N.", "Tikhonov"),
array("V. Y.", "Arsenin"));
$editors    = array();
$title = "Solutions of Ill-Posed Problems";
$publisher = "Wiley, New York";
$year = 1977;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 72
$authors    = array(
array("D. A.", "McQuarrie"));
$editors    = array();
$title = "Statistical Mechanics";
$publisher = "Harper and Row, New York";
$year = 1976;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 73
$authors    = array(
array("S.", "Califano"));
$editors    = array();
$title = "Vibrational States";
$publisher = "Wiley, New York";
$year = 1976;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 74
$authors    = array(
array("M.", "Mizushima"));
$editors    = array();
$title = "The Theory of Rotating Diatomic Molecules";
$publisher = "Wiley, New York";
$year = 1975;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 75
$authors    = array(
array("L. D.", "Landau"),
array("E. M.", "Lifshitz"));
$editors    = array();
$title = "The Classical theory of fields, 4th edition";
$publisher = "Pergamon, Oxford";
$year = 1975;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 76
$authors    = array(
array("J. D.", "Jackson"));
$editors    = array();
$title = "Classical Electrodymanics, 2nd edition";
$publisher = "Wiley, New York";
$year = 1975;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 77
$authors    = array(
array("W. J. Le", "Noble"));
$editors    = array();
$title = "Highlights of organic chemistry";
$publisher = "Marcel Dekker, New York";
$year = 1974;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 78
$authors    = array(
array("S.", "Gasiorowicz"));
$editors    = array();
$title = "Quantum Physics";
$publisher = "Wiley, New York";
$year = 1974;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 79
$authors    = array(
array("S. T.", "Epstein"));
$editors    = array();
$title = "The Variation Method in Quantum Chemistry";
$publisher = "Academic, New York";
$year = 1974;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 80
$authors    = array(
array("M. S.", "Child"));
$editors    = array();
$title = "Molecular Collision Theory";
$publisher = "Academic, New York";
$year = 1974;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 81
$authors    = array(
array("A.", "van der Avoird"));
$editors    = array();
$title = "Identiteit";
$publisher = "University of Nijmegen";
$year = 1973;
$project = "pr:tc-imm";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 82
$authors    = array(
array("R.", "Loudon"));
$editors    = array();
$title = "The quantum theory of light";
$publisher = "Oxford University Press, Oxford";
$year = 1973;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 83
$authors    = array(
array("J. R.", "Taylor"));
$editors    = array();
$title = "Scattering Theory: The Quantum Theory on Nonrelativistic Collisions";
$publisher = "Wiley, New York";
$year = 1972;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 84
$authors    = array(
array("T.", "Shimanouchi"));
$editors    = array();
$title = "Tables of Molecular Vibrational Frequencies Consolidated, Volume I";
$publisher = "National Bureau of Standards, Gaithersburg";
$year = 1972;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 85
$authors    = array(
array("M.", "Kline"));
$editors    = array();
$title = "Mathematical Thought from Ancient to Modern Times";
$publisher = "Oxford UP, Oxford";
$year = 1972;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 86
$authors    = array(
array("M.", "Abramowitz"),
array("I. A.", "Stegun"));
$editors    = array();
$title = "Handbook of mathematical functions";
$publisher = "Dover, New York";
$year = 1972;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 87
$authors    = array(
array("P. W.", "Atkins"),
array("M. S.", "Child"),
array("C. S. G.", "Phillips"));
$editors    = array();
$title = "Tables for Group Theory";
$publisher = "Oxford University Press, Oxford";
$year = 1970;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 88
$authors    = array(
array("A.", "Messiah"));
$editors    = array();
$title = "Quantum Mechanics";
$publisher = "North Holland, Amsterdam";
$year = 1969;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 89
$authors    = array(
array("H.", "Margenau"),
array("N. R.", "Kestner"));
$editors    = array();
$title = "Theory of Intermolecular forces";
$publisher = "Pergamon, Oxford";
$year = 1969;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 90
$authors    = array(
array("J. D.", "Talman"));
$editors    = array();
$title = "Special Functions. A Group Theoretic Approach";
$publisher = "W. A. Benjamin, New York";
$year = 1968;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 91
$authors    = array(
array("M.", "Hausner"),
array("J. T.", "Schwartz"));
$editors    = array();
$title = "Lie Groups; Lie Algebras";
$publisher = "Gordon and Breach, New York";
$year = 1968;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 92
$authors    = array(
array("L.", "Jansen"),
array("M.", "Boon"));
$editors    = array();
$title = "Theory of Finite Groups. Applications to Physics";
$publisher = "North Holland, Amsterdam";
$year = 1967;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 93
$authors    = array(
array("J. O.", "Hirschfelder"));
$editors    = array();
$title = "Intermolecular Forces Advances in Chemical Physics Vol. 12";
$publisher = "Wiley";
$year = 1967;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 94
$authors    = array(
array("J. T.", "Vanderslice"),
array("H. W.", "Schamp"),
array("E. A.", "Mason"));
$editors    = array();
$title = "Thermodynamics";
$publisher = "Prentice-Hall, Englewood Cliffs, N. J.";
$year = 1966;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 95
$authors    = array(
array("W. C.", "McCrone"));
$editors    = array();
$title = "Physics and Chemistry of the Organic Solid State";
$publisher = "Wiley-VCH, New York";
$year = 1965;
$project = "polymorphism";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 96
$authors    = array(
array("M.", "Abramowitz"),
array("I. A.", "Stegun"));
$editors    = array();
$title = "Handbook of Mathematical Functions";
$publisher = "National Bureau of Standards, Washington, D.C.";
$year = 1964;
$project = "";
$isbn = "";
$url  = "http://www.math.sfu.ca/~cbm/aands";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 97
$authors    = array(
array("H.", "Fröhlich"));
$editors    = array();
$title = "Theory of Dielectrics, Dielectric Constant, and Dielectric Loss";
$publisher = "Clarendon Press, Oxford";
$year = 1963;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 98
$authors    = array(
array("A. P.", "Yutsis"),
array("I. B.", "Levinson"),
array("V. V.", "Vanagas"));
$editors    = array();
$title = "Mathematical Apparatus of the Theory of Angular Momentum";
$publisher = "Israel Program for Scientific Translations, Jerusalem";
$year = 1962;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 99
$authors    = array(
array("M.", "Hamermesh"));
$editors    = array();
$title = "Group Theory and Its Applications to Physical Problems";
$publisher = "Addison-Wesley, Reading";
$year = 1962;
$project = "";
$isbn = "";
$url  = "";
$note = "Sec. 7-12";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 100
$authors    = array(
array("D.", "ter Haar"));
$editors    = array();
$title = "Elements of Statistical Mechanics";
$publisher = "Holt, Rinehart, and Winston, New York";
$year = 1961;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 101
$authors    = array(
array("A. R.", "Edmonds"));
$editors    = array();
$title = "Angular Momentum in Quantum Mechanics, 2nd edition";
$publisher = "Princeton University Press, Pinceton";
$year = 1960;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 102
$authors    = array(
array("M. R.", "Spiegel"));
$editors    = array();
$title = "Vector Analysis and an Introduction to Tensor Analysis";
$publisher = "Schaum's outline series, Mc-Graw-Hill, New York";
$year = 1959;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 103
$authors    = array(
array("L. D.", "Landau"),
array("E. M.", "Lifshitz"));
$editors    = array();
$title = "Quantum mechanics, non-relativistic theory";
$publisher = "Pergamon, London";
$year = 1959;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 104
$authors    = array(
array("L.", "Fox"));
$editors    = array();
$title = "The Numerical Solution of Two-Boundary Problems in Ordinary Differential Equations";
$publisher = "Oxford University Press, London";
$year = 1957;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 105
$authors    = array(
array("H.", "Margenau"),
array("G. M.", "Murphy"));
$editors    = array();
$title = "The Mathematics of Physics and Chemistry";
$publisher = "Van Nostrand, New York";
$year = 1956;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 106
$authors    = array(
array("E. B.", "Wilson"),
array("J. C.", "Decius"),
array("P. C.", "Cross"));
$editors    = array();
$title = "Molecular Vibrations";
$publisher = "McGraw-Hill, New York";
$year = 1955;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 107
$authors    = array(
array("L. I.", "Schiff"));
$editors    = array();
$title = "Quantum Mechanics";
$publisher = "McGraw-Hill Book Company, New York etc.";
$year = 1955;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 108
$authors    = array(
array("J. O.", "Hirschfelder"),
array("C. F.", "Curtiss"),
array("R. B.", "Bird"));
$editors    = array();
$title = "Molecular Theory of Gases and Liquids";
$publisher = "Wiley, New York";
$year = 1954;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 109
$authors    = array(
array("G.", "Herzberg"));
$editors    = array();
$title = "Molecular Spectra and Molecular Structure, Vol. 3: Electronic Spectra and Electronic Structure of Polyatomic Molecules";
$publisher = "Van Nostrand, New York";
$year = 1950;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 110
$authors    = array(
array("G.", "Herzberg"));
$editors    = array();
$title = "Molecular Spectra and Molecular Structure, Vol. 1: Spectra of Diatomic Molecules";
$publisher = "Van Nostrand, New York";
$year = 1950;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 111
$authors    = array(
array("H. C.", "van de Hulst"));
$editors    = array();
$title = "The Solid Particles in Interstellar Space";
$publisher = "Drukkerij Schotanus &amp; Jens, Utrecht, The Netherlands";
$year = 1949;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 112
$authors    = array(
array("G.", "Herzberg"));
$editors    = array();
$title = "Molecular Spectra and Molecular Structure, Vol. 2: Infrared and Raman Spectra of Polyatomic Molecules";
$publisher = "Van Nostrand, New York";
$year = 1945;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 113
$authors    = array(
array("E. C.", "Kemble"));
$editors    = array();
$title = "The Fundamental Principles of Quantum Mechanics";
$publisher = "McGraw-Hill, New-York";
$year = 1937;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 114
$authors    = array(
array("F. E.", "Neumann"));
$editors    = array();
$title = "Vorlesungen &uuml;ber die Theorie des Potentials und der Kugelfunktionen";
$publisher = "B. G. Teubner, Leipzig";
$year = 1887;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);

// Book 115
$authors    = array(
array("E.", "Heine"));
$editors    = array();
$title = "Handbuch der Kugelfunctionen, 2nd edition";
$publisher = "G. Reimer, Berlin";
$year = 1878;
$project = "";
$isbn = "";
$url  = "";
$note = "";
Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note);
unset   ( $authors, $editors,  $title, $publisher, $year, $isbn,
                       $url, $project, $note);
// Booklet 1
$authors    = array(
array("Keith H.", "Hughes"),
array("Gérard", "Parlant"));
$title = "Quantum trajectories";
$year = 2011;
$project = "pr:semiclassical";
$url  = "http://www.ccp6.ac.uk";
$address = "Daresbury";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 2
$authors    = array(
array("Petra", "Rudolf"),
array("Wim", "Ubachs"),
array("Wybren Jan", "Buma"),
array("Ewine", "van Dishoeck"),
array("Gerrit C.", "Groenenboom"),
array("F. Matthias", "Bickelhaupt"),
array("Harold", "Linnartz"),
array("Xander", "Tielens"),
array("Jos", "Oomens"),
array("Pascale", "Ehrenfreund"),
array("Ben", "Feringa"));
$title = "NWO Astrochemistry Program";
$year = 2010;
$project = "pr:astro";
$url  = "http://www.nwo.nl/nwohome.nsf/pages/NWOA_7W7KHR";
$address = "The Netherlands";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 3
$authors    = array(
array("Ewine F.", "van Dishoeck"));
$title = "Diesrede: Nieuw Werelden";
$year = 2009;
$project = "pr:astro";
$url  = "http://www.nieuws.leidenuniv.nl/nieuwsarchief/ewine-van-dishoeck-toont-nieuwe-werelden-in-dies-oratie.html";
$address = "University of Leiden";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 4
$authors    = array(
array("Xander", "Tielens"),
array("Ewine", "van Dishoeck"),
array("Harold", "Linnartz"));
$title = "Toward a Dutch Astrochemistry Network";
$year = 2009;
$project = "pr:astro";
$url  = "";
$address = "Leiden";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 5
$authors    = array(
array("H. Simeon", "Nieman"));
$title = "A fluorescence spectrum of molecular oxygen";
$year = 2008;
$project = "pr:tc-imm";
$url  = "";
$address = "Radboud University Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 6
$authors    = array(
array("Liesbeth M. C.", "Janssen"));
$title = "Spectroscopy and photodissociation of ClO";
$year = 2008;
$project = "pr:tc-imm";
$url  = "";
$address = "Radboud University Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 7
$authors    = array(
array("Liesbeth M. C.", "Janssen"));
$title = "Reduced dimensionality quantum reaction dynamics of OH + CH<sub>4</sub> &rarr; H<sub>2</sub>O + CH<sub>3</sub>";
$year = 2008;
$project = "pr:tc-imm";
$url  = "";
$address = "University of Oxford and Radboud University Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 8
$authors    = array(
array("Peter", "Hertel"));
$title = "Lectures on theoretical physics: linear response theory";
$year = 2008;
$project = "pr:lineshape";
$url  = "http://grk.physik.uni-osnabrueck.de/Reports.php";
$address = "University of Osnabr&uuml;ck, Germany";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 9
$authors    = array(
array("Thomas", "Giesen"));
$title = "Lecture: Rotational spectroscopy in supersonic jets I";
$year = 2008;
$project = "";
$url  = "http://molecular-universe.obspm.fr/summerschool2008";
$address = "Cologne";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 10
$authors    = array(
array("Thomas", "Giesen"));
$title = "Lecture: Rotational spectroscopy in supersonic jets II";
$year = 2008;
$project = "";
$url  = "http://molecular-universe.obspm.fr/summerschool2008";
$address = "Cologne";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 11
$authors    = array(
array("Oskar", "Asvany"));
$title = "Lecture: Deuterium Chemistry";
$year = 2008;
$project = "";
$url  = "http://molecular-universe.obspm.fr/summerschool2008";
$address = "Cologne";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 12
$authors    = array(
array("Peter J. H.", "Denteneer"));
$title = "Second quantization; Lecture notes with course Quantum Theory";
$year = 2007;
$project = "";
$url  = "http://www.lorentz.leidenuniv.nl/~pjhdent";
$address = "Leiden";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 13
$authors    = array(
array("Wim J.", "Briels"));
$title = "Lecture: Statistical physics, coarse graining and stochastic simulations";
$year = 2007;
$project = "";
$url  = "http://cbp.tnw.utwente.nl/Staff/briels.html";
$address = "University of Twente";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 14
$authors    = array(
array("Mark", "Srednicki"));
$title = "Quantum Field Theory";
$year = 2006;
$project = "";
$url  = "http://www.physics.ucsb.edu/~mark/qft.html";
$address = "Santa Barbara";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 15
$authors    = array(
array("Roar A.", "Olsen"),
array("Hannes", "Jonsson"),
array("Thomas", "Bligaard"),
array("Graeme", "Henkelman"));
$title = "Lecture: an introduction to transition state theory";
$year = 2006;
$project = "";
$url  = "http://molsim.chem.uva.nl/han/2006/TSTAndQTSTAndTSLectures.pdf";
$address = "Leiden university";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 16
$authors    = array(
array("David E.", "Manolopoulos"));
$title = "Airy function capture boundary conditions; WKB";
$year = 2006;
$project = "pr:capture";
$url  = "http://physchem.ox.ac.uk/~mano/";
$address = "Vancouver";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 17
$authors    = array(
array("Mark P. J.", "van der Loo"),
array("Gerrit C.", "Groenenboom"));
$title = "Introduction to time-independent scattering theory";
$year = 2005;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 18
$authors    = array(
array("Andrei", "Tokmakoff"));
$title = "5.74, Spring 2005: Introductory Quantum Mechanics II, Lecture 21";
$year = 2005;
$project = "pr:pv";
$url  = "http://ocw.mirror.ac.za/OcwWeb/Chemistry/5-74Spring-2005/LectureNotes/";
$address = "MIT";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 19
$authors    = array(
array("Gerrit C.", "Groenenboom"));
$title = "Lecture: Quantum electrodynamics: one- and two-photon processes";
$year = 2005;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 20
$authors    = array(
array("Andrei", "Tokmakoff"));
$title = "5.74, Spring 2004: Introductory Quantum Mechanics II, Lecture 14";
$year = 2004;
$project = "pr:pv";
$url  = "http://ocw.mit.edu/OcwWeb/Chemistry/5-74Spring-2004/LectureNotes";
$address = "MIT";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 21
$authors    = array(
array("Francesca Maria", "Marchetti"));
$title = "Lecture: iv. BEC-BCS crossover";
$year = 2004;
$project = "pr:condensate pr:ultracold";
$url  = "http://www.tcm.phy.cam.ac.uk/~fmm25/Marchetti_LECTURE4.pdf";
$address = "Cambridge";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 22
$authors    = array(
array("Francesca Maria", "Marchetti"));
$title = "Lecture: ii. Introduction to BEC";
$year = 2004;
$project = "pr:condensate pr:ultracold";
$url  = "http://www.tcm.phy.cam.ac.uk/~fmm25/Marchetti_LECTURE2.pdf";
$address = "Cambridge";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 23
$authors    = array(
array("Francesca Maria", "Marchetti"));
$title = "Lecture: iii. Cold Fermions &amp; Feshbach Resonances";
$year = 2004;
$project = "pr:condensate pr:ultracold";
$url  = "http://www.tcm.phy.cam.ac.uk/~fmm25/Marchetti_LECTURE3.pdf";
$address = "Cambridge";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 24
$authors    = array(
array("Francesca Maria", "Marchetti"));
$title = "Lecture: Cold Fermions, Feshbach Resonances &amp; the BEC-BCS crossover";
$year = 2004;
$project = "pr:condensate pr:ultracold";
$url  = "http://www.tcm.phy.cam.ac.uk/~fmm25/Marchetti_LECTURE1.pdf";
$address = "Cambridge";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 25
$authors    = array(
array("R. J.", "Le Roy"));
$title = "University of Waterloo, Chem. Phys. Res. Rep. No. CP-657R, http://leroy.uwaterloo.ca";
$year = 2004;
$project = "";
$url  = "http://leroy.uwaterloo.ca";
$address = "";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 26
$authors    = array(
array("Thomas", "Haver"));
$title = "F&ouml;rster Resonance Energy Transfer (Term paper)";
$year = 2004;
$project = "pr:pv";
$url  = "http://online.physics.uiuc.edu/courses/phys598OS/fall05/FinalReportFiles/haver_p598ostermpaper1.pdf";
$address = "University of Illinois at Urbana-Champaign";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 27
$authors    = array(
array("Gerrit C.", "Groenenboom"));
$title = "Lecture: Introduction to time-independent scattering theory";
$year = 2004;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 28
$authors    = array(
array("Paul E. S.", "Wormer"));
$title = "The original Renner-Teller effect";
$year = 2003;
$project = "pr:tc-imm";
$url  = "http://www.theochem.ru.nl/~pwormer/Renner.php";
$address = "University of Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 29
$authors    = array(
array("Gert", "van der Zwan"));
$title = "Lecture: Theoretical basis of energy and electron transfer";
$year = 2003;
$project = "pr:pv";
$url  = "http://www.chem.vu.nl/~zwan/notes.html";
$address = "Vrije Universiteit Amsterdam";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 30
$authors    = array(
array("Horst", "Wallrabe"),
array("Masilamani", "Elangovanb"),
array("Almut", "Burchardc"),
array("Margarida", "Barrosoa"));
$title = "Energy transfer efficiency based on one- and two-photon FRET microscopy differentiates between clustered and random distribution of membrane-bound receptor-ligand complexes (SPIE 2002 preprint)";
$year = 2002;
$project = "pr:pv";
$url  = "http://www.toronto.edu/almut/preprints/SPIE2002.pdf";
$address = "University of Virginia";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 31
$authors    = array(
array("Gerrit C.", "Groenenboom"));
$title = "Lecture: Discrete variable representations";
$year = 2001;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 32
$authors    = array(
array("Wolfgang", "Ketterle"));
$title = "Ketterle group progress report year 2000";
$year = 2000;
$project = "pr:condensate pr:ultracold";
$url  = "http://cua.mit.edu/ketterle_group/research.htm";
$address = "CUA, MIT";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 33
$authors    = array(
array("Gerrit C.", "Groenenboom"));
$title = "Lecture: Angular momentum theory";
$year = 1999;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 34
$authors    = array(
array("J. G.", "Snijders"));
$title = "Inleiding verstrooiingstheorie";
$year = 1995;
$project = "pr:tc-imm";
$url  = "";
$address = "Groningen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 35
$authors    = array(
array("A.", "Ernesti"),
array("J. M.", "Hutson"),
array("C. F.", "Roche"));
$title = "Molecular collisions in the atmosphere";
$year = 1995;
$project = "pr:lineshape";
$url  = "http://www.ccp6.ac.uk/publications.htm";
$address = "CCP6, Daresbury";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 36
$authors    = array(
array("R. J.", "Le Roy"));
$title = "University of Waterloo Chemical Physics Research Report CP-329R";
$year = 1993;
$project = "";
$url  = "";
$address = "";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 37
$authors    = array(
array("Gerrit C.", "Groenenboom"),
array("Guillaume S. F.", "Dhont"));
$title = "Lecture: Sparse matrices in quantum chemistry";
$year = 1993;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 38
$authors    = array(
array("Gerrit C.", "Groenenboom"));
$title = "NWO report on the application of the discrete variable representation to the S-matrix version of the kohn variational principle for quantum reactive scattering calculations";
$year = 1992;
$project = "pr:dvr pr:kohn pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 39
$authors    = array(
array("Ad", "van der Avoird"));
$title = "Lecture: Molecular rotations and vibrations";
$year = 1991;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 40
$authors    = array(
array("Paul E. S.", "Wormer"),
array("Ad", "van der Avoird"));
$title = "Lecture: Moleculaire Quantummechanica";
$year = 1990;
$project = "pr:tc-imm";
$url  = "";
$address = "Nijmegen";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 41
$authors    = array(
array("Oren", "Patashnik"));
$title = "Designing BibTeX styles";
$year = 1988;
$project = "";
$url  = "";
$address = "";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 42
$authors    = array(
array("F. B.", "van Duijneveldt"));
$title = "IBM Research Report RJ945";
$year = 1971;
$project = "";
$url  = "";
$address = "";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 43
$authors    = array(
array("L.", "Jansen"));
$title = "Groepentheorie en Toepassingen. II. Representatie-theorie";
$year = 1970;
$project = "";
$url  = "";
$address = "Instituut voor Theoretische Chemie, Universiteit van Amsterdam";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 44
$authors    = array(
array("L.", "Jansen"));
$title = "Groepentheorie en Toepassingen. I. Abstracte groepentheorie";
$year = 1970;
$project = "";
$url  = "";
$address = "Instituut voor Theoretische Chemie, Universiteit van Amsterdam";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Booklet 45
$authors    = array(
array("J.", "Brewer"));
$title = "AFOSR Report No. MRL-2915-C";
$year = 1967;
$project = "";
$url  = "";
$address = "";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);

// Booklet 46
$authors    = array();
$title = "Mathematical and computational methods in R-matrix theory";
$year = 2007;
$project = "";
$url  = "";
$address = "Daresbury, United Kingdom";
Add_booklet( $authors, $address, $title, $year,
                       $url, $project);
unset   (   $authors,  $address, $title, $year,
                       $url, $project);
// Inbook 1
$authors = array(
       array("V.", "Wakelam"),
       array("E.", "Herbst"),
       array("H. M.", "Cuppen"));
$editors = array(
       array("I. W. M.", "Smith"),
       array("C. S.", "Cockell"),
       array("S.", "Leachs"));
$booktitle = "Physical Chemistry in Action, chapter Astrochemistry: Synthesis and Modelling";
$title = "Astrochemistry and Astrobiology";
$year = 2013;
$publisher = "Springer London";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 2
$authors = array(
       array("Stephen J.", "Klippenstein"),
       array("Yuri", "Georgievskii"));
$editors = array(
       array("I. W. M.", "Smith"));
$booktitle = "Low Temperatures and Cold Molecules, page 175";
$title = "Theory of Low Temperature Gas-Phase Reactions";
$year = 2008;
$publisher = "World Scientific, London";
$project = "pr:capture";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 3
$authors = array(
       array("Walter S.", "Struve"));
$editors = array();
$booktitle = "Anoxygenic Photosynthetic Bacteria, volume 2 of Advances in Photosynthesis and Respiration, page 297";
$title = "Theory of Electronic Energy Transfer";
$year = 2004;
$publisher = "Springer, Netherlands";
$project = "pr:pv";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 4
$authors = array(
       array("G.", "Henkelman"),
       array("G.", "Johannesson"),
       array("H.", "Jonsson"));
$editors = array(
       array("S. D.", "Schwartz"));
$booktitle = "Theoretical Methods in Condensed Phase Chemistry";
$title = "Methods for finding saddle points and minimum energy paths";
$year = 2002;
$publisher = "Kluwer, Dordrecht, The Netherlands";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 5
$authors = array(
       array("H.", "Jonsson"),
       array("G", "Mills"),
       array("K. W.", "Jacobsen"));
$editors = array(
       array("B. J.", "Berne"),
       array("G", "Ciccotti"),
       array("D. F.", "Coker"));
$booktitle = "Classical and Quantum Dynamics in Condensed Phase Simulations";
$title = "Nudged elastic band method for finding minimum energy paths of transitions";
$year = 1998;
$publisher = "World Scientific, Singapore";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 6
$authors = array(
       array("H.", "Guo"),
       array("S.", "Sirois"),
       array("E. I.", "Proynov"),
       array("D. R.", "Salahub"));
$editors = array(
       array("D.", "Hadzi"));
$booktitle = "Theoretical Treatments of Hydrogen Bonding, page 49";
$title = "";
$year = 1997;
$publisher = "Wiley, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 7
$authors = array(
       array("W.", "Meyer"),
       array("L.", "Frommhold"));
$editors = array(
       array("G. C.", "Tabisz"),
       array("M. N.", "Neumans"));
$booktitle = "Collision- and Interaction-Induced Spectroscopy, volume 452 of NATO ASI Series C, page 441";
$title = "";
$year = 1995;
$publisher = "Kluwer, Dordrecht";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 8
$authors = array(
       array("K. L. C.", "Hunt"),
       array("X.", "Li"));
$editors = array(
       array("G. C.", "Tabisz"),
       array("M. N.", "Neumans"));
$booktitle = "Collision- and Interaction-Induced Spectroscopy, volume 452 of NATO ASI Series C, page 61";
$title = "";
$year = 1995;
$publisher = "Kluwer, Dordrecht";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 9
$authors = array(
       array("T. K.", "Bose"));
$editors = array(
       array("G. C.", "Tabisz"),
       array("M. N.", "Neumans"));
$booktitle = "Collision- and Interaction-Induced Spectroscopy, volume 452 of NATO ASI Series C, page 77";
$title = "";
$year = 1995;
$publisher = "Kluwer, Dordrecht";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 10
$authors = array(
       array("B.", "Jeziorski"),
       array("R.", "Moszynski"),
       array("A.", "Ratkiewicz"),
       array("S.", "Rybak"),
       array("K.", "Szalewicz"),
       array("H. L.", "Williams"));
$editors = array(
       array("E.", "Clementi"));
$booktitle = "Methods and Techniques in Computational Chemistry: METECC-94, Vol. B Medium Size Systems, page 79";
$title = "";
$year = 1993;
$publisher = "STEF, Cagliari";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 11
$authors = array(
       array("S.", "Green"));
$editors = array(
       array("W. A.", "Wakeham"),
       array("A. S.", "Dickinson"),
       array("F. R. W.", "McCourt"),
       array("V.", "Vesovics"));
$booktitle = "Status and Future Developments in the Study of Transport Properties, page 257";
$title = "";
$year = 1992;
$publisher = "Kluwer, Dordrecht";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 12
$authors = array(
       array("M.", "Faubel"));
$editors = array(
       array("W. A.", "Wakeham"),
       array("A. S.", "Dickinson"),
       array("F. R. W.", "McCourt"),
       array("V.", "Vesovics"));
$booktitle = "Status and Future Developments in the Study of Transport Properties, page 73";
$title = "";
$year = 1992;
$publisher = "Kluwer, Dordrecht";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 13
$authors = array(
       array("B.", "Jeziorski"),
       array("R.", "Moszynski"),
       array("S.", "Rybak"),
       array("K.", "Szalewicz"));
$editors = array(
       array("U.", "Kaldor"));
$booktitle = "Many-Body Methods in Quantum Chemistry, volume 52 of Lecture Notes in Chemistry, page 65";
$title = "";
$year = 1989;
$publisher = "Springer, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 14
$authors = array(
       array("U.", "Buck"));
$editors = array(
       array("G.", "Scoles"));
$booktitle = "Atomic and Molecular Beam Methods, volume 1";
$title = "";
$year = 1988;
$publisher = "Oxford, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 15
$authors = array(
       array("J.", "Warnatz"));
$editors = array();
$booktitle = "";
$title = "Combustion Chemistry, page 97";
$year = 1984;
$publisher = "Springer-Verlag, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 16
$authors = array(
       array("B.", "Jeziorski"),
       array("W.", "Kolos"));
$editors = array(
       array("H.", "Ratajczak"),
       array("W. J.", "Orville-Thomass"));
$booktitle = "Molecular Interactions, volume 3, page 1";
$title = "";
$year = 1982;
$publisher = "Wiley, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 17
$authors = array(
       array("H.", "Pauly"));
$editors = array(
       array("R. B.", "Bernstein"));
$booktitle = "Atom-Molecule Collision Theory, page 111";
$title = "";
$year = 1979;
$publisher = "Plenum, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 18
$authors = array(
       array("William A.", "Lester"));
$editors = array(
       array("William H.", "Miller"));
$booktitle = "Dynamics of molecular collisions, Part A, page 1";
$title = "The N coupled-channel problem";
$year = 1976;
$publisher = "Plenum, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 19
$authors = array(
       array("A.", "Weber"));
$editors = array(
       array("A.", "Anderson"));
$booktitle = "The Raman Effect, volume 2, page 543";
$title = "";
$year = 1973;
$publisher = "M. Dekker, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 20
$authors = array(
       array("K.", "Fox"));
$editors = array(
       array("K. N.", "Rao"),
       array("C. W.", "Mathewss"));
$booktitle = "Molecular Spectroscopy: Modern Research";
$title = "";
$year = 1972;
$publisher = "Academic, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Inbook 21
$authors = array(
       array("C. F.", "Curtiss"));
$editors = array(
       array("H.", "Eyring"));
$booktitle = "Physical Chemistry - An Advanced Treatise, Vol. 2: Statistical Mechanics";
$title = "";
$year = 1967;
$publisher = "Academic, New York";
$project = "";
Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project);
unset ( $authors, $editors, $booktitle, $title, $publisher, $year, $project);

// Incollection 1
$authors = array(
       array("Gerrit C.", "Groenenboom"),
       array("Liesbeth M. C.", "Janssen"));
$editors = array(
       array("M.", "Brouard"),
       array("C.", "Vallance"));
$title = "Cold and ultracold collisions";
$booktitle = "Tutorials in molecular reaction dynamics";
$page = "392";
$publisher = "RSC, Cambridge";
$year = 2010;
$project = "pr:cold";
$isbn = "";
$url = "http://www.rsc.org/Shop/books/2010/9780854041589.asp";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 2
$authors = array(
       array("E.", "Herbst"),
       array("T. J.", "Millar"));
$editors = array(
       array("I. W. M.", "Smith"));
$title = "The chemistry of cold interstellar cloud cores";
$booktitle = "Low Temperature and Cold Molecules";
$page = "";
$publisher = "Imperial College, London";
$year = 2008;
$project = "pr:astro-ewine";
$isbn = "";
$url = "http://www.worldscibooks.com/chemistry/p562.html";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 3
$authors = array(
       array("K.", "Szalewicz"),
       array("G.", "Murdachaew"),
       array("R.", "Bukowski"),
       array("O.", "Akin-Ojo"),
       array("C.", "Leforestier"));
$editors = array(
       array("G.", "Maroulis"),
       array("T.", "Simos"));
$title = "Spectra of water dimer from ab initio calculations";
$booktitle = "Lecture Series on Computer and Computational Science: ICCMSE 2006";
$page = "482";
$publisher = "Brill Academic Publishers, Leiden";
$year = 2006;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 4
$authors = array(
       array("Paul E. S.", "Wormer"),
       array("Ad", "van der Avoird"));
$editors = array(
       array("C. E.", "Dykstra"),
       array("G.", "Frenking"),
       array("K. S.", "Kim"),
       array("G. E.", "Scuseria"));
$title = "Forty years of ab initio calculations on intermolecular forces";
$booktitle = "Theory and applications of computational chemistry. The first forty years";
$page = "1047";
$publisher = "Elsevier, Amsterdam";
$year = 2005;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 5
$authors = array(
       array("Claire", "Vallance"),
       array("Mark", "Brouard"),
       array("Raluca", "Cireasa"),
       array("Andrew P.", "Clark"),
       array("Fabio", "Quadrini"),
       array("Gerrit C.", "Groenenboom"),
       array("Oleg S.", "Vasyutinskii"));
$editors = array(
       array("G. G.", "Balint-Kurti"),
       array("M. P.", "de Miranda"));
$title = "Imaging atomic orbital polarisation in molecular photodissociation";
$booktitle = "Vector Correlation and Alignment in Chemistry";
$page = "29";
$publisher = "Collaborative computational project on molecular quantum dynamics (CCP6), Daresbury, United Kingdom";
$year = 2005;
$project = "";
$isbn = "";
$url = "http://www.ccp6.ac.uk";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 6
$authors = array(
       array("Gerrit C.", "Groenenboom"));
$editors = array(
       array("G. G.", "Balint-Kurti"),
       array("M. P.", "de Miranda"));
$title = "Electrostatic long range effects on photofragment polarization";
$booktitle = "Vector Correlation and Alignment in Chemistry";
$page = "44";
$publisher = "Collaborative computational project on molecular quantum dynamics (CCP6), Daresbury, United Kingdom";
$year = 2005;
$project = "";
$isbn = "";
$url = "http://www.ccp6.ac.uk";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 7
$authors = array(
       array("G. C.", "Groenenboom"),
       array("A.", "van der Avoird"));
$editors = array(
       array("S. C.", "Althorpe"),
       array("G. A.", "Worth"));
$title = "Rotation operator formalism for open shell complexes";
$booktitle = "Quantum Dynamics at Conical Intersections";
$page = "98";
$publisher = "Collaborative computational project on molecular quantum dynamics (CCP6), Daresbury, United Kingdom";
$year = 2004;
$project = "pr:open-shell";
$isbn = "";
$url = "http://www.ccp6.ac.uk";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 8
$authors = array(
       array("J.", "Kłos"),
       array("W. B.", "Zeimen"),
       array("V.", "Lotrich"),
       array("G. C.", "Groenenboom"),
       array("A.", "van der Avoird"));
$editors = array(
       array("A.", "Miani"),
       array("J.", "Tennyson"),
       array("T.", "van Mourik"));
$title = "Adiabatic and diabatic intermolecular potentials for open-shell complexes and their applications";
$booktitle = "High accuracy potentials for quantum dynamics";
$page = "59";
$publisher = "Collaborative computational project on molecular quantum dynamics (CCP6), Daresbury, United Kingdom";
$year = 2003;
$project = "pr:open-shell";
$isbn = "";
$url = "http://www.ccp6.ac.uk";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 9
$authors = array(
       array("Eloy R.", "Wouters"),
       array("Musahid", "Ahmed"),
       array("Darcy S.", "Peterka"),
       array("Allan S.", "Bracker"),
       array("Arthur G.", "Suits"),
       array("Oleg S.", "Vasyutinskii"));
$editors = array(
       array("A. G.", "Suits"),
       array("R. E.", "Continetti"));
$title = "Imaging the atomic orientation and alignment in photodissociation";
$booktitle = "Imaging in Chemical Dynamics";
$page = "";
$publisher = "ACS, Washington";
$year = 2000;
$project = "pr:photodissociation pr:polarization";
$isbn = "";
$url = "http://pubs.acs.org/doi/abs/10.1021/bk-2001-0770.ch015";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 10
$authors = array(
       array("A.", "van der Avoird"),
       array("P. E. S.", "Wormer"));
$editors = array(
       array("S. S.", "Xantheas"));
$title = "Tunneling motions and spectra of hydrogen bonded complexes; the ammonia dimer and the water trimer";
$booktitle = "Recent Theoretical and Experimental Advances in Hydrogen Bonded Clusters";
$page = "129";
$publisher = "Kluwer, Dordrecht";
$year = 2000;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 11
$authors = array(
       array("R.", "Moszynski"),
       array("P. E. S.", "Wormer"),
       array("A.", "van der Avoird"));
$editors = array(
       array("P. R.", "Bunker"),
       array("P.", "Jensen"));
$title = "Symmetry adapted perturbation theory applied to the computation of intermolecular forces";
$booktitle = "Computational Molecular Spectroscopy";
$page = "69";
$publisher = "Wiley, New York";
$year = 2000;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 12
$authors = array(
       array("M. H. M.", "Janssen"),
       array("J. M.", "Teule"),
       array("D. W.", "Neyer"),
       array("D. W.", "Chandler"),
       array("G. C.", "Groenenboom"));
$editors = array(
       array("R.", "Campargue"));
$title = "Imaging of state-to-state photodynamics of nitrous oxide in the 205 nm region of the stratospheric solar window";
$booktitle = "Atomic and Molecular Beams";
$page = "317";
$publisher = "Springer, New York";
$year = 2000;
$project = "pr:N2O pr:photodissociation";
$isbn = "";
$url = "http://www.springer.com/physics/atoms/book/978-3-540-67378-1";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 13
$authors = array(
       array("K.", "Hiraoka"),
       array("T.", "Sato"),
       array("T.", "Takayama"));
$editors = array(
       array("Y. C.", "Minh"),
       array("E. F.", "van Dishoeck"));
$title = "";
$booktitle = "Astrochemistry: From Molecular Clouds to Planetary Systems";
$page = "283";
$publisher = "Astron. Soc. Pacific, Chelse, MI";
$year = 2000;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 14
$authors = array(
       array("A.", "van der Avoird"),
       array("P. E. S.", "Wormer"));
$editors = array(
       array("M.", "Law"),
       array("I.", "Atkinson"),
       array("J. M.", "Hudson"));
$title = "Effects of internal motions in Van der Waals complexes; Ar-CH4 and the water trimer as examples";
$booktitle = "Rovibrational Bound States in Polyatomic Molecules";
$page = "50";
$publisher = "CCP6, Daresbury";
$year = 1999;
$project = "";
$isbn = "";
$url = "http://www.ccp6.ac.uk";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 15
$authors = array(
       array("T. S.", "Zwier"));
$editors = array(
       array("J. M.", "Bowman"),
       array("Z.", "Bačić"));
$title = "The infrared spectroscopy of hydrogen-bonded clusters: Chains, cycles, cubes, and three-dimensional networks";
$booktitle = "Advances in Molecular Vibrations and Collision Dynamics";
$page = "365";
$publisher = "JAI press, Stamford";
$year = 1998;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 16
$authors = array(
       array("D. J.", "Wales"));
$editors = array(
       array("J. M.", "Bowman"),
       array("Z.", "Bačić"));
$title = "Rearrangements and Tunneling in Water Clusters";
$booktitle = "Advances in Molecular Vibrations and Collision Dynamics";
$page = "365";
$publisher = "JAI press, Stamford";
$year = 1998;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 17
$authors = array(
       array("D. E.", "Manolopoulos"));
$editors = array(
       array("P.", "v. R. Schleyer"));
$title = "State-to-State Reactive Scattering";
$booktitle = "The Encyclopedia of Computational Chemistry";
$page = "2699";
$publisher = "Wiley, Chichester";
$year = 1998;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 18
$authors = array(
       array("B.", "Jeziorski"),
       array("K.", "Szalewicz"));
$editors = array(
       array("P.", "von Ragué Schleyer"),
       array("N. L.", "Allinger"),
       array("T.", "Clark"),
       array("J.", "Gasteiger"),
       array("P. A.", "Kollman"),
       array("H. F.", "Schaefer"),
       array("P. R.", "Schreiner"));
$title = "Intermolecular interactions by perturbation theory";
$booktitle = "Encyclopedia of Computational Chemistry";
$page = "1376";
$publisher = "Wiley, New York";
$year = 1998;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 19
$authors = array(
       array("F. B.", "van Duijneveldt"));
$editors = array(
       array("S.", "Scheiner"));
$title = "";
$booktitle = "Molecular Interactions: From van der Waals to Strongly Bound Complexes";
$page = "81";
$publisher = "Wiley, New York";
$year = 1997;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 20
$authors = array(
       array("A.", "van der Avoird"),
       array("P. E. S.", "Wormer"),
       array("R.", "Moszynski"));
$editors = array(
       array("S.", "Scheiner"));
$title = "Theory and Computation of Vibration, Rotation and Tunneling Motions of Van der Waals Complexes and their Spectra";
$booktitle = "Molecular Interactions: From van der Waals to Strongly Bound Complexes";
$page = "105";
$publisher = "Wiley, New York";
$year = 1997;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 21
$authors = array(
       array("M. M.", "Szczęśniak"),
       array("G.", "Chałasiński"));
$editors = array(
       array("S.", "Scheiner"));
$title = "";
$booktitle = "Molecular Interactions: From van der Waals to Strongly Bound Complexes";
$page = "45";
$publisher = "Wiley, New York";
$year = 1997;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 22
$authors = array(
       array("K.", "Szalewicz"),
       array("B.", "Jeziorski"));
$editors = array(
       array("S.", "Scheiner"));
$title = "";
$booktitle = "Molecular Interactions: From van der Waals to Strongly Bound Complexes";
$page = "3";
$publisher = "Wiley, New York";
$year = 1997;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 23
$authors = array(
       array("James D.", "Louck"));
$editors = array(
       array("G. W. F.", "Drake"));
$title = "Angular Momentum Theory";
$booktitle = "Atomic, Molecular, & Optical Physics Handbook";
$page = "6";
$publisher = "AIP, New York";
$year = 1996;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 24
$authors = array(
       array("C.", "Jouvet"),
       array("D.", "Solgadi"));
$editors = array(
       array("E. R.", "Bernstein"));
$title = "";
$booktitle = "Chemical Reactions in Clusters";
$page = "100";
$publisher = "Oxford University Press, Oxford";
$year = 1996;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 25
$authors = array(
       array("T. J.", "Martinez"),
       array("E. A.", "Carter"));
$editors = array(
       array("D. R.", "Yarkony"));
$title = "Pseudospectral Methods Applied to the Electronic Correlation Problem";
$booktitle = "Modern Electronic Structure Theory, Part II";
$page = "1132";
$publisher = "World Scientific, Singapore";
$year = 1995;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 26
$authors = array(
       array("R. J.", "Bartlett"));
$editors = array(
       array("D. R.", "Yarkony"));
$title = "";
$booktitle = "Modern Electronic Structure, Part II";
$page = "1047";
$publisher = "World Scientific, Singapore";
$year = 1995;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 27
$authors = array(
       array("R. J.", "Bartlett"),
       array("J. F.", "Stanton"));
$editors = array(
       array("K. B.", "Lipkowitz"),
       array("D. B.", "Boyd"));
$title = "Applications of Post-Hartree-Fock Methods: A Tutorial";
$booktitle = "Reviews in Computational Chemistry";
$page = "65";
$publisher = "VCH Publishers, New York";
$year = 1994;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 28
$authors = array(
       array("A.", "van der Avoird"));
$editors = array(
       array("W. A.", "Wakeham"));
$title = "Overview on intermolecular potentials";
$booktitle = "Status and Future Developments in Transport Properties";
$page = "1";
$publisher = "Kluwer, Deventer";
$year = 1992;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 29
$authors = array(
       array("R. E.", "Miller"));
$editors = array(
       array("G.", "Scoles"));
$title = "Infrared Spectroscopy";
$booktitle = "Atomic and Molecular Beam Methods";
$page = "192";
$publisher = "Oxford University Press, Oxford";
$year = 1992;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 30
$authors = array(
       array("A.", "van der Avoird"));
$editors = array(
       array("Z. B.", "Maksić"));
$title = "Intermolecular forces and the properties of molecular solids";
$booktitle = "Theoretical Models of Chemical Bonding";
$page = "30";
$publisher = "Springer, Berlin";
$year = 1991;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 31
$authors = array(
       array("J. W. I.", "van Bladel"),
       array("A.", "van der Avoird"));
$editors = array(
       array("N.", "Halberstadt"),
       array("K. C.", "Janda"));
$title = "The infrared photodissociation spectra and the internal mobility of SF6, SiF4, and SiH4 dimers";
$booktitle = "Dynamics of polyatomic van der Waals complexes";
$page = "503";
$publisher = "Plenum, New York";
$year = 1991;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 32
$authors = array(
       array("V.", "Magnasco"),
       array("R.", "McWeeny"));
$editors = array(
       array("Z. B.", "Maksic"));
$title = "";
$booktitle = "Theoretical Models of Chemical Bonding";
$page = "133";
$publisher = "Springer, New York";
$year = 1991;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 33
$authors = array(
       array("T. H. M.", "van den Berg"));
$editors = array(
       array("S.", "Hungklinger"),
       array("W.", "Ludwig"),
       array("G.", "Weiss"));
$title = "Lattice dynamics calculations on adsorbed molecular layers with large amplitude motions";
$booktitle = "Phonons 89";
$page = "907";
$publisher = "World Scientific, Singapore";
$year = 1990;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 34
$authors = array(
       array("J. J.", "Valentini"),
       array("L.", "Phillips"));
$editors = array(
       array("M. N. R.", "Ashfold"),
       array("E.", "Baggott"));
$title = "";
$booktitle = "Advances in gas phase photochemistry and kinetics";
$page = "";
$publisher = "Royal Society of Chemistry, London";
$year = 1989;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 35
$authors = array(
       array("J. N. L.", "Connor"),
       array("W.", "Jakubetz"));
$editors = array(
       array("A.", "Laganà"));
$title = "Dynamics of the light atom transfer reaction Cl + HCl → ClH + Cl";
$booktitle = "Supercomputer Algorithms for Reactivity, Dynamics and Kinetics of Small Molecules";
$page = "395";
$publisher = "Kluwer Dordrecht, The Netherlands";
$year = 1989;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 36
$authors = array(
       array("A. P. J.", "Jansen"),
       array("A.", "van der Avoird"));
$editors = array(
       array("J.", "Lascombe"));
$title = "Magnetic and dynamic properties of solid oxygen and their dependence on external magnetic field";
$booktitle = "Dynamics of Molecular Crystals";
$page = "19";
$publisher = "Elsevier, Amsterdam";
$year = 1987;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 37
$authors = array(
       array("G.", "Brocks"),
       array("A.", "van der Avoird"));
$editors = array(
       array("A.", "Weber"));
$title = "Intermolecular potentials, internal motions and the spectra of Van der Waals molecules";
$booktitle = "Structure and dynamics of weakly bound molecular complexes";
$page = "337";
$publisher = "Reidel Press, Dordrecht";
$year = 1987;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 38
$authors = array(
       array("N. C.", "Handy"),
       array("R. D.", "Amos"),
       array("J. F.", "Gaw"),
       array("J. E.", "Rice"),
       array("E. S.", "Simandiras"),
       array("T. J.", "Lee"),
       array("R. J.", "Harrison"),
       array("G.", "Fitzgerald"),
       array("W. D.", "Laidig"),
       array("R. J.", "Bartlett"));
$editors = array(
       array("P.", "Jørgensen"),
       array("J.", "Simons"));
$title = "";
$booktitle = "Geometrical Derivatives of Energy Surfaces and Molecular Properties";
$page = "179";
$publisher = "Reidel, Dordrecht";
$year = 1986;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 39
$authors = array(
       array("P.", "Claverie"));
$editors = array(
       array("R.", "Daudel"));
$title = "";
$booktitle = "Structure and dynamics of molecular systems";
$page = "";
$publisher = "Reidel, Dordrecht";
$year = 1986;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 40
$authors = array(
       array("G.", "Brocks"),
       array("A.", "van der Avoird"));
$editors = array();$title = "Contribution of bound dimers, (N2)2, to the interaction induced infrared spectrum of nitrogen";
$booktitle = "Phenomena Induced by Intermolecular Interactions, edited by G. Birnbaum, volume 127";
$page = "";
$publisher = "Plenum, New York";
$year = 1985;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 41
$authors = array(
       array("T. K.", "Bose"));
$editors = array(
       array("G.", "Birnbaum"));
$title = "A comparative study of the dielectric, refractive and Kerr virial coefficients";
$booktitle = "Phenomena Induced by Intermolecular Interactions";
$page = "49";
$publisher = "Plenum, New York";
$year = 1985;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 42
$authors = array(
       array("A.", "Borysow"),
       array("L.", "Frommhold"));
$editors = array(
       array("G.", "Birnbaum"));
$title = "The infrared and Raman line shapes of pairs of interacting molecules";
$booktitle = "Phenomena Induced by Intermolecular Interactions";
$page = "67";
$publisher = "Plenum, New York";
$year = 1985;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 43
$authors = array(
       array("J.", "Oddershede"));
$editors = array(
       array("G. H. F.", "Diercksen"),
       array("S.", "Wilson"));
$title = "";
$booktitle = "Methods in Computational Molecular Physics";
$page = "249";
$publisher = "Reidel, Dordrecht";
$year = 1983;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 44
$authors = array(
       array("P. E. S.", "Wormer"));
$editors = array(
       array("J.", "Hinze"));
$title = "On the relation between the unitary group approach and the conventional approaches to the correlation problem";
$booktitle = "The Unitary Group";
$page = "286";
$publisher = "Springer";
$year = 1981;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 45
$authors = array(
       array("A.", "van der Avoird"));
$editors = array(
       array("B.", "Pullman"));
$title = "Intermolecular forces: What can be learned from ab initio calculations?";
$booktitle = "Intermolecular Forces";
$page = "1";
$publisher = "Reidel Press, Dordrecht";
$year = 1981;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 46
$authors = array(
       array("H. J. C.", "Berendsen"),
       array("J. P. M.", "Postma"),
       array("W. F.", "van Gunsteren"),
       array("J.", "Hermans"));
$editors = array(
       array("B.", "Pullman"));
$title = "Interaction Models for Water in Relation to Protein Hydration";
$booktitle = "Intermolecular Forces";
$page = "331";
$publisher = "Reidel, Dordrecht";
$year = 1981;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 47
$authors = array(
       array("A.", "van der Avoird"));
$editors = array(
       array("H.", "Schenk"));
$title = "Ab initio calculations of Van der Waals interactions between molecules";
$booktitle = "Computing in crystallography";
$page = "18";
$publisher = "Delft University Press, Delft";
$year = 1978;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 48
$authors = array(
       array("P.", "Claverie"));
$editors = array(
       array("B.", "Pullman"));
$title = "";
$booktitle = "Intermolecular interactions: From diatomics to biopolymers";
$page = "69";
$publisher = "Wiley, New York";
$year = 1978;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 49
$authors = array(
       array("W. M.", "McLain"),
       array("R. A.", "Harris"));
$editors = array(
       array("E. C.", "Lin"));
$title = "Two-photon Molecular spectroscopy in liquids and gases";
$booktitle = "Excited states";
$page = "1";
$publisher = "Academic, New York";
$year = 1977;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 50
$authors = array(
       array("J. T.", "Hougen"));
$editors = array(
       array("D. A.", "Ramsay"));
$title = "Methane Symmetry Operations";
$booktitle = "International Review of Science";
$page = "75";
$publisher = "Butterworth, London";
$year = 1976;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);

// Incollection 51
$authors = array(
       array("P. W.", "Langhoff"),
       array("M.", "Karplus"));
$editors = array(
       array("G. A.", "Baker"),
       array("J. L.", "Gammel"));
$title = "Application of Padé approximants to dispersion force and optical polarizability computations";
$booktitle = "The Padé approximant in Theoretical Physics";
$page = "41";
$publisher = "Academic, New York";
$year = 1970;
$project = "";
$isbn = "";
$url = "";
$note = "";
Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
unset ( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn, $url, $project, $note);
// Inproceedings 1
$authors    = array(
array("A.", "Pedersen"),
array("J. C.", "Berthet"),
array("H.", "Jonsson"));
$booktitle = "Applied Parallel and Scientific Computing, Revised Selected Papers, Part II, edited by K. Jonasson, 34-44";
$title = "Simulated annealing with coarse graining and distributed computing";
$year = 2012;
$publisher  = "Springer-Verlag, Berlin, Heidelberg";
$url  = "http://dx.doi.org/10.1007/978-3-642-28145-7_4";
$project = "";
$note = "10th International Conference, PARA 2010, Reykjavik, Iceland, June 6-9, 2010";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 2
$authors    = array(
array("E. C.", "Fayolle"),
array("K. I.", "Oberg"),
array("H. M.", "Cuppen"),
array("R.", "Visser"),
array("H.", "Linnartz"));
$booktitle = "EAS Publications Series, volume 58 of EAS Publications Series, 327-331";
$title = "Laboratory H<sub>2</sub>O:CO<sub>2</sub> ice desorption: entrapment and its parameterization with an extended three-phase model";
$year = 2012;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 3
$authors    = array(
array("A. I.", "Vasyunin"),
array("E.", "Herbst"));
$booktitle = "IAU Symposium, volume 280 of IAU Symposium";
$title = "New chemical models for new era observations: a multiphase Monte Carlo model of gas-grain chemistry";
$year = 2011;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 4
$authors    = array(
array("H.", "Linnartz"),
array("J.-B.", "Bossa"),
array("J.", "Bouwman"),
array("H. M.", "Cuppen"),
array("S. H.", "Cuylle"),
array("E. F.", "van Dishoeck"),
array("E. C.", "Fayolle"),
array("G.", "Fedoseev"),
array("G. W.", "Fuchs"),
array("S.", "Ioppolo"),
array("K.", "Isokoski"),
array("T.", "Lamberts"),
array("K. I.", "Oberg"),
array("C.", "Romanzin"),
array("E.", "Tenenbaum"),
array("J.", "Zhen"));
$booktitle = "IAU Symposium, volume 280 of IAU Symposium, 390-404";
$title = "Solid State Pathways towards Molecular Complexity in Space";
$year = 2011;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 5
$authors    = array(
array("F.", "Dulieu"));
$booktitle = "IAU Symposium, edited by J. Cernicharo and R. Bachiller, volume 280 of IAU Symposium, 405-415";
$title = "Water Ice Formation and the o/p Ratio";
$year = 2011;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 6
$authors    = array(
array("Xi", "Chu"),
array("Gerrit C.", "Groenenboom"));
$booktitle = "Proceedings of the Dalgarno celebratory symposium, edited by J. F. Babb, K. Kirby, and H. Sadeghpour, 56-65";
$title = "Linear response time dependent density functional theory for dispersion coefficients between atomic pairs";
$year = 2009;
$publisher  = "World Scientific, Singapore";
$url  = "http://www.amazon.com/Proceedings-Dalgarno-Celebratory-Symposium-Contributions/dp/1848164696/ref=sr_1_1?ie=UTF8&amp;s=books&amp;qid=1262739420&amp;sr=1-1";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 7
$authors    = array(
array("S. B.", "Charnley"),
array("S. B.", "Rodgers"));
$booktitle = "Bioastronomy 2007: Molecules, Microbes and Extraterrestrial Life, edited by K. J. Meech, J. V. Keane, M. J. Mumma, J. L. Siefert, and D. J. Werthimer, volume 420 of Astronomical Society of the Pacific Conference Series, 29, Proceedings of a workshop held 16-20 July 2007 in San Juan, Puerto Rico.";
$title = "Theoretical Models of Complex Molecule Formation on Dust";
$year = 2009;
$publisher  = "";
$url  = "";
$project = "";
$note = "ASP Conference Series, Vol 420";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 8
$authors    = array(
array("H. M.", "Cuppen"),
array("G. W.", "Fuchs"),
array("I.", "Ioppolo"),
array("S. E.", "Bisschop"),
array("K. I.", "Oberg"),
array("E. F.", "van Dishoeck"),
array("H.", "Linnartz"));
$booktitle = "IAU Symposium, edited by S. Kwok and S. Sandford, volume 251 of IAU Symposium, 377-382";
$title = "Formation of alcohols on ice surfaces";
$year = 2008;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 9
$authors    = array(
array("H.", "Linnartz"),
array("K.", "Acharyya"),
array("Z.", "Awad"),
array("S. E.", "Bisschop"),
array("S.", "Bottinelli"),
array("J.", "Bouwman"),
array("H. M.", "Cuppen"),
array("G. W.", "Fuchs"),
array("S.", "Ioppolo"),
array("K. I.", "Oberg"),
array("E. F.", "van Dishoeck"));
$booktitle = "Molecules in Space and Laboratory";
$title = "Solid state astrophysics and -chemistry four questions- four answers";
$year = 2007;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 10
$authors    = array(
array("H.", "Cuppen"),
array("E.", "Herbst"));
$booktitle = "Molecules in Space and Laboratory";
$title = "Monte Carlo Studies of Surface Chemistry";
$year = 2007;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 11
$authors    = array(
array("H. M.", "Cuppen"),
array("E.", "Herbst"));
$booktitle = "IAU Symposium, volume 235 of IAU Symposium, 34P";
$title = "Molecular hydrogen formation on interstellar grains";
$year = 2005;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 12
$authors    = array(
array("A.", "van der Avoird"));
$booktitle = "Verslag Vergadering Afdeling Natuurkunde";
$title = "Waarom is water zo bijzonder?";
$year = 2002;
$publisher  = "Koninklijke Nederlandse Academie van Wetenschappen, Amsterdam";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 13
$authors    = array(
array("H. M.", "Cuppen"),
array("S. X. M.", "Boerrigter"),
array("P.", "Bennema"),
array("H.", "Meekes"));
$booktitle = "Proceedings 9th BIWIC, edited by J. Ulrich, page 5";
$title = "The growth morphology of monoclinic paracetamol predicted by Monte Carlo simulations";
$year = 2002;
$publisher  = "Unversit&auml;tsdruckerei Halle-Wittenberg";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 14
$authors    = array(
array("W. J. P.", "van Enckevort"),
array("E.", "van Veenendaal"),
array("P.", "van Beurden"),
array("H.", "Cuppen"),
array("J.", "van Suchtelen"),
array("F. K.", "de Theije"));
$booktitle = "Diamond Conference";
$title = "Theory of Diamond Etching";
$year = 2000;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 15
$authors    = array(
array("R.", "Moszynski"),
array("B.", "Jeziorski"),
array("P. E. S.", "Wormer"),
array("E. H. T.", "Olthof"),
array("A.", "van der Avoird"));
$booktitle = "New Challenges in Computational Quantum Chemistry, edited by R. Broer, 9-11";
$title = "Computation of accurate intermolecular potentials and the spectra of Van der Waals molecules";
$year = 1994;
$publisher  = "Van Denderen, Groningen";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 16
$authors    = array(
array("P. E. S.", "Wormer"));
$booktitle = "Verslag van Symposium ``Molecuul Muis Manuscript'', 45-51";
$title = "Het wiskundig tekstverwerkingspakket  T<sub>E</sub> X";
$year = 1991;
$publisher  = "KNCV Sectie Computertoepassing";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 17
$authors    = array(
array("A.", "van der Avoird"));
$booktitle = "Verslag Vergadering Afdeling Natuurkunde";
$title = "Van der Waals moleculen";
$year = 1991;
$publisher  = "Koninklijke Nederlandse Academie van Wetenschappen, Amsterdam";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 18
$authors    = array(
array("M.", "Bulski"),
array("M. M.", "Szczęśniak"),
array("S.", "Scheiner"));
$booktitle = "Proceedings ``Symposium on Quantum Chemistry'', 11, Tatransk&aacute; Lomnica, Czechoslovakia";
$title = "Axilrod-Teller-Muto nonadditivity and determination of three-body potentials";
$year = 1988;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 19
$authors    = array(
array("P. E. S.", "Wormer"));
$booktitle = "Proceedings ``SURF Symposium'', 155-161, Delft";
$title = "Ervaring met  T<sub>E</sub> X op een MS-DOS PC";
$year = 1987;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 20
$authors    = array(
array("A. G. G. M.", "Tielens"),
array("L. J.", "Allamandola"));
$booktitle = "Interstellar Processes, edited by D. J. Hollenbach and H. A. Thronson, volume 134 of Astrophysics and Space Science Library, 397-469";
$title = "Composition, structure, and chemistry of interstellar dust";
$year = 1987;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 21
$authors    = array(
array("W.", "Rijks"),
array("P. E. S.", "Wormer"));
$booktitle = "Proceedings 7th Seminar on Computational Methods in Quantum Chemistry, York";
$title = "Calculation of correlated frequency-dependent polarizabilities and dispersion coefficients";
$year = 1987;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 22
$authors    = array(
array("F.", "Visser"),
array("W. P. J. H.", "Jacobs"),
array("P. E. S.", "Wormer"));
$booktitle = "Proceedings 6th Seminar on Computational Methods in Quantum Chemistry";
$title = "Correlation effects in dynamic polarizabilities and Van der Waals coefficients";
$year = 1984;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 23
$authors    = array(
array("M. C.", "van Hemert"),
array("P. E. S.", "Wormer"),
array("A.", "van der Avoird"));
$booktitle = "Rapportage supercomputer projecten (Cie Struch)";
$title = "Spin-afhankelijke intermoleculaire potentialen";
$year = 1983;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 24
$authors    = array(
array("J.", "Tennyson"));
$booktitle = "volume 23 of Studies in Phys. and Theoret. Chem., 409";
$title = "Ab initio ro-vibrational spectra of non-rigid molecules";
$year = 1983;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 25
$authors    = array(
array("A.", "van der Avoird"));
$booktitle = "Verslag Vergadering Afdeling Natuurkunde";
$title = "Meten of rekenen? Een quantummechanische studie van de krachten tussen moleculen en de eigenschappen van materie";
$year = 1982;
$publisher  = "Koninklijke Nederlandse Academie van Wetenschappen, Amsterdam";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 26
$authors    = array(
array("A.", "van der Avoird"));
$booktitle = "Proceedings 10th Molecular Crystal Symposium, 292-294, St. Jovite";
$title = "Ab initio quantumdynamical study of internal motions in N<sub>2</sub> crystals and N<sub>2</sub> dimers";
$year = 1982;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 27
$authors    = array(
array("F.", "Barocchi"),
array("P.", "Mazzinghi"),
array("M.", "Zoppi"));
$booktitle = "Intermolecular Spectroscopy and Dynamical Properties of Dense Systems, Proceedings of the International School ``Enrico Fermi'', Course LXXV, edited by J. van Kranendonk, 263";
$title = "";
$year = 1981;
$publisher  = "North-Holland, Amsterdam";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 28
$authors    = array(
array("P. E. S.", "Wormer"));
$booktitle = "Proceedings of the Daresbury Study Weekend, 17-18 November 1979, edited by M. F. Guest and S. Wilson, 49-59";
$title = "Are there viable alternatives to the Gelfand basis?";
$year = 1979;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 29
$authors    = array(
array("T.", "Wasiutynski"));
$booktitle = "Proceedings International Conference on Lattice Dynamics, Paris, September 5-9, 1977, edited by M. Balkanski, 490-491";
$title = "Self-consistent phonon calculation for solid ethylene";
$year = 1978;
$publisher  = "Flammarion, Paris";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 30
$authors    = array(
array("P. J. M.", "Geurts"),
array("A.", "van der Avoird"));
$booktitle = "Proceedings International Conference Vibrations on adsorbed layers, edited by H. Ibach and S. Lehwald, 11, J&uuml;lich";
$title = "Calculations for different adsorption states of acetylene on nickel";
$year = 1978;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Inproceedings 31
$authors    = array(
array("A.", "van der Avoird"));
$booktitle = "Future of quantum chemistry. A symposium in honour of Per-Olov L&ouml;wdin, Dalseter, Norway";
$title = "Summary of present research activities";
$year = 1976;
$publisher  = "";
$url  = "";
$project = "";
$note = "";
Add_inproceedings( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);
unset   ( $authors, $booktitle, $title,
                     $publisher, $year, $url, $project, $note);

// Manual 1
$authors = array();
$year = 2013;
$organization = "The MathWorks, Inc.";
$key = "matlab:13a";
$note = "";
$url = "http://www.mathworks.com";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 2
$authors = array();
$year = 2012;
$organization = "Scilab Enterprises";
$key = "scilab";
$note = "";
$url = "http://www.scilab.org";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 3
$authors = array();
$year = 2011;
$organization = "The MathWorks, Inc.";
$key = "matlab:11";
$note = "http://www.mathworks.com";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 4
$authors = array();
$year = 2010;
$organization = "The MathWorks, Inc.";
$key = "matlab:10";
$note = "http://www.mathworks.com";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 5
$authors = array();
$year = 2009;
$organization = "The MathWorks, Inc.";
$key = "matlab:09";
$note = "http://www.mathworks.com";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 6
$authors = array(
       array("Robert", "Bukowski"),
       array("Wojciech", "Cencek"),
       array("Piotr", "Jankowski"),
       array("Małgorzata", "Jeziorska"),
       array("Bogumił", "Jeziorski"),
       array("Stanisław A.", "Kucharski"),
       array("Victor F.", "Lotrich"),
       array("Alston J.", "Misquitta"),
       array("Robert", "Moszynski"),
       array("Konrad", "Patkowski"),
       array("Rafał", "Podeszwa"),
       array("Stanisław", "Rybak"),
       array("Krzysztof", "Szalewicz"),
       array("Hayes L.", "Williams"),
       array("Richard J.", "Wheatley"),
       array("Paul E. S.", "Wormer"),
       array("Piotr S.", "Żuchowski"),
       array("University", "of Delaware"),
       array("University", "of Warsaw"));
$year = 2008;
$organization = "";
$key = "sapt:08";
$note = "";
$url = "http://www.physics.udel.edu/~szalewic/SAPT/SAPT.html";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 7
$authors = array();
$year = 2002;
$organization = "The MathWorks, Inc.3 Apple Hill Drive, Natick, MA";
$key = "matlab:02";
$note = "http://www.mathworks.com/";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 8
$authors = array(
       array("P. E. S.", "Wormer"),
       array("R.", "Moszynski"));
$year = 1996;
$organization = "";
$key = "sapt3:96";
$note = "";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 9
$authors = array(
       array("J. F.", "Stanton"),
       array("J.", "Gauss"),
       array("J. D.", "Watts"));
$year = 1996;
$organization = "";
$key = "aces";
$note = "University of Florida 32611";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 10
$authors = array();
$year = 1996;
$organization = "The MathWorks, Inc.24 Prime Park Way, Natick, MA";
$key = "matlab";
$note = "http://www.mathworks.com/";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 11
$authors = array(
       array("R.", "Bukowski"),
       array("P.", "Jankowski"),
       array("B.", "Jeziorski"),
       array("M.", "Jeziorska"),
       array("S. A.", "Kucharski"),
       array("R.", "Moszynski"),
       array("S.", "Rybak"),
       array("K.", "Szalewicz"),
       array("H. L.", "Williams"),
       array("P. E. S.", "Wormer"),
       array("University", "of Delaware"),
       array("University", "of Warsaw"));
$year = 1996;
$organization = "";
$key = "sapt2:96";
$note = "";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 12
$authors = array(
       array("P. E. S.", "Wormer"),
       array("H.", "Hettema"));
$year = 1992;
$organization = "";
$key = "polcor:92";
$note = "";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 13
$authors = array(
       array("V. R.", "Saunders"),
       array("M. F.", "Guest"));
$year = 1;
$organization = "Daresbury Laboratory, UK";
$key = "atmol";
$note = "";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Manual 14
$authors = array();
$year = 2005;
$organization = "";
$key = "dalton2";
$note = "http://www.kjemi.uio.no/software/dalton/dalton.html";
$url = "";
Add_manual( $authors, $organization, $year, $key, $note, $url);
unset ( $authors, $organization, $year, $key, $note, $url);

// Master thesis 1
$authors    = array(
array("Dick", "Tanis"));
$school  = "Theoretical Chemistry, IMM, Radboud University Nijmegen";
$title = "Three-dimensional potentials of the  X<sup>2</sup>&Pi; state of the OH-He complex";
$year = 2012;
$url  = "";
$project = "pr:He-OH pr:tc-imm";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 2
$authors    = array(
array("Marloes A.", "van Beek"));
$school  = "Theoretical Chemistry, IMM, Radboud University Nijmegen";
$title = "The photodissociation of ClO";
$year = 2011;
$url  = "";
$project = "pr:open-shell pr:tc-imm";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 3
$authors    = array(
array("Jolijn", "Onvlee"));
$school  = "Molecular and Laser Physics and Theoretical Chemistry, IMM, Radboud University Nijmegen";
$title = "Photodissociation of OH<sup>+</sup> and H<sub>2</sub>O<sup>+</sup>";
$year = 2011;
$url  = "";
$project = "pr:OH+ pr:tc-imm";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 4
$authors    = array(
array("Vivike J. F.", "Lapoutre"));
$school  = "Theoretical Chemistry, IMM, Radboud University Nijmegen";
$title = "The potential energy surfaces of Ga-HCN";
$year = 2008;
$url  = "";
$project = "pr:open-shell pr:tc-imm";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 5
$authors    = array(
array("Axel", "Schubert"));
$school  = "Institut f&uuml;r Quantenoptik der Universit&auml;t Hannover";
$title = "Lebensdauermessungen am SO<sub>2</sub>-Molek&uuml;l";
$year = 1995;
$url  = "";
$project = "pr:SO2 pr:cold";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 6
$authors    = array(
array("Jan-Erik", "Szankowski"));
$school  = "Universit&auml;t Hannover";
$title = "Laserspektroskopie am elektronisch angeregten SO<sub>2</sub>";
$year = 1994;
$url  = "";
$project = "pr:SO2 pr:cold";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Master thesis 7
$authors    = array(
array("Carsten", "Braatz"));
$school  = "Institut f&uuml;r Atom- und Molek&uuml;lphysik - abteilung Spektroskopie der Universit&auml;t Hannover";
$title = "Erprobung einer Molekularstrahlapparatur zur Untersuchung der zustandsselektiven Photodissoziation von SO<sub>2</sub>";
$year = 1993;
$url  = "";
$project = "pr:SO2 pr:cold";
Add_mastersthesis( $authors,  $school, $title, $year, $url, $project);
unset ( $authors,  $school, $title, $year, $url, $project);

// Misc 1
$authors    = array(
array("Bernd", "Ensing"));
$address = "";
$title = "";
$key   = "ensing:14";
$year = 2014;
$note = "private communication";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 2
$authors    = array(
array("H. J.", "Werner"),
array("P. J.", "Knowles"),
array("G.", "Knizia"),
array("F. R.", "Manby"),
array("M.", "Schütz"));
$address = "Cardiff, UK";
$title = "Molpro, version 2010.1, a package of ab initio programs";
$key   = "werner:10";
$year = 2010;
$note = "see http://www.molpro.net";
$url  = "";
$project = "pr:hco";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 3
$authors    = array(
array("Timothy Van", "Zandt"));
$address = "Insead, France";
$title = "PSTricks: PostScript macros for Generic TeX. User's Guide";
$key   = "pstricks:07";
$year = 2007;
$note = "";
$url  = "www.ctan.org/tex-archive/graphics/pstricks/base/doc/pst-user.pdf";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 4
$authors    = array(
array("S. G.", "Lias"));
$address = "";
$title = "Ionization Energy Evaluation, in NIST Chemistry WebBook, NIST Standard Reference Database Number 69";
$key   = "NIST_lias";
$year = 2007;
$note = "";
$url  = "http://webbook.nist.gov";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 5
$authors    = array(
array("E.", "Tiemann"));
$address = "";
$title = "Deceleration of SO<sub>2</sub>";
$key   = "tiemann:05";
$year = 2005;
$note = "";
$url  = "http://www.iqo.uni-hannover.de/tiemann/so2";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 6
$authors    = array(
array("", "LaTeX3 Project Team"));
$address = "";
$title = "LaTeX2&epsilon; font selection";
$key   = "fntguide:00";
$year = 2000;
$note = "";
$url  = "www.latex-project.org/guides/fntguide.pdf";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 7
$authors    = array(
array("M. J.", "Frisch"),
array("G. W.", "Trucks"),
array("H. B.", "Schlegel"));
$address = "";
$title = "";
$key   = "gaussian:98a";
$year = 1998;
$note = "Gaussian 98, Revision A.1, Gaussian, Inc., Pittsburgh, PA";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 8
$authors    = array(
array("P. E. S.", "Wormer"),
array("H.", "Hettema"));
$address = "";
$title = "";
$key   = "polcor:XX92";
$year = 1992;
$note = "Polcor package, Nijmegen";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 9
$authors    = array(
array("K. P.", "Huber"),
array("G.", "Herzberg"));
$address = "";
$title = "";
$key   = "NIST:76";
$year = 1976;
$note = "Constants of diatomic molecules; Diatomic Constants for D<sub>2</sub>, in http://webbook.nist.gov";
$url  = "http://webbook.nist.gov";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 10
$authors    = array(
array("H.-J.", "Werner"),
array("P. J.", "Knowles"));
$address = "";
$title = "molpro: a package of ab initio programs, version 2010.1";
$key   = "molpro09";
$year = 1;
$note = "";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 11
$authors    = array(
array("H.-J.", "Werner"),
array("P. J.", "Knowles"));
$address = "";
$title = "molpro quantum chemistry package, version 2006.1";
$key   = "molpro:06";
$year = 1;
$note = "";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 12
$authors    = array(
array("H.-J.", "Werner"),
array("P. J.", "Knowles"));
$address = "";
$title = "molpro: a package of ab initio programs, version 2010.1";
$key   = "molpro:10";
$year = 1;
$note = "";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 13
$authors    = array(
array("H.-J.", "Werner"),
array("P. J.", "Knowles"));
$address = "";
$title = "molpro: a package of ab initio programs, version 2009.1";
$key   = "molpro:09";
$year = 1;
$note = "";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 14
$authors    = array();
$address = "";
$title = "";
$key   = "thomson:48";
$year = 1;
$note = "W. Thomson, Cambridge Philosophical Society Proceedings, 66 (1848).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 15
$authors    = array();
$address = "";
$title = "";
$key   = "sapt:XX08";
$year = 1;
$note = "R. Bukowski   SAPT2008: An Ab Initio Program for Many-Body Symmetry-Adapted Perturbation Theory Calculations of Intermolecular Interaction Energies, University of Delaware and University of Warsaw, 2008";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 16
$authors    = array();
$address = "";
$title = "";
$key   = "polpak";
$year = 1;
$note = "POLPAK - Recursive Polynomials, by J. Burkardt, School for Computational Science, Florida State University";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 17
$authors    = array();
$address = "";
$title = "MOLPRO";
$key   = "molprourl:05";
$year = 1;
$note = "";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 18
$authors    = array();
$address = "";
$title = "";
$key   = "molpro";
$year = 1;
$note = "Molpro is a package of  ab initio programs written by H.-J. Werner and P. J. Knowles, with contributions from R. D. Amos, A. Berning, D. L.Cooper, M. J. O. Deegan, A. J. Dobbyn, F. Eckert, C. Hampel, T. Leininger, R. Lindh, A. W. Lloyd, W. Meyer, M. E. Mura, A. Nicklass, P.Palmieri, K. Peterson, R. Pitzer, P. Pulay, G. Rauhut, M. Sch&uuml;tz, H. Stoll, A. J. Stone and T. Thorsteinsson.";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 19
$authors    = array();
$address = "";
$title = "MOLPRO is a package of ab initio programs written by H.-J. Werner and P. J. Knowles, with contributions from R. D. Amos, A. Berning, D. L. Cooper, M. J. O. Deegan, A. J. Dobbyn, F. Eckert, C. Hampel, T. Leininger, R. Lindh, A. W. Lloyd, W. Meyer, M. E. Mura, A. Nicklass, P. Palmieri, K. Peterson, R. Pitzer, P. Pulay, G. Rauhut, M. Sch&uuml;tz, H. Stoll, A. J. Stone, and T. Thorsteinsson";
$key   = "MOLPRO98";
$year = 1;
$note = "";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 20
$authors    = array();
$address = "";
$title = "";
$key   = "molpro:98";
$year = 1;
$note = "MOLPRO is a package of  ab initio programs written by H.-J. Werner and P. J. Knowles, with contributions from J. Alml&ouml;f, R. D. Amos, A. Berning, D. L. Cooper, M. J. O. Deegan, A. J. Dobbyn, F. Eckert, S. T. Elbert, C. Hampel, R. Lindh, A. W. Lloyd, W. Meyer, A. Nicklass, K. Peterson, R. Pitzer, A. J. Stone, P. R. Taylor, M. E. Mura, P. Pulay, M. Sch&uuml;tz, H. Stoll and T. Thorsteinsson.";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 21
$authors    = array();
$address = "";
$title = "MOLPRO is a package of ab initio programs written by H.-J. Werner and P. J. Knowles, with contributions from R. D. Amos, A. Berning, D. L. Cooper, M. J. O. Deegan, A. J. Dobbyn, F. Eckert, C. Hampel, T. Leininger, R. Lindh, A. W. Lloyd, W. Meyer, M. E. Mura, A. Nicklass, P. Palmieri, K. Peterson, R. Pitzer, P. Pulay, G. Rauhut, M. Sch&uuml;tz, H. Stoll, A. J. Stone, and T. Thorsteinsson";
$key   = "MOLPRO2000";
$year = 1;
$note = "";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 22
$authors    = array();
$address = "";
$title = "";
$key   = "molpro:02";
$year = 1;
$note = "MOLPRO, a package of  ab initio programs designed by H.-J. Werner and P. J. Knowles";
$url  = "http://www.molpro.net";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 23
$authors    = array();
$address = "";
$title = "";
$key   = "matlab:XX";
$year = 1;
$note = "Matlab, The MathWorks, Inc., http://www.mathworks.com.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 24
$authors    = array();
$address = "";
$title = "";
$key   = "lib:29";
$year = 1;
$note = "Library of useful knowledge: Natural philosophy, Society for the Diffusion of Useful Knowledge, Great Britian, Chapter VIII, 39 (1829).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 25
$authors    = array();
$address = "";
$title = "";
$key   = "kraemer:XX06";
$year = 1;
$note = "T. Kraemer Nature  440, 315 (2006).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 26
$authors    = array(
array("J. M.", "Hutson"),
array("S.", "Green"));
$address = "";
$title = "";
$key   = "molscat:94";
$year = 1;
$note = "Molscat computer code, version 14 (1994), distributed by Collaborative Computational Project No. 6 of the Engineering and Physical Sciences Research Council (UK)";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 27
$authors    = array();
$address = "";
$title = "";
$key   = "gaussian:98";
$year = 1;
$note = "Gaussian 98, Revision A.5, is written by M. J. Frisch and G. W. Trucks and H. B. Schlegel and G. E. Scuseria and M. A. Robb and J. R. Cheeseman and V. G. Zakrzewski and J. A. Montgomery and  R. E. Stratmann and J. C. Burant and S. Dapprich and J. M. Millam and A. D. Daniels and K. N. Kudin and M. C. Strain and O. Farkas and J. Tomasi and V. Barone and M. Cossi and R. Cammi and B. Mennucci and C. Pomelli and C. Adamo and S. Clifford and J. Ochterski and G. A. Petersson and P. Y. Ayala and Q. Cui and K. Morokuma and D. K. Malick and A. D. Rabuck and K. Raghavachari and J. B. Foresman and J. Cioslowski and J. V. Ortiz and B. B. Stefanov and G. Liu and A. Liashenko and P. Piskorz and I. Komaromi and R. Gomperts and R. L. Martin and D. J. Fox and T. Keith and M. A. Al-Laham and C. Y. Peng and A. Nanayakkara and C. Gonzalez and M. Challacombe and P. M. W. Gill and B. Johnson and W. Chen and M. W. Wong and J. L. Andres and C. Gonzalez and M. Head-Gordon and E. S. Replogle and J. A. Pople. Gaussian, Inc., Pittsburgh PA, 1998.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 28
$authors    = array();
$address = "";
$title = "";
$key   = "gaussian:94";
$year = 1;
$note = "Gaussian 94 is written by M. J. Frisch and G. W. Trucks and H. B. Schlegel and P. M. W. Gill and B. G. Johnson and M. A. Robb and J. R. Cheeseman and T. Keith and G. A. Petersson and J. A. Montgomery and K. Raghavachari and M. A. Al-Laham and V. G. Zakrewski and J. V. Ortiz and J. B. Foresman and C.Y. Peng and P. Y. Ayala and W. Chen and M. W. Wong and J. L. Andres and E. S. Replogle and R. Gomperts and R. L. Martin and D. J. Fox and J. S. Binkley and D. J. Defrees and J. Baker and J. P. Stewart and M. Head-Gordon and C. Gonzalez and J. A. Pople.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 29
$authors    = array();
$address = "";
$title = "";
$key   = "gaussian:92";
$year = 1992;
$note = "GAUSSIAN 92, M. J. Frish, G. W. Trucks, M. Head-Gordon, P. M. W. Gill, M. W. Wong, J. B. Foresman, B. G. Johnson, H. B. Schlegel, M. A. Robb, E. S. Replogle, R. Gomperts, J. L. Andres, K. Raghavachari, J. S. Binkley, C. Gonzalez, R. L. Martin, D. J. Fox, D. J. Defrees, J. Baker, J. J. P. Stewart and J. A. Pople";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 30
$authors    = array();
$address = "";
$title = "";
$key   = "gap:08";
$year = 1;
$note = "The GAP Group, emphGAP - Groups, Algorithms, and Programming, Version 4.4.12; 2008, verb+(http://www.gap-system.org)+.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 31
$authors    = array(
array("M. J.", "Frisch"),
array("G. W.", "Trucks"),
array("H. B.", "Schlegel"),
array("G. E.", "Scuseria"),
array("M. A.", "Robb"),
array("J. R.", "Cheeseman"),
array("G.", "Scalmani"),
array("V.", "Barone"),
array("B.", "Mennucci"),
array("G. A.", "Petersson"),
array("H.", "Nakatsuji"),
array("M.", "Caricato"),
array("X.", "Li"),
array("H. P.", "Hratchian"),
array("A. F.", "Izmaylov"),
array("J.", "Bloino"),
array("G.", "Zheng"),
array("J. L.", "Sonnenberg"),
array("M.", "Hada"),
array("M.", "Ehara"),
array("K.", "Toyota"),
array("R.", "Fukuda"),
array("J.", "Hasegawa"),
array("M.", "Ishida"),
array("T.", "Nakajima"),
array("Y.", "Honda"),
array("O.", "Kitao"),
array("H.", "Nakai"),
array("T.", "Vreven"),
array("J. A.", "Montgomery"),
array("J. E.", "Peralta"),
array("F.", "Ogliaro"),
array("M.", "Bearpark"),
array("J. J.", "Heyd"),
array("E.", "Brothers"),
array("K. N.", "Kudin"),
array("V. N.", "Staroverov"),
array("R.", "Kobayashi"),
array("J.", "Normand"),
array("K.", "Raghavachari"),
array("A.", "Rendell"),
array("J. C.", "Burant"),
array("S. S.", "Iyengar"),
array("J.", "Tomasi"),
array("M.", "Cossi"),
array("N.", "Rega"),
array("J. M.", "Millam"),
array("M.", "Klene"),
array("J. E.", "Knox"),
array("J. B.", "Cross"),
array("V.", "Bakken"),
array("C.", "Adamo"),
array("J.", "Jaramillo"),
array("R.", "Gomperts"),
array("R. E.", "Stratmann"),
array("O.", "Yazyev"),
array("A. J.", "Austin"),
array("R.", "Cammi"),
array("C.", "Pomelli"),
array("J. W.", "Ochterski"),
array("R. L.", "Martin"),
array("K.", "Morokuma"),
array("V. G.", "Zakrzewski"),
array("G. A.", "Voth"),
array("P.", "Salvador"),
array("J. J.", "Dannenberg"),
array("S.", "Dapprich"),
array("A. D.", "Daniels"),
array("Ö.", "Farkas"),
array("J. B.", "Foresman"),
array("J. V.", "Ortiz"),
array("J.", "Cioslowski"),
array("D. J.", "Fox"));
$address = "";
$title = "Gaussian 09 Revision D.01";
$key   = "gaussian:09";
$year = 1;
$note = "Gaussian Inc. Wallingford CT 2009";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 32
$authors    = array();
$address = "";
$title = "Structure and Dynamics of Van der Waals Complexes";
$key   = "faraday:94";
$year = 1994;
$note = "";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 33
$authors    = array();
$address = "";
$title = "";
$key   = "faraday:23";
$year = 1;
$note = "Annals of Philosophy, Article XI: Proceedings of Philosophical Societies, 304 (1823).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 34
$authors    = array();
$address = "";
$title = "";
$key   = "fantz:04";
$year = 1;
$note = "U. Fantz and W&uuml;nderlich, IAEA report INDC(NDS)-457, 2004. Available online via http://www-amdis.iaea.org. The calculations are based on the same emphab initio data as the current work.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 35
$authors    = array();
$address = "";
$title = "";
$key   = "janssen_epaps:09";
$year = 1;
$note = "See EPAPS supplementary material at *** for the long-range and short-range fit coefficients of the quintet, triplet, and singlet potentials.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 36
$authors    = array();
$address = "";
$title = "EON: Long timescale dynamics";
$key   = "EONurl";
$year = 1;
$note = "(accessed August 19, 2013)";
$url  = "http://theory.cm.utexas.edu/EON";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 37
$authors    = array();
$address = "";
$title = "";
$key   = "electrong:02";
$year = 1;
$note = "The electron g factor g<sub>e</sub>=2.002 319 304 3718 is available from the website of the National Institute of Standards and Technology (NIST)";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 38
$authors    = array();
$address = "";
$title = "";
$key   = "einstein:25";
$year = 1;
$note = "A. Einstein, Sitzber. Kgl. Preuss. Akad. Wiss. 261 (1924); Sitzber. Kgl. Preuss. Akad. Wiss. 3 (1925).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 39
$authors    = array();
$address = "";
$title = "";
$key   = "dcs";
$year = 1;
$note = "S. Green and J. M. Hutson,  dcs computer code, version 2.0 (1996), distributed by Collaborative Computational Project No. 6 of the Engineering and Physical Sciences Research Council (UK)";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 40
$authors    = array();
$address = "";
$title = "";
$key   = "cybulski:94a";
$year = 1;
$note = "S. M. Cybulski, small  TRURL94, Rochester, MI";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 41
$authors    = array();
$address = "";
$title = "COLUMBUS";
$key   = "columbusurl:05";
$year = 1;
$note = "";
$url  = "http://www.univie.ac.at/columbus";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 42
$authors    = array();
$address = "";
$title = "";
$key   = "chemrev:94";
$year = 1994;
$note = "";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 43
$authors    = array();
$address = "";
$title = "";
$key   = "chemrev:00";
$year = 2000;
$note = "";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 44
$authors    = array();
$address = "";
$title = "";
$key   = "CGPM:54";
$year = 1;
$note = "Resolution 3, Comptes Rendus de la 10e Conference Generale des Poids et Mesures (1954).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 45
$authors    = array();
$address = "";
$title = "";
$key   = "ccpvtz";
$year = 1;
$note = "The aug-cc-pVXZ basis sets were obtained from the Extensible Computational Chemistry Environment Basis Set Database, Version 1.0, as developed and distributed by the Molecular Science Computing Facility, Environmental and Molecular Sciences Laboratory which is part of the Pacific Northwest Laboratory, P.O. Box 999, Richland, Washington 99352, USA, and funded by the U.S. Department of Energy. The Pacific Northwest Laboratory is a multi-program laboratory operated by Battelle Memorial Institute for the U.S. Department of Energy under contract DE-AC06-76RLO 1830.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 46
$authors    = array();
$address = "";
$title = "";
$key   = "basis:99";
$year = 1;
$note = "Basis sets were obtained from the Extensible Computational Chemistry Environment Basis Set Database, Version 1.0, as developed and distributed by the Molecular Science Computing Facility, Environmental and Molecular Sciences Laboratory which is part of the Pacific Northwest Laboratory, P.O. Box 999, Richland, Washington 99352, USA, and funded by the U.S. Department of Energy. The Pacific Northwest Laboratory is a multi-program laboratory operated by Battelle Memorial Institute for the U.S. Department of Energy under contract DE-AC06-76RLO 1830.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 47
$authors    = array();
$address = "";
$title = "";
$key   = "amontons:03";
$year = 1;
$note = "G. Amontons, Histoire de l'Academie Royale des Sciences avec les Memoires de Mathematique et de Physique, 50 (1703).";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 48
$authors    = array();
$address = "";
$title = "";
$key   = "hibridon";
$year = 1;
$note = "Hibridon is a package of programs for the time-independent quantum treatment of inelastic collisions and photodissociation written by M. H. Alexander, D. Manolopoulos, H.-J. Werner, and B. Follmeg, with contributions by P. Vohralik, G. Corey, B. Johnson, T. Orlikowski, and P. Valiron.";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Misc 49
$authors    = array();
$address = "";
$title = "";
$key   = "EPAPS:14";
$year = 1;
$note = "See EPAPS document No ???";
$url  = "";
$project = "";
Add_misc( $authors, $address, $title,$key, $note,$year,
                       $url, $project);
unset   ( $authors, $address, $title,$key, $note,$year,
                       $url, $project);

// Phdthesis 1
$authors    = array(
array("Dennis L. A. G.", "Grimminck"));
$title = "Heuristic and deterministic computational solutions for solid-state NMR and molecular spectroscopy";
$year = 2013;
$school  = "Radboud University Nijmegen";
$project = "pr:tc-imm pr:lineshape";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 2
$authors    = array(
array("Liesbeth M. C.", "Janssen"));
$title = "Cold collision dynamics of NH radicals";
$year = 2012;
$school  = "Radboud University Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 3
$authors    = array(
array("Karin I.", "Oberg"));
$title = "Complex processes in simple ices - laboratory and observational studies of gas-grain interactions during star formation";
$year = 2009;
$school  = "Leiden University";
$project = "pr:astro-ewine";
$url  = "https://openaccess.leidenuniv.nl/handle/1887/13995";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 4
$authors    = array(
array("Mark P. J.", "van der Loo"));
$title = "Photoinduced Dynamics in OH, H<sub>2</sub>, and N<sub>2</sub>O";
$year = 2008;
$school  = "Radboud University Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 5
$authors    = array(
array("Anna V.", "Fishchuk"));
$title = "Theoretical study of open-shell van der Waals complexes";
$year = 2008;
$school  = "Radboud University Nijmegen";
$project = "pr:tc-imm pr:open-shell";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 6
$authors    = array(
array("U.", "Erlekam"));
$title = "";
$year = 2008;
$school  = "Humboldt Universit&auml;t, Berlin";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 7
$authors    = array(
array("S. E.", "Bisschop"));
$title = "Complex Molecules in the Laboratory and Star Forming Regions";
$year = 2007;
$school  = "Leiden Observatory, Leiden University";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 8
$authors    = array(
array("G. W. M.", "Vissers"));
$title = "Nuclear motion of Van der Waals and hydrogen bonded systems";
$year = 2005;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 9
$authors    = array(
array("Frank", "Beierlein"));
$title = "QM/MM docking and simulations of FRET";
$year = 2005;
$school  = "";
$project = "pr:pv";
$url  = "http://www.chemie.uni-erlangen.de/beierl/publ.html";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 10
$authors    = array(
array("W. B.", "Zeimen"));
$title = "Dynamics of open-shell van der Waals complexes";
$year = 2004;
$school  = "University of Nijmegen";
$project = "pr:open-shell pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 11
$authors    = array(
array("J. M.", "Bakker"));
$title = "Structural identification of gas-phase biomolecules using infrared spectroscopy";
$year = 2004;
$school  = "Radboud University Nijmegen";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 12
$authors    = array(
array("M. C. G. N.", "van Vroonhoven"));
$title = "Theory and calculations on the Herzberg states of the oxygen molecule";
$year = 2003;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 13
$authors    = array(
array("James Patrick", "Burke"));
$title = "Theoretical investigation of cold alkali atom collisions";
$year = 1999;
$school  = "University of Colorado";
$project = "pr:cold pr:ultracold pr:atom-atom";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 14
$authors    = array(
array("L. B.", "Braly"));
$title = "The intermolecular vibrations of the water dimer";
$year = 1999;
$school  = "University of California at Berkeley";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 15
$authors    = array(
array("T. G. A.", "Heijmen"));
$title = "Quantum mechanical calculations on weakly interacting complexes";
$year = 1998;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 16
$authors    = array(
array("J. D.", "Cruzan"));
$title = "";
$year = 1997;
$school  = "University of California at Berkeley";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 17
$authors    = array(
array("Eloy R.", "Wouters"));
$title = "Photodissociation dynamics of triplet hydrogen";
$year = 1996;
$school  = "Radboud University Nijmegen";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 18
$authors    = array(
array("G. C. M.", "van der Sanden"));
$title = "Computational studies of dynamical processes in weakly interacting atom-molecule complexes";
$year = 1996;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 19
$authors    = array(
array("E. H. T.", "Olthof"));
$title = "The vibrational-rotational-tunneling dynamics of Van der Waals and hydrogen bonded complexes";
$year = 1996;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 20
$authors    = array(
array("A. J. H. M.", "Meijer"));
$title = "Quasiclassical and semiclassical calculations on reactions with oriented molecules";
$year = 1996;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 21
$authors    = array(
array("R.", "Dopheide"));
$title = "";
$year = 1994;
$school  = "Universit&auml;t-Gesamthochschule Essen";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 22
$authors    = array(
array("Stefan", "Becker"));
$title = "Vollst&auml;ndig zustandsselektive Untersuchung der elektronischen Pr&auml;disoziation eines dreiatomigen Moleku&uuml;ls: SO<sub>2</sub> &rarr; SO + SO";
$year = 1994;
$school  = "Universit&auml;t Hannover";
$project = "pr:SO2 pr:cold";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 23
$authors    = array(
array("H.", "Hettema"));
$title = "The calculation of correlated frequency dependent polarizabilities and Van der Waals coefficients";
$year = 1993;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 24
$authors    = array(
array("J. W. I.", "van Bladel"));
$title = "Quantum mechanical treatment of nonrigid molecules and Van der Waals complexes";
$year = 1992;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 25
$authors    = array(
array("S.", "Schlemmer"));
$title = "";
$year = 1992;
$school  = "MPI f&uuml;r Str&ouml;mungsforschung";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 26
$authors    = array(
array("W. B. J. M.", "Janssen"));
$title = "Dynamics of (ionic) molecular crystals and adsorbed layers";
$year = 1992;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 27
$authors    = array(
array("T. H. M.", "van den Berg"));
$title = "Dynamics of molecular crystals and adsorbed molecular layers";
$year = 1991;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 28
$authors    = array(
array("G. C.", "Groenenboom"));
$title = "Novel approaches to the calculation of the electronic strcuture and dynamics of excited states; application to Trans-di-imide and ethylene";
$year = 1991;
$school  = "Technical University of Eindhoven";
$project = "";
$url  = "http://library.tue.nl/catalog/LinkToVubis.csp?DataBib=6:348362";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 29
$authors    = array(
array("W.", "Rijks"));
$title = "A study of the effects of intramolecular correlation on intermolecular interactions";
$year = 1989;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 30
$authors    = array(
array("A. P. J.", "Jansen"));
$title = "Theoretical approach to the optical, thermodynamic and magnetic properties of solid nitrogen and solid oxygen";
$year = 1987;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 31
$authors    = array(
array("G.", "Brocks"));
$title = "Rotation-Vibration States and Spectra of Molecular Dimers with Large Internal Motions";
$year = 1987;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 32
$authors    = array(
array("F.", "Visser"));
$title = "Electron correlation and long range dispersion interactions in Van der Waals dimers";
$year = 1985;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 33
$authors    = array(
array("W.", "Ravenek"));
$title = "Cluster embedding and pseudopotentials in the Hartree-Fock-Slater-LCAO method";
$year = 1984;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 34
$authors    = array(
array("J.", "Mettes"));
$title = "Magnetic spectra of the dimer O<sub>2</sub> Ar";
$year = 1984;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 35
$authors    = array(
array("R. M.", "Berns"));
$title = "Ab initio calculations of intermolecular forces and related properties";
$year = 1981;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 36
$authors    = array(
array("P. J. M.", "Geurts"));
$title = "Hartree-Fock-Slater studies of bonding to transition metals: surfaces and complexes, chemisorption of acetylene";
$year = 1980;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 37
$authors    = array(
array("F.", "Mulder"));
$title = "Ab initio calculations of molecular multipoles, polarizabilities and Van der Waals interactions";
$year = 1978;
$school  = "KU Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 38
$authors    = array(
array("Ton", "Ellenbroek"));
$title = "Zeeman effect in simple molecules by beam maser spectroscopy";
$year = 1977;
$school  = "Katholieke Universiteit Nijmegen";
$project = "pr:zeeman";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 39
$authors    = array(
array("D. J. M.", "Fassaert"));
$title = "Molecular orbital studies of chemisorption. Hydrogen on nickel surfaces";
$year = 1976;
$school  = "KU Nijmegen, Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 40
$authors    = array(
array("P. E. S.", "Wormer"));
$title = "Intermolecular forces and the group theory of many-body systems";
$year = 1975;
$school  = "University of Nijmegen";
$project = "pr:tc-imm";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 41
$authors    = array(
array("B.", "Jeziorski"));
$title = "";
$year = 1974;
$school  = "University of Warsaw";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 42
$authors    = array(
array("J. E. M.", "Heuvel"));
$title = "Hyperfine structure in internal rotor molecules";
$year = 1972;
$school  = "Katholieke Universiteit Nijmegen";
$project = "pr:zeeman pr:methanol";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 43
$authors    = array(
array("Robert W.", "Field"));
$title = "Spectroscopy and perturbation analysis in excited states of CO and CS";
$year = 1971;
$school  = "Harvard University";
$project = "pr:CO";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 44
$authors    = array(
array("A.", "van der Avoird"));
$title = "Perturbation theory for intermolecular forces; Application to some adsorption models";
$year = 1968;
$school  = "Technical University Eindhoven";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Phdthesis 45
$authors    = array(
array("L. S.", "Ornstein"));
$title = "Toepassing der statistische mechanica van Gibbs op molekulair-theoretische vraagstukken";
$year = 1908;
$school  = "University Leiden";
$project = "";
$url  = "";
Add_phdthesis( $authors, $school, $title, $year,
                       $url, $project);
unset   (   $authors,  $school, $title, $year,
                       $url, $project);

// Unpublished: 1
$authors    = array(
array("W. C.", "Troy"));
$title = "Specific heat of an Einstein solid";
$year = 2011;
$note  = "unpublished results";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 2
$authors    = array(
array("T. P. M.", "Goumans"),
array("Stefan", "Andersson"));
$title = "Tunneling in the O + CO reaction";
$year = 2010;
$note  = "astro";
$project = "pr:astro";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 3
$authors    = array(
array("U.", "Erlekam"),
array("P. R.", "Bunker"),
array("M.", "Schnell"),
array("J.-U.", "Grabow"),
array("G.", "von Helden"),
array("G.", "Meijer"));
$title = "";
$year = 2010;
$note  = "in preparation";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 4
$authors    = array(
array("S.", "Andersson"),
array("T. P. M.", "Goumans"),
array("A.", "Arnaldsson"));
$title = "";
$year = 2010;
$note  = "in preparation";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 5
$authors    = array(
array("Marc C.", "van Hemert"));
$title = "";
$year = 2009;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 6
$authors    = array(
array("M. I.", "Lester"));
$title = "";
$year = 2009;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 7
$authors    = array(
array("K.", "Kuyanov-Prozument"),
array("A. F.", "Vilesov"));
$title = "";
$year = 2009;
$note  = "to be published";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 8
$authors    = array(
array("P. R.", "Bunker"),
array("U.", "Erlekam"),
array("M.", "Schnell"),
array("G.", "von Helden"),
array("G.", "Meijer"));
$title = "";
$year = 2008;
$note  = "unpublished work";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 9
$authors    = array(
array("J. M.", "Merritt"));
$title = "";
$year = 2006;
$note  = "Private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 10
$authors    = array(
array("R. E.", "Miller"));
$title = "";
$year = 2005;
$note  = "Private communication. In Ref. citenmerritt:05 the A' or A'' symmetry was not specified.";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 11
$authors    = array(
array("G.", "Meijer"));
$title = "";
$year = 2001;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 12
$authors    = array(
array("F. B.", "van Duijneveldt"));
$title = "";
$year = 2000;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 13
$authors    = array(
array("R. J.", "Saykally"));
$title = "";
$year = 2000;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 14
$authors    = array(
array("I.", "Pak"));
$title = "";
$year = 2000;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 15
$authors    = array(
array("C. J.", "Keoshian"),
array("R. J.", "Saykally"));
$title = "";
$year = 2000;
$note  = "private communication";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 16
$authors    = array(
array("R. J.", "Bemish"),
array("R. E.", "Miller"));
$title = "";
$year = 1995;
$note  = "unpublished results";
$project = "";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 17
$authors    = array(
array("S.", "Jung"),
array("G.", "Meijer"),
array("E.", "Tiemann"),
array("Ch.", "Lisdat"));
$title = "First deceleration of SO<sub>2</sub> molecules";
$year = 2005;
$note  = "Workshop on cold polar molecules, Ringberg castle, lake Tegernsee, Germany";
$project = "pr:cold pr:SO2";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);

// Unpublished: 18
$authors    = array(
array("W.", "Campbell"));
$title = "Loading a magnetic trap from a molecular beam";
$year = 2005;
$note  = "Workshop on cold polar molecules, Ringberg castle, lake Tegernsee, Germany";
$project = "pr:cold";
Add_unpublished( $authors, $title, $year, $note, $project);
unset ( $authors, $title, $year, $note, $project);


    function Add_book( $authors, $editors, $title, $publisher, $year, $isbn,
                       $url, $project, $note) {

        global $filenames;
        //require_once $filenames['Book_class2'];


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;


        $type = 'book';
        $_SESSION['authors']   = $authors;
        $_SESSION['editors']   = $editors;
        $_SESSION['title']     = $title;
        $_SESSION['publisher'] = $publisher;
        $_SESSION['year']      = $year;
        $_SESSION['isbn']      = $isbn;
        $_SESSION['url']       = $url;
        $_SESSION['project']   = $project;
        $_SESSION['book_note'] = $note;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_booklet($authors, $address, $title, $year, $url, $project) {

        global $filenames;
        //require_once $filenames['Book_class2'];

        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'booklet';

        $_SESSION['authors'     ] = $authors;
        $_SESSION['organization'] = $address;
        $_SESSION['title'       ] = $title;
        $_SESSION['year'        ] = $year;
        $_SESSION['url'         ] = $url;
        $_SESSION['project'     ] = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_inbook( $authors, $editors, $booktitle, $title, $publisher, $year, $project) {

        global $filenames;
        //require_once $filenames['Book_class2'];

        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'inbook';

        $_SESSION['authors']        = $authors;
        $_SESSION['editors']        = $editors;
        $_SESSION['title']          = $booktitle;
        $_SESSION['second_title']   = $title;
        $_SESSION['publisher']      = $publisher;
        $_SESSION['year']           = $year;
        $_SESSION['project']        = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_incollection( $authors, $editors, $booktitle, $title, $page, $publisher, $year, $isbn,
                       $url, $project, $note) {


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'incollection';

        $_SESSION['authors']        = $authors;
        $_SESSION['editors']        = $editors;
        $_SESSION['title']          = $title;
        $_SESSION['second_title']   = $booktitle;
        $_SESSION['page']           = $page;
        $_SESSION['publisher']      = $publisher;
        $_SESSION['year']           = $year;
        $_SESSION['isbn']           = $isbn;
        $_SESSION['url']            = $url;
        $_SESSION['project']        = $project;
        $_SESSION['book_note']      = $note;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_inproceedings( $authors, $booktitle, $title, $publisher, $year, $url, $project, $note) {


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'inproceedings';

        $_SESSION['authors']      = $authors;
        $_SESSION['title']        = $title;
        $_SESSION['second_title'] = $booktitle;
        $_SESSION['publisher']    = $publisher;
        $_SESSION['year']         = $year;
        $_SESSION['url']          = $url;
        $_SESSION['project']      = $project;
        $_SESSION['book_note']    = $note;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_manual( $authors,  $organization, $year, $key, $note, $url) {

        global $filenames;
        //require_once $filenames['Book_class2'];


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;


        $type = 'manual';
        $_SESSION['authors']      = $authors;
        $_SESSION['organization'] = $organization;
        $_SESSION['year']         = $year;
        $_SESSION['book_key']     = $key;
        $_SESSION['book_note']    = $note;
        $_SESSION['url']          = $url;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_mastersthesis( $authors, $school, $title, $year, $url, $project) {

        global $filenames;
        //require_once $filenames['Book_class2'];


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;


        $type = 'mastersthesis';
        $_SESSION['authors']      = $authors;
        $_SESSION['organization'] = $school;
        $_SESSION['title']        = $title;
        $_SESSION['year']         = $year;
        $_SESSION['url']          = $url;
        $_SESSION['project']      = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_misc($authors, $address, $title, $key, $note, $year, $url, $project) {

        global $filenames;
        //require_once $filenames['Book_class2'];

        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'misc';
        $_SESSION['authors'      ] = $authors;
        $_SESSION['organization' ] = $address;
        $_SESSION['title'        ] = $title;
        $_SESSION['book_key'     ] = $key;
        $_SESSION['book_note'    ] = $note;
        $_SESSION['year'         ] = $year;
        $_SESSION['url'          ] = $url;
        $_SESSION['project'      ] = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_phdthesis($authors, $school, $title,  $year, $url, $project) {

        global $filenames;
        //require_once $filenames['Book_class2'];


        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'phdthesis';
        $_SESSION['authors'      ] = $authors;
        $_SESSION['organization' ] = $school;
        $_SESSION['title'        ] = $title;
        $_SESSION['year'         ] = $year;
        $_SESSION['url'          ] = $url;
        $_SESSION['project'      ] = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }
    function Add_unpublished( $authors,  $title, $year, $note, $project) {


        global $filenames;
        //require_once $filenames['Book_class2'];

        $save = $_SESSION['credentials'];
        foreach ($_SESSION as $k => $val) {
            unset($_SESSION[$k]);
        }
        $_SESSION['credentials'] = $save;

        $type = 'unpublished';

        $_SESSION['authors']        = $authors;
        $_SESSION['title']          = $title;
        $_SESSION['year']           = $year;
        $_SESSION['book_note']      = $note;
        $_SESSION['project']        = $project;

        $publication  = new Book();
        $publication -> type = $type;

        //  Copy $_SESSION to object $publication (instance of class Book) ...
        $keys  = array_keys($_SESSION);
        foreach ($keys as $k => $val) {
            $publication -> $keys[$k] = $_SESSION[$keys[$k]];
        }
        //  ... while discarding the following entries:
        unset($publication -> credentials);
        unset($publication -> count);

        //  Actual storing:
        $publication -> Store();
    }


?>
</body>
</html>



