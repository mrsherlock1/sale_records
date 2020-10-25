import $ from "jquery";
require("bootstrap");
import datepicker from "js-datepicker";

$(document).ready(function() {
    $(".delete").on("click", function() {
        if (confirm("Вы уверены?")) {
            return true;
        } else {
            return false;
        }
    });

    document.querySelectorAll(".datepicker").forEach(item => {
        datepicker(item, {});
    });
});
