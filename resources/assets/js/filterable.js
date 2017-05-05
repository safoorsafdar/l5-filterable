"use strict";
var filterable_filter = {
    removeFilterRow: function (row) {
        var $this = $(row);
        $this.parents('tr')
            .not(':first-child')
            .css("background-color", "#f2dede")
            .remove();
        return false;
    }, addFilterRow: function () {
        var first_row = $("#filter_table tbody > tr:first");
        var counter = $("#filter_table tbody > tr").length || 0;
        counter = counter + 1;
        var clone_row = first_row.clone();
        clone_row.find("select, input").each(function () {
            var $this = $(this);
            //$this.val('');
            $this.attr('name', function (_, name) {
                return name.replace(/\[\d\]/, '[' + counter + ']')
            });
            $this.attr('id', function (_, id) {
                var n = id.lastIndexOf('_');
                id = id.substring(0, n != -1 ? n : id.length);

                return id + "_" + counter
            });
        });
        clone_row.find("tr").end().attr('data-filter-id', counter);
        clone_row.appendTo('#filter_table tbody');
    }
}