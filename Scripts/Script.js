var main = function () {
    "use strict";

};

        function ShowAnswer(clicked_id) {
                var $tmp = clicked_id;
                var $ans = "ans";
                var $question_id = $tmp.slice(3);

                var $answer_id = $ans.concat($question_id);

                if (document.getElementById($answer_id).style.display == "block") {
                    document.getElementById($tmp).innerHTML = "+";
                    document.getElementById($answer_id).style.display = "none";
                }
                else {
                    document.getElementById($tmp).innerHTML = "-";
                    document.getElementById($answer_id).style.display = "block";
                }

            }
            
        

$(document).ready(main);


jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});