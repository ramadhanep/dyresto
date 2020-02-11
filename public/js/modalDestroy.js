$('#modalDestroy').on('show.bs.modal', function(e) {
    $(this).find('#deleteConf').attr('action', $(e.relatedTarget).data('uri'));
});