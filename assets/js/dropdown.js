+function ($) {
    "use strict"

    $(document).on('click', '[data-control="areaselector-dropdown"]', function (oEvent) {
        var oTarget = oEvent.target;
        var vAreaId = oTarget.dataset.areaId;

        $('input[name="area"]').val(vAreaId);

        $(this).closest('form').submit();

        // location.reload();
    })

}(jQuery);