$(document).ready(() => {
    $("#username-input").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-username").addClass('d-none')
    })

    $("#name-input").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-name").addClass('d-none')
    })

    $("#email-input").keyup((e) => {
        $(e.currentTarget).removeClass('is-invalid')
        $("#error-email").addClass('d-none')
    })
    let isRequest = false
    $('#btn-submit').click(() => {
        $('#btn-submit').prop('disabled', true)
        if(!isRequest) {
            isRequest = true
            $('#user-form').submit()
        }
    })
})
