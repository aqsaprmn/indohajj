const Muser = document.getElementById("Muser");

if (Muser) {
  if (Muser.innerHTML.trim() === "Gpass") {
    Swal.fire({
      title: "Log In Gagal",
      text: "Password yang anda masukkan salah!",
      icon: "error",
    });
  } else if (Muser.innerHTML.trim() === "Gstatus") {
    Swal.fire({
      title: "Log In Gagal",
      text: "Akun anda belum di approve!",
      icon: "error",
    });
  } else {
    Swal.fire({
      title: "Log In Gagal",
      text: "Username atau email yang anda masukkan salah!",
      icon: "error",
    });
  }
}
