function autocomplete(id){
    var ajax_request = false, json_game='/search/game/?game='+$("#"+id).val()
    $('#'+id).textntags({
        onDataRequest:function (mode, query, triggerChar, callback) {
            // fix for overlapping requests
            if(ajax_request) ajax_request.abort();
            ajax_request = $.getJSON(json_game, function(responseData) {
                query = query.toLowerCase();
                responseData = _.filter(responseData, function(item) { return item.name.toLowerCase().indexOf(query) > -1; });
                callback.call(this, responseData);
                ajax_request = false;
            });
        }
    });
}
