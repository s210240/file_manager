function openFile(file_path) {
    $.ajax({
        url: 'open_file',
        type: 'GET',
        data: {
            'link': file_path
        },
        success: function (msg) {
            console.log(msg);
            window.location.href = msg;
        }
    });
}
