    $(function() {
        //var base = "http://localhost/PWRef/articles/shared/";
        var base = "http://www.theochem.ru.nl/~pwormer/PWRef/articles/shared/";

        $("#form1 table tr td input[name = last_name]").keyup(suggest);
        $("#form1 table tr td input[name = last_name]").keydown(enter);
        function enter(event) {
        /*
         *  If entered clear suggestion box, do not submit.
         */
            if (event.keyCode !== 13) return;
            event.preventDefault();
            $("#suggestionBox").text("");   // Clear suggestionBox
            $("input[name = last_name]").unbind("keyup");
        }

        function suggest() {
        /*  Pickup string from <input name = "last_name"> and pass
         *  it on to "suggest_author.php". This script searches the
         *  database for "author_last_name" beginning with the string.
         *  Call "setClick" upon return.
         */
            var str = encodeURIComponent($(this).val());
            if (str.length <= 0)  return;       //>
            $("#suggestionBox").load(base+"suggest_author.php?q="+str, setClick);
        }
        function setClick() {
        /*
         *  Set function "setClick" as click-event handler on the output of
         *  script "suggest_author.php". Output is contained in the <div> "suggestionBox".
         *  Handler fills out first and last name of clicked author.
         */
            $("#suggestionBox ul li").click( function() {
                    var suggestedName = $(this).html().split(", ");
                    $("input[name = last_name]").val(  suggestedName[0] );
                    $("input[name = first_name]").val( suggestedName[1] );
                    $("#suggestionBox").text("");   // Clear suggestionBox
                    $("input[name = last_name]").unbind("keyup");
                });
        }

        // Set hovering on info img and hidden <div>
            $("#info").hover(
                function () {
                    $("#tooltip_prelim").show();
                },
                function () {
                    $("#tooltip_prelim").hide();
                })
            $("#tooltip_prelim").hover(
                function () {
                    $("#tooltip_prelim").show();
                },
                function () {
                    $("#tooltip_prelim").hide();
                })

    });
