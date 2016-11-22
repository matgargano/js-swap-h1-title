jQuery(document).ready(function ($) {

    var jsHatActive = false,
        getUrlParameter = function (name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        },
        key = getUrlParameter('key'),
        match = {};
    if (Array.isArray(jshat.variables)) {
        jsHatActive = true;
        jshat.variables.forEach(function (object) {
            if (object.handle === key) {
                match = object;
            }

        });
    }

    if (jsHatActive) {

        if (match.title) {
            document.title = match.title;
        }
        if (match.h1) {
            $('h1').html(match.h1);

        }
    }


});