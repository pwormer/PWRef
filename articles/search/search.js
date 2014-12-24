$(function() {
  /*
   *  This JS code is needed by PWRef_search.php.
   *
   *  It distinguishes three blocks of HTML code:
   *      methodA ("OR" search of authors and time intervals)
   *      methodB ("AND" search of authors, i.e., coauthors, and one time interval)
   *      methodC (Time interval)
   *
   */
    var action =  "search.php";

    var hideMethod = function() {
        $($(this).attr("href")).hide();
    };

    /*  Hide HTML blocks for all different methods */
    $("#search_menu a").each(hideMethod);

    /*  Show one HTML block of code selected by mouse click, hide the others */
    $("#search_menu a").click(function() {
            $("#search_menu a").each(hideMethod);
            $("#search_menu a").css({backgroundColor: "transparent"});
            $($(this).attr("href")).show();
            $(this).css({backgroundColor: "rgb(150, 150, 150)"});
    });

    /*  Submit handler for MethodA. Collect all input of MethodA in strA
     *  and pass it on to action = "search.php" through an Ajax load.
     */
    $("#MethodA #SubmitA").click( function() {
            $("#suggestionBoxA").text("");        // Clear suggestionBox
            var h    = $(window).height();   // To scroll down after Ajax load of references
            var strA = $("#MethodA input").serialize();
            $("#MethodA #SubmitA").html("Started search, please wait ...");
            $("#outDiv").load(action, strA, function() {
                                                $(window).scrollTop(h);
                                                $("#MethodA #SubmitA").html("Search");
                                            });
    });

    /* submit-event handler for methodB */
    $("#MethodB #SubmitB").click( function() {
            $("#suggestionBoxB").text("");        // Clear suggestionBox
            var h    = $(window).height();   // To scroll down after Ajax load of references
            var strB = $("#MethodB input").serialize();
            $("#MethodB #SubmitB").html("Started search, please wait ...");
            $("#outDiv").load(action, strB, function() {
                                                $(window).scrollTop(h);
                                                $("#MethodB #SubmitB").html("Search");
                                            });
    });

    /* submit-event handler for methodC */
    $("#MethodC #SubmitC").click( function() {
            var h    = $(window).height()-50;   // To scroll down after Ajax load of references
            var strC = $("#MethodC input").serialize();
           // alert("strC = " + strC);
            $("#MethodC #SubmitC").html("Started search, please wait ...");
            $("#outDiv").load(action, strC, function() {
                                                $(window).scrollTop(h);
                                                $("#MethodC #SubmitC").html("Search");
                                            });
    });


    /* Clear all input by clicking last entry in menu. */
    $("#search_menu a").last().click (function() {
                                          $("#formA input").val("");
                                          $("#formB input").val("");
                                          $("#formC input").val("");
                                          /* Remove  formA, formB and formC: */
                                          $("#formA").remove("#formA"); location.reload();
                                      });

    function activate(X) {
    /*
     *  Function activates enter-key in field  $("#search_content #templateX" + counter + "input").
     *  Enter-key invokes addDiv() that gives an additional author div (author input).
     *
     *  Function sets keyup-event handler on <input name = "LastX_n"> where X = A,B and n = 1,2,...
     *
     *  Function is invoked for methodA and methodB, not for methodC.
     */

        var counter    = 1;        // Counts author div's, first div is in HTML
        var latestAuth = $("#search_content #template" + X + counter);      // Template div
        var imax       = latestAuth.find("input").length;
        latestAuth.find("input").keydown(catchEnter);  // Catch enter key (13)
        latestAuth.find("input[name = Last" + X + "_" + counter + "]").keyup(suggest);

        function setClick() {
        /*
         *  Set function "setClick" as click-event handler on the output of
         *  script "suggest_author.php". Output is contained in the <div> "suggestionBox".
         *  Handler fills out first and last name of clicked author.
         */
            $("#suggestionBox" + X + " ul  li").click( function() {
                    var suggestedName = $(this).html().split(", ");
                    $("input[name = Last"  + X + "_" + counter + "]").val( suggestedName[0] );
                    $("input[name = First" + X + "_" + counter + "]").val( suggestedName[1] );
                    $("#suggestionBox" + X).text("");   // Clear suggestionBox
                    $("input[name = Last" + X + "_" + counter + "]").unbind("keyup");
                });
        }

        function suggest() {
        /*  Pickup string from <input name = "LastX_n"> and pass
         *  it on to "suggest_author.php". This script searches the
         *  database for "author_last_name" beginning with the string.
         *  Call "setClick" upon return.
         */
            var str = encodeURIComponent($(this).val());
            if (str.length <= 0)  return;
            $("#suggestionBox" + X).load("suggest_author.php?q="+str, setClick);
        }

        function catchEnter(event) {
        /*  Catch key 13 */
            if (event.keyCode === 13) {
                event.preventDefault();
                /* Check  if input fields are blank  */
                var setField = false;
                for (var i = 0; i < imax; i++) {
                    if (latestAuth.find("input").eq(i).val()) {
                        setField = true;
                        break;
                    }
                }
                if (setField) {
                    addDiv();
                }
                else  {
                    latestAuth.remove();
                }
            }
        }

        function addDiv() {
        /*  Add new author template to list of templates. New template is a copy of the latest one */

            var cloneAuth    = latestAuth.clone(true);    // Copies also event handlers
            latestAuth.find("input").unbind("keydown", catchEnter);

            counter++;

            /* Insert cloneAuth  to the end of author div's, update latestAuth */
            latestAuth = cloneAuth.insertAfter(latestAuth);


            /* Overwrite text */
            latestAuth.find("input").val("");
            latestAuth.attr("id", "template" + X + counter);
            if ( X === "A" ) {
                latestAuth.find("span").eq(0).html("<br><b>Author " + counter+ ":</b> &nbsp;");
            }
            if ( X === "B" ) {
                latestAuth.find("span").eq(0).html("<br><b>Coauthor " + counter+ ":</b> &nbsp;");
            }
            latestAuth.find("input").eq(0).attr({
                                          name:  "First" + X + "_" + counter,
                                          value: "" }).focus();

            latestAuth.find("input").eq(1). attr({
                                          name:  "Last"  + X + "_" + counter,
                                          value: "" });
            if ( X === "A" ) {
                latestAuth.find("input").eq(2). attr({
                                          name:  "Begin" + X + "_" + counter,
                                          value: "" });
                latestAuth.find("input").eq(3). attr({
                                          name:  "End"   + X + "_" + counter,
                                          value: "" });
            }
            latestAuth.find("input[name = Last" + X + "_" + counter + "]").keyup(suggest);
        }
    };

    activate("A");
    activate("B");
});
