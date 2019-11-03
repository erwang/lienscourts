require('./bootstrap');

function ajax(url, data, $target, method, replaceWith) {
    if ($target === undefined || $target == '') {
        console.log($target);
        $target = $('#body');
    } else {
        $target = $($target);
    }
    if (data === undefined) {
        data = [];
    }
    if (method === undefined) {
        method = 'GET';
    }
    if (replaceWith === undefined) {
        replaceWith = false;
    }
    if ($($target).length == 0) {
        console.log('target : ' + $target + ' inexistant');
        console.log(1);
        console.log($target);
        $target = $('#body');
    }

    $target.html('<img src="/dex2_loader.gif">');
    console.log(data);
    options = {
        url: url,
        method: method,
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('[name=_token]').val()
        }
    }

    $.ajax(options)
        .done(function (html) {
            if (replaceWith) {
                $target.replaceWith(html);
            } else {
                $target.html(html);
            }
        }).fail(function (jqXHR, textStatus) {
        if (jqXHR.status == 401) {
            window.location.href = "/login";
        }
        $target.html(jqXHR.responseText);
    })
}
