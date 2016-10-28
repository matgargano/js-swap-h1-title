jQuery(document).ready(function ($) {

    var getUrlParameter = function (name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        },
        key = getUrlParameter('key'),
        match = {};
    jshat.variables.forEach(function (object) {
        console.log(object);
        if (object.handle === key) {
            match = object;
        }

    });

    console.log(match);

    if (match.title) {
        document.title = match.title;
    }
    if (match.h1) {
        $('h1').html(match.h1);
    }


});