(function ($) {
    "use strict";

    try {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Ukrainian.json"
            },
        });

        var bsCustomFileInput = require('bs-custom-file-input/dist/bs-custom-file-input')
        bsCustomFileInput.init()

        // init select2 multiple
        $('.select2').select2({
            theme: "classic",
            tags: true,
            multiple: true,
        })

    } catch (e) {

    }

})(jQuery);
