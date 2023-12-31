const idBtnLogin = $('#btn-login')
const idBtnSend = $('#btn-send')
$(document).ready(() => {

    $("#username").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-username").addClass('d-none')
    })

    $("#password").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-password").addClass('d-none')
    })

    $("#password_confirmation").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-password_confirmation").addClass('d-none')
    })

    $("#input-email").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-email").addClass('d-none')
    })

    idBtnLogin.keyup((e) => {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

    idBtnLogin.bind("enterKey", () => {
        $('#login-form').submit()
    });

    idBtnSend.keyup(() => {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

    idBtnSend.bind("enterKey", () => {
        $('#login-form').submit()
    });
})
