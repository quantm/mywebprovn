$(document).ready(function () {
    $("#auto").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "http://api.stackoverflow.com/1.1/users",
                data: {
                    filter: request.term,
                    pagesize: 10
                },
                jsonp: "jsonp",
                dataType: "jsonp",
                success: function(data) {
                    response($.map(data.users, function(el, index) {
                        return {
                            value: el.display_name,
                            avatar: "http://www.gravatar.com/avatar/" +
                                el.email_hash
                        };
                    }));
                }
            });
        }
    }).data("uiAutocomplete")._renderItem = function (ul, item) {
        return $("<li />")
            .data("item.autocomplete", item)
            .append("<a><img src='" + item.avatar + "' />" + item.value + "</a>")
            .appendTo(ul);
    };    
});