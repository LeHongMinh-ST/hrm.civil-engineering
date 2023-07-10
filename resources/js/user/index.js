$(document).ready(() => {
    $('#user-search-input').bind('enterKey', () => {
        $('#form-search').submit()
    })

    $('#user-search-input').keyup(() => {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });
})
