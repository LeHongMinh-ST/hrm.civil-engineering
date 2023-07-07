$(document).ready(function () {
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 2500
    });

})

const init = {
    showNotiSuccess: (message) => {
        new Noty({
            text: message,
            type: 'success',
            closeWith: ['button']
        }).show();
    },

    showNotiError: (message) => {
        new Noty({
            text: message,
            type: 'error',
            closeWith: ['button']
        }).show();
    }
}
