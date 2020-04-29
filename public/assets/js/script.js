// circular
jQuery(function($){
    var $userName = $('.user-name');
    if ($userName.length) {
      $userName.avatarMe({
        avatarClass: 'avatar-me',
        max: 2 // maximum letters displayed in the avartar
      });
    }
  });

// DropDown Search
	$(document).ready(function(){
		var dropdown = $(".navbar-right .dropdown");
		var toogleBtn = $(".navbar-right .dropdown-toggle");
		
		// Toggle search and close icon for search dropdown
		dropdown.on("show.bs.dropdown", function(e){
			toogleBtn.toggleClass("hide");
		});
		dropdown.on("hide.bs.dropdown", function(e){
			toogleBtn.addClass("hide");
			toogleBtn.first().removeClass("hide");
    });
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