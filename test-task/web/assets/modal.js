$(function() {
    $('.update-modal-click').click(function() {
        $('#update-modal')
            .modal('show')
            .find('#updateModalContent')
            .load($(this).attr('value'));
    });
});

$(function() {
    $('.add-modal-click').click(function() {
        $('#update-modal')
            .modal('show')
            .find('#updateModalContent')
            .load($(this).attr('value'));
    });
});