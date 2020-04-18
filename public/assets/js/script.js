$(document).ready(function(){
    $('#search_data').autocomplete({
        source : "search",
        minLength : 1,
        select : function(e , ui){
            $('#search_data').val(ui.item.value);
        }
    }).data('ui-autocomplete')._renderItem = function(ul , item){
        return $('<li class="ui-autocomplete-row"></li>')
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
});