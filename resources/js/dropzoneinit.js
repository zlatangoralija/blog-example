Dropzone.autoDiscover = false;
$( document ).ready(function() {
    console.log( "ready!" );
    $(".dropzone").dropzone({
        url: "/file-uploads",
        addRemoveLinks: true,
        acceptedFiles: 'image/jpeg,application/pdf,image/gif,image/png,application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/svg+xml,application/vnd.oasis.opendocument.spreadsheet,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        init: function() {

            this.on("removedfile", function(file) {
                if (file.status == 'success') {
                    var fileUploded = file.previewElement.querySelector("[data-dz-name]");

                    var filename = $(fileUploded).attr('data-path');

                    $.ajax({
                        url: '/file-uploads',
                        type: "delete",
                        data: { 'path': filename},
                        success: function(data) {
                            $('[value="'+filename+'"]').remove();
                        }
                    });
                    var lang = $('#lang option:selected').val();
                    minFiles = false;
                }
            });
        },
        sending: function(file, xhr, formData) {
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
        },
        success: function (file, response) {

            var lang = $('#lang option:selected').val();
            var inputElement = $(this.element).data('input-element')
            console.log(inputElement);
            $(inputElement).val(JSON.stringify(response));

            minFiles = true;

            var fileUploded = file.previewElement.querySelector("[data-dz-name]");
            $(fileUploded).attr('data-path', response.path);

            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + response.path);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
});
