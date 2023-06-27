$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function removeRow(id, url) {
    if (confirm("Ban co chac chan xoa ? ")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: url,
            success: function (result) {
                console.log(result);
                // if (result.error === false) {
                //     alert("Xoa thanh cong");
                //     alert(result.massage);
                //     location.reload();
                // } else {
                //     alert("Xoa khong thanh cong");
                // }
            },
        });
    }
}
