/* User id: Dylan Moyer
   Assignment number: 06
   Date: 2/21/2019 */

"use strict";

$(document).ready(function () {
    $("#faq_rollovers h2").hover(
        // The first hander runs when the mouse pointer moves into the element
        function () {
            $(this).next().show("hidden");
        },
        // The Second hander runs when the mouse pointer moves out
        function () {
            $(this).next().hide("hidden");
        }
    )
}); // end ready
