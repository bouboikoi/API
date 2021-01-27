var _get = $("button[name=GET");
var _post = $("button[name=POST");
var _put = $("button[name=PUT");
var _delete = $("button[name=DELETE");

_get.click(function(){
    
    $.ajax({
        url: $('input[name=query]').val(),
        contentType: "application/json",
        dataType: 'json',
        type: 'GET',
        success: function(result){
            var str = JSON.stringify(result, undefined, 4);

            // display pretty printed object in text area:
            $('#result').val("");
            $('#result').val(str);
        }
    })
});

_post.click(function(){
    
    $.ajax({
        url: $('input[name=query]').val(),
        contentType : 'application/json',
        dataType: 'json',
        data: JSON.stringify(JSON.parse($("#data").val())),
        type: 'POST',
        success: function(result){
            var str = JSON.stringify(result, undefined, 4);
            $('#result').val("");
            $('#result').val(str);
        },
        error: function(e){
            console.log(e);
            var str = JSON.stringify(e, undefined, 4);
            $('#result').val("");
            $('#result').val(str);
        }
    })
});

_put.click(function(){
    console.log("test")
    $.ajax({
        url: $('input[name=query]').val(),
        contentType : 'application/json',
        dataType: 'json',
        data: JSON.stringify(JSON.parse($("#data").val())),
        type: 'PUT',
        success: function(result){
            var str = JSON.stringify(result, undefined, 4);
            $('#result').val("");
            $('#result').val(str);
        },
        error: function(e){
            console.log(e);
            var str = JSON.stringify(e, undefined, 4);
            $('#result').val("");
            $('#result').val(str);
        }
    })
});

_delete.click(function(){
    $.ajax({
        url: $('input[name=query]').val(),
        contentType: "application/json",
        dataType: 'json',
        type: 'DELETE',
        success: function(result){
            var str = JSON.stringify(result, undefined, 4);
            $('#result').val("");
            $('#result').val(str);
        }
    })
});
