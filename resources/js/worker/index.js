$(document).ready(() => {
    $('#worker-search-input').bind('enterKey', () => {
        $('#form-search').submit()
    })

    $('#worker-search-input').keyup(() => {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

    let isRequest = false

    $('.btn-delete').click(function () {
        const form = $(this).parent()
        swalInit.fire({
            title: 'Bạn có chắc?',
            text: 'Dữ liệu này không thể phục hồi!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Đóng'
        }).then(async (result) => {
            if (result.isConfirmed) {
                if (!isRequest) {
                    isRequest = true
                    await form.submit()
                    isRequest = false
                }
            }
        });
    })
})
