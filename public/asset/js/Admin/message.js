/*
==================================================
                       ALERT
==================================================
By: Aqsha
Vendor: SweetAlert
*/

// View Approval Agent Di Controller User

const approve = document.getElementById("mAprove");

if (approve) {
  if (approve.innerHTML.trim() == "suksesap") {
    swal({
      icon: "success",
      title: "Approve Sukses",
      text: "Approve agent sukses",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (approve.innerHTML.trim() == "gagalap") {
    swal({
      icon: "error",
      title: "Approve Gagal",
      text: "Approve agent gagal.",
      type: "error",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-danger",
        },
      },
    });
  } else if (approve.innerHTML.trim() == "suksesunap") {
    swal({
      icon: "success",
      title: "Unapprove Sukses",
      text: "Unapprove agent sukses.",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-danger",
        },
      },
    });
  } else if (approve.innerHTML.trim() == "gagalunap") {
    swal({
      icon: "error",
      title: "Unapprove Gagal",
      text: "Unapprove agent gagal.",
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
      title: "Approve Gagal",
      text: "Approve agent gagal, data tidak ditemukan.",
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

// View List Di Controller Paket Umrah

const listUmrah = document.getElementById("list-umrah");

if (listUmrah) {
  if (listUmrah.innerHTML.trim() == "insertpusukses") {
    swal({
      icon: "success",
      title: "Tambah Sukses",
      text: "Tambah paket umrah sukses",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "insertpugagalremaining") {
    swal({
      icon: "error",
      title: "Tambah Gagal",
      text: "Tambah paket umrah remaining gagal, table remaining",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "insertpugagal") {
    swal({
      icon: "error",
      title: "Tambah Gagal",
      text: "Tambah paket umrah remaining gagal",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "updatepusukses") {
    swal({
      icon: "success",
      title: "Update Sukses",
      text: "Update paket umrah sukses",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "updatepugagal") {
    swal({
      icon: "error",
      title: "Update Gagal",
      text: "Update paket umrah gagal",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "deletepusukses") {
    swal({
      icon: "success",
      title: "Hapus Sukses",
      text: "Hapus paket umrah sukses",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "deletepugagalremaining") {
    swal({
      icon: "error",
      title: "Hapus Gagal",
      text: "Hapus paket umrah remaining gagal",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (listUmrah.innerHTML.trim() == "deletepugagal") {
    swal({
      icon: "error",
      title: "Hapus Gagal",
      text: "Hapus paket umrah gagal",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else {
    swal({
      icon: "error",
      title: "Hapus Gagal",
      text: "Hapus paket umrah gagal, data tidak ditemukan",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  }
}

// View Statpop Di Controller Paket Umrah

const statpop = document.getElementById("statpop");

if (statpop) {
  // console.log(approve.innerHTML);
  if (statpop.innerHTML.trim() == "Saktif") {
    swal({
      icon: "success",
      title: "Aktivasi Sukses",
      text: "Aktivasi paket umrah sukses",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Gaktif") {
    swal({
      icon: "error",
      title: "Aktivasi Gagal",
      text: "Aktivasi paket umrah gagal.",
      type: "error",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-danger",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Snonaktif") {
    swal({
      icon: "success",
      title: "Non-Aktif Sukses",
      text: "Non-Aktif paket umrah sukses.",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-primary",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Gnonaktif") {
    swal({
      icon: "error",
      title: "Non-Aktif Gagal",
      text: "Non-Aktif paket umrah gagal.",
      type: "error",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-danger",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Spopuler") {
    swal({
      icon: "success",
      title: "Populer Sukses",
      text: "Populer paket umrah sukses",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-success",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Gpopuler") {
    swal({
      icon: "error",
      title: "Populer Gagal",
      text: "Populer paket umrah gagal.",
      type: "error",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-danger",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Snonpopuler") {
    swal({
      icon: "success",
      title: "Non-Populer Sukses",
      text: "Non-Populer paket umrah sukses.",
      type: "success",
      buttons: {
        confirm: {
          text: "Oke",
          className: "btn btn-success",
        },
      },
    });
  } else if (statpop.innerHTML.trim() == "Gnonpopuler") {
    swal({
      icon: "error",
      title: "Non-Populer Gagal",
      text: "Non-Populer agent gagal.",
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
      title: "Proses Gagal",
      text: "Proses gagal, data paket umrah tidak ditemukan.",
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
