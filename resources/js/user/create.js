$(document).ready(() => {
    $("#username-input").keyup(() => {
        $("#error-username").addClass('d-none')
    })

    $("#name-input").keyup(() => {
        $("#error-name").addClass('d-none')
    })

    $("#email-input").keyup(() => {
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
