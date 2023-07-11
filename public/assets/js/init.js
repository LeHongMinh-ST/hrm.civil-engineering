$(document).ready(function () {
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 2500
    });



})

const swalInit = swal.mixin({
    buttonsStyling: false,
    customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-light',
        denyButton: 'btn btn-light',
        input: 'form-control'
    }
});

const init = {
    showNotySuccess: (message) => {
        new Noty({
            text: message,
            type: 'success',
            closeWith: ['button']
        }).show();
    },

    showNotyError: (message) => {
        new Noty({
            text: message,
            type: 'error',
            closeWith: ['button']
        }).show();
    }
}


