/*
 *  Updates
 *  =======
 *  1.  July 22, 2014:  Adapted code so that opening of all DOI's is in new browser tab.
 *  2.  July 22, 2014:  Disarmed enter key on all <input>.
 *  3.  July 22, 2014:  Check on validity of DOI.
 *  4.  July 30, 2014:  Check on validity of year.
 */

String.prototype.splitName = function() {
/*
 *  Split author name in first name (plus initials) and last name.
 *  Because there is a great variety in the form of names, the algorithm is
 *  not foolproof. Inspection of the results by a human remains necessary.
 *  Unicode (UTF-8) characters added ad hoc.
 */
    var name   = {first: "", last: ""},
        that   = this.replace(/^\s*/, ""),
        rgxp   = /([A-Z\xC0-\xDD\u010C\u017D][\.a-z\xDF-\xFF\u0159\u0161]*(\-))*([A-Z\xC0-\xDD\u010C\u017D][a-z\xDF-\xFF\u0159\u0161]*(\x20))*([A-Z\xC0-\xDD\u010C\u017D][\.](\-)?(\x20)*)*/,
        result = that.match(rgxp);
    name.first = result[0].trim();
    name.last  = that.substr(name.first.length).trim();
    return name;
};

$(function() {
/*  PWRef input.
 *
 *      Function contains internal functions: "getTextArea" and "redoAuthors",
 *
 *      Function sets event handlers on several HTML elements.
 *      Event handler on "journalField" invokes the external script "suggest_journals.php".
 */

    // HTML fields converted to jQuery objects. All static HTML fields are here.
    var textAreaInp     = $("#input_getTextArea #input_textAreaInp");
    var textAreaHint    = $("#input_getTextArea #input_textAreaHint");
    var textAreaBtn     = $("#input_getTextArea #textAreaBtn");
    var authorsRedo     = $("#input_editDiv     #authorsRedo");
    var authorsRedoBtn  = $("#input_editDiv     #authorsRedoBtn");
    var authorsHolder   = $("#input_inputAll    #authorsHolder");
    var authorsEditDiv  = $("#input_inputAll    #input_editDiv");
    var authorsHelp1    = $("#input_inputAll    #input_subhelp1");
    var formAllInput    = $("#input_inputAll    input");
    var formAll         = $("#input_inputAll");
    var hiddenInpField  = $("#input_inputAll    #PWRef_input");
    var titleField      = $("#input_getArticle  #Title");
    var journalField    = $("#input_getArticle  #Journal");
    var suggestionDiv   = $("#input_getArticle  #input_suggestions");
    var issnField       = $("#input_getArticle  #issn");
    var volumeField     = $("#input_getArticle  #Volume");
    var page0Field      = $("#input_getArticle  #begin_page");
    var page1Field      = $("#input_getArticle  #end_page");
    var yearField       = $("#input_getArticle  #Year");
    var eprintField     = $("#input_getArticle  #arXiv");
    var doiField        = $("#input_getArticle  #DOI");
    var projectField    = $("#input_getArticle  #Project");
    var urlField        = $("#input_getArticle  #url");
    var artInpField     = $("#input_getArticle  input");
    var openDoiBtn      = $("#input_getArticle  #openDOIBtn");
    var clearBtn        = $("#input_clearAllBtn");

    var nrOfAuthorsShown = 0;  // Number of authors in edited author list
    var closeDOI;

    var suggest_script  = "input/suggest_journals.php";

    // A few preliminary tasks:
    textAreaInp.focus();
    authorsEditDiv.hide();
    textAreaBtn.click(getTextArea);
    authorsRedoBtn.click(redoAuthors).hide();
    authorsRedo.hide();

    //  Restore saved input fields:
    var savedTxtArea    = sessionStorage.getItem("savedTxtArea");
    if (savedTxtArea)   textAreaInp.val(savedTxtArea);

    var savedTitle      = sessionStorage.getItem("savedTitle");
    if (savedTitle)     titleField.val(savedTitle);

    var savedJournal    = sessionStorage.getItem("savedJournal");
    if (savedJournal)   journalField.val(savedJournal);

    var savedIssn       = sessionStorage.getItem("savedIssn");
    if (savedIssn)      issnField.val(savedIssn);

    var savedVolume     = sessionStorage.getItem("savedVolume");
    if (savedVolume)    volumeField.val(savedVolume);

    var savedBeginPage  = sessionStorage.getItem("savedBeginPage");
    if (savedBeginPage) page0Field.val(savedBeginPage);

    var savedEndPage    = sessionStorage.getItem("savedEndPage");
    if (savedEndPage)   page1Field.val(savedEndPage);

    var savedYear       = sessionStorage.getItem("savedYear");
    if (savedYear)      yearField.val(savedYear);

    var savedProject    = sessionStorage.getItem("savedProject");
    if (savedProject)   projectField.val(savedProject);

    var savedUrl        = sessionStorage.getItem("savedUrl");
    if (savedUrl)       urlField.val(savedUrl);

    var savedarXiv      = sessionStorage.getItem("savedarXiv");
    if (savedarXiv)     eprintField.val(savedarXiv);

    var savedDOI        = sessionStorage.getItem("savedDOI");
    if (savedDOI)       doiField.val(savedDOI);

    function getTextArea(event) {
    /*
     *  Function is activated by hitting button "textAreaBtn" or optionally
     *  when the form is submitted. The present function reads and edits
     *  a textarea containing names of authors. It generates and fills a list of
     *  author input fields.
     */
        if (!textAreaInp.val().trim()) return;      // Empty input, nothing to do.

        /* Replace special characters in input by blanks and commas */
        var author = textAreaInp.val().                      // From textarea
                        replace(/\s+/g," ").                 // white space
                        replace(/\x20+and\x20+/g,", ").      // and
                        replace(/\x20+\x26\x20+/g,", ").     // x26 = &
                        replace(/Ph\.D\.,/g," ").            // Remove
                        replace(/M\.D\.,/g," ").             //
                        replace(/M\.S\.,/g," ").             //
                        replace(/M\.Sc\.,/g," ").            //      academic
                        replace(/M\.A\.,/g," ").             //
                        replace(/M\.Phil\.,/g," ").          //
                        replace(/B\.S\.,/g," ").             //
                        replace(/B\.Sc\.,/g," ").            //
                        replace(/D\.Phil\.,/g," ").          //            degrees
                        replace(/,[a-zA-Z]\)/g,",").       //  rm a) etc.
                        split(",");                          //  Into array of length: author.length

        // Maxima to defeat spammmers/hackers: (See ../shared/maxlength.php for more.)
        var $max_authors  = 250;
        var maxName     = 150; // Maximum length of author first+last name

        // Separate authors into array editedAuth
        var j           = 0;    // counts edited Authors
        var editedAuth  = [];
        for (var i = 0; i < author.length; i++) {
            if (author[i].length > maxName) {
                alert("Warning: Name of author " + (i+1) +  " is of length " + author[i].length +
                        "\n Author name will be truncated at " + maxName  + " characters");
            }
            var auth = author[i].substring(0, maxName);
            if (auth) {
                auth = auth.replace(/[0-9]+[a-z]*\s*$/,"").                  // Footnote
                            replace(/[\xA7\*\†\u2020\u2021]+/,"").        //     markers
                            replace(/\s+$/,"").
                            replace(/^\s+/,"");
                if (auth) editedAuth[j++] = auth.splitName();  // first and last name
                if (j > $max_authors-1) {
                    alert("Warning: Number of authors is " + author.length +
                          "\n Author list will be truncated at " + $max_authors + " names");
                    break;
                }
            }
        };

        // Add output fields with edited authors to HTML
        var authorlist = $("<p><i>Author list:</i></p>");
        authorsHolder.append(authorlist);

        for (var j=0; j < editedAuth.length; j++) {
            var div        = $("<div style = 'margin-bottom: 30px;'>");
            var labelFirst = $("<label>Author " + (j+1) + ":&nbsp; First name:&nbsp;</label>");
            var labelLast  = $("<label>&nbsp; Last:&nbsp;</label>");
            var inputFirst = $("<input>");
            var inputLast  = $("<input>");

            $(div).append(labelFirst);
            $(div).append(inputFirst);
            $(div).append(labelLast);
            $(div).append(inputLast);
            authorsHolder.append(div);

            $(inputFirst).attr( {id: "firstName_" + j, name: "firstName_" + j,
                                 size: 20, maxlength: 50});
            $(inputFirst).val(editedAuth[j].first);

            $(inputLast).attr( {id: "lastName_" + j, name: "lastName_" + j,
                                size: 40,  maxlength: 100});
            $(inputLast).val(editedAuth[j].last);
        }

        nrOfAuthorsShown = editedAuth.length;

        textAreaHint.hide(); textAreaBtn.hide();
        authorsRedo.show();  authorsRedoBtn.show();

        authorsEditDiv.show();
        var pos = authorsEditDiv.position().top - 30;  // In case of a long
        authorsHelp1.css("top", pos+"px");             //      author list, help is moved down

    };  // End of getTextArea().

    function redoAuthors(event) {
    /*
     *  Function removes author input fields, shows edit button: "textAreaBtn".
     */
        authorsHolder.children().remove();
        nrOfAuthorsShown = authorsHolder.children().length;

        authorsEditDiv.hide();

        authorsRedo.hide();  authorsRedoBtn.hide();
        textAreaHint.show(); textAreaBtn.show();
        textAreaInp.focus();
    };


    /***********************************************************
     *  ASSIGNMENTS OF 6 EVENT HANDLERS:
     */

    journalField.keyup(function(event) {
    //  Event keyup invokes php script "suggest_journals.php",
    //  which inspects database on server.
            var str = encodeURIComponent($(this).val());
            if (str.length === 0) {
                suggestionDiv.text("");
                return;
            };

            //  Replace by Ajax load <div id="Suggestions"> with suggestions
            //  (output of "suggest_journals.php"):
            suggestionDiv.load(suggest_script + "?q="+str, "", function() {
                $("#input_getArticle  li").click(function() {  // click handler (li is not a static)
                        journalField.val($(this).html());
                        suggestionDiv.text("");
                        journalField.unbind("keyup");
                });
            });
    });

    formAllInput.keypress( function(event) {
    //  Disable enter key on all <input> elements
            if (event.keyCode === 13) {
                event.preventDefault();
            }
    });

    doiField.change(function(event) {
    //  Check if input in DOI field is valid.
            var doiF  = doiField.val();
            if ( doiF && !doiF.match(/^10\..*\/.*/) ) {
                alert("DOI must start with 10. and contain at least one forward slash.\n" +
                      "For example:   10.1103/PhysRevA.90.012508" );
            }
    });

//  Note:
//  =====
//  Discovered (on July 21, 2014)  that Physical Review (like Science Magazine) does
//  not allow opening its DOI's in an <iframe>.
//  Hence no <iframe> in openDoiBtn handler any longer.
//

    openDoiBtn.click( function() {
    //  Load DOI in new tab:
            var doiOrg  = "http://dx.doi.org/";
            var doi     = doiField.val();
            window.open().location = doiOrg + doi;
    });

    issnField.change( function() {
    //  Check validity ISSN:
            if ( issnField.val() && !issnField.val().match(/\d{4}\-(\d{4}|\d{3}X)/) ) {
                alert("ISSN must be of the form: dddd-dddd or dddd-dddX, where \n" +
                      "d is a digit between 0 and 9, - is the minus sign, and X is the capital letter X.");
            }
    });

    yearField.change( function() {
    //  Check validity year:
            var yF = yearField.val();
            if (yF && !yF.match(/^\d+$/) || yF.length > 4) {
                alert("Year must consist of up to 4 digits");
            }
    });

    formAll.submit(function() {
    //  Check validity ISSN:
            if ( issnField.val() && !issnField.val().match(/\d{4}\-(\d{4}|\d{3}X)/) ) {
                alert("ISSN must be of the form: dddd-dddd or dddd-dddX, where \n" +
                      "d is a digit between 0 and 9, - is the minus sign, and X is the capital letter X.");
                return false;
            }

    //  Check validity of DOI:
            if ( doiField.val() && !doiField.val().match(/^10\..*\/.*/) ) {
                alert("DOI must start with 10. and contain at least one forward slash.\n" +
                      "For example:   10.1103/PhysRevA.90.012508" );
                return false;
            }

    //  Check validity year:
            var yF = yearField.val();
            if (yF && !yF.match(/^\d+$/) || yF.length > 4) {
                alert("Year must consist of up to 4 digits");
                return false;
            }

    //  Optionally generate an author list:
            if (nrOfAuthorsShown === 0) getTextArea(); // No author list, generate it

    //  Save input fields:
            savedTxtArea    = textAreaInp.val();
            sessionStorage.setItem("savedTxtArea", savedTxtArea);

            savedTitle      = titleField.val();
            sessionStorage.setItem("savedTitle", savedTitle);

            savedJournal    = journalField.val();
            sessionStorage.setItem("savedJournal", savedJournal);

            savedIssn       = issnField.val();
            sessionStorage.setItem("savedIssn", savedIssn);

            savedVolume     = volumeField.val();
            sessionStorage.setItem("savedVolume", savedVolume);

            savedBeginPage  = page0Field.val();
            sessionStorage.setItem("savedBeginPage", savedBeginPage);

            savedEndPage    = page1Field.val();
            sessionStorage.setItem("savedEndPage", savedEndPage);

            savedYear       = yearField.val();
            sessionStorage.setItem("savedYear", savedYear);

            savedProject    = projectField.val();
            sessionStorage.setItem("savedProject", savedProject);

            savedUrl       = urlField.val();
            sessionStorage.setItem("savedUrl", savedUrl);

            savedarXiv      = eprintField.val();
            sessionStorage.setItem("savedarXiv", savedarXiv);

            savedDOI        = doiField.val();
            sessionStorage.setItem("savedDOI", savedDOI);

    });

    clearBtn.click(function() {
    //  FireFox does not clear input fields upon location.reload,
    //  so we do it ourselves:
            textAreaInp.val("")

            // Clear all inputs except hidden input:
            $("input").not(hiddenInpField).val("");
            sessionStorage.clear();

            authorsRedo.hide();     authorsRedoBtn.hide();
            textAreaHint.show();    textAreaBtn.show();
            textAreaInp.focus();

            location.reload();
    });

    /*
     *  END OF EVENT HANDLER ASSIGNMENTS.
     ***********************************************************/
});
