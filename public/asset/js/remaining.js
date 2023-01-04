$(function () {
  const alertRemain = document.getElementById("remaining");

  if (alertRemain) {
    // console.log(approve.innerHTML);
    if (alertRemain.innerHTML.trim() == "suksesupdate") {
      swal({
        icon: "success",
        title: "Update Sukses",
        text: "Update ketersediaan paket umrah sukses",
        type: "success",
        buttons: {
          confirm: {
            text: "Oke",
            className: "btn btn-primary",
          },
        },
      });
    } else if (alertRemain.innerHTML.trim() == "gagalupdate") {
      swal({
        icon: "error",
        title: "Update Gagal",
        text: "Update ketersediaan paket umrah gagal.",
        type: "error",
        buttons: {
          confirm: {
            text: "Oke",
            className: "btn btn-danger",
          },
        },
      });
    } else {
      swal({
        icon: "error",
        title: "Update Gagal",
        text: "Data paket umrah tidak ditemukan",
        type: "error",
        buttons: {
          confirm: {
            text: "Oke",
            className: "btn btn-danger",
          },
        },
      });
    }
  }
});
