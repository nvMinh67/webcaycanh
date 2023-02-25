<script>
    $(document).ready(function() {

        // Khi nhấn vào nút delete bất kỳ trên danh sách
        $(document).on('click', '.delete-product', function(event) {
            // stop chuyen link khi nhấn vào thẻ <a>
            event.preventDefault();
            // hoặc sử dụng Bootstrap Modal
            showModalConfirm(event.currentTarget); // lấy phần tử <a> vừa được click
        })
    });

    // Show Modal dialog xác nhận xoá
    function showModalConfirm(e) {
        var deleteModal = new bootstrap.Modal($('#confirmDeleteModal'), {
            keyboard: false
        });

        // pass các ID và Return URL qua form trong Modal
        // lấy url trong thẻ <a> gán vào action của form
        let url = $(e).prop('href');
        $("#deleteForm").prop('action', url);

        // lấy thuộc tính data-id="" trong thẻ <a> gán vào hidden input trên form trong modal
        $("#product-id").val($(e).data('id'));
        $("#return-url").val($(e).data('return-url'));
        let msg = 'Are you sure you want to delete ' + $(e).data('name') + '?';
        $("#delete-message").text(msg);

        deleteModal.show();

    }
</script>