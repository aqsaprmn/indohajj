const baseURL = "http://localhost/indohajj/";
// const baseURL = "http://103.242.181.10/indohajj/";

// Scrool Navbar
// const navbar = document.querySelector(".navbar");

// if (navbar) {
//   const navAll = navbar.querySelector("#nav-all");
//   const menu = navbar.querySelector(".menu");
//   const alink = menu.querySelectorAll("li a");
//   const btnToogler = navbar.querySelector(".navbar-toggler");
//   const iconToogler = btnToogler.querySelector(".navbar-toggler-icon");
//   const loggedIn = navbar.querySelector("#logget-in");
//   const loggedOut = navbar.querySelector("#logged-out");
//   // console.log(menu);
//   window.addEventListener("scroll", function () {
//     if (this.scrollY > 200) {
//       navbar.classList.remove("bg-transparent");
//       // menu.classList.remove("bg-transparent");
//       navbar.classList.add("shadow");
//       navbar.classList.add("bg-white");
//       // menu.classList.add("bg-white");
//       navbar.style.height = "70px";
//       for (let i = 0; i < alink.length; i++) {
//         const alinkI = alink[i];
//         alinkI.classList.remove("text-white");
//       }

//       if (loggedOut) {
//         loggedOut.classList.replace('bg-transparent', 'bg-white');
//       }

//       btnToogler.classList.replace('border-white', 'border-secondary')
//       iconToogler.style.backgroundImage = `url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")`;
//     } else {
//       navbar.classList.add("bg-transparent");
//       // menu.classList.add("bg-transparent");
//       navbar.classList.remove("shadow");
//       navbar.classList.remove("bg-white");
//       // menu.classList.remove("bg-white");
//       navbar.style.height = "60px";
//       for (let i = 0; i < alink.length; i++) {
//         const alinkI = alink[i];
//         alinkI.classList.add("text-white");
//       }

//       if (loggedOut) {
//       loggedOut.classList.replace('bg-transparent', 'bg-dongker-2');
//       }
      
//       btnToogler.classList.replace('border-dark', 'border-white')
//       iconToogler.style.backgroundImage = `url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='white' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")`
//     }
//   });

//   // Handle Ui Login
//   // console.log(userlogin);

//   resizeUiLogin();
//   window.addEventListener("resize", resizeUiLogin);

//   function resizeUiLogin() {
//     if (loggedIn) {
//       if (this.innerWidth < 992) {
//         // userlogin.style.width = "auto";
//         loggedIn.classList.remove("rounded-start");
//       } else {
//         // userlogin.style.width = "360px";
//         loggedIn.classList.add("rounded-start");
//       }
//     }
//   }

  // Hanlde Nav

  // resizeUiNav();
  // window.addEventListener("resize", resizeUiNav);

  // function resizeUiNav() {
  //   if (menu) {
  //     if (this.innerWidth < 992) {
  //       menu.classList.add("bg-white");
  //     } else {
  //       menu.classList.remove("bg-white");
  //     }
  //   }
  // }
// }

const buttonBook = document.getElementById("btnBooking");
const buttonCan = document.getElementById("cancel");
// if (buttonBook) {
//   buttonBook.addEventListener("click", function (e) {
//     e.stopImmediatePropagation();
//     e.stopPropagation();

//     const text = buttonBook.getAttribute("data-text");

//     Swal.fire({
//       title: "Booking Konfirmasi",
//       text: "Anda Akan Melakukan Booking " + text,
//       icon: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "#3085d6",
//       cancelButtonColor: "#d33",
//       confirmButtonText: "Ya, Booking!",
//     }).then((result) => {
//       if (result.isConfirmed) {
//         return true;
//       } else {
//         return false;
//       }
//     });
//   });
// }

// $("form #btnBooking").click(function (e) {
//   let $form = $(this).closest("form");

//   const text = buttonBook.getAttribute("data-text");

//   Swal.fire({
//     title: "Booking Konfirmasi",
//     text: "Anda Akan Melakukan Booking " + text,
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     confirmButtonText: "Ya, Booking!",
//   }).then((result) => {
//     if (result.isConfirmed) {
//       $form.submit();
//     } else {
//       return false;
//     }
//   });
// });

// const maskapai = document.getElementById("maskapai");

// if (maskapai) {
//   maskapai.addEventListener("change", function () {
//     const val = this.value;

//     const bandara = document.getElementsByClassName("");

//     if (val == 1) {
//     }
//   });
// }

const message = document.getElementById("message");

if (message) {
  if (message.innerHTML.trim() === "visa") {
    Swal.fire({
      title: "Pendaftaran",
      text: "Pendafataran Visa Umrah Berhasil",
      icon: "success",
    });
  } else if (message.innerHTML.trim() === "umrah sukses") {
    Swal.fire({
      title: "Booking",
      text: "Booking Paket Umrah Berhasil",
      icon: "success",
    });
  } else if (message.innerHTML.trim() === "umrah gagal") {
    Swal.fire({
      title: "Booking",
      text: "Booking Paket Umrah Gagal!",
      icon: "warning",
    });
  }
}

const divPass = document.querySelectorAll(".password");
// console.log(divPass);
for (let i = 0; i < divPass.length; i++) {
  const divPassI = divPass[i];
  const inputEyePass = divPassI.querySelector('input[type="password"]');
  const eye = divPassI.querySelector("a.see");
  const Ieye = eye.querySelector("i");

  if (eye) {
    // console.log(eye);
    eye.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      // console.log(Ieye);
      if (inputEyePass.type == "password") {
        inputEyePass.type = "text";
        Ieye.classList.replace("fa-eye-slash", "fa-eye");
        Ieye.classList.replace("fa-solid", "fa");
      } else {
        inputEyePass.type = "password";
        Ieye.classList.replace("fa-eye", "fa-eye-slash");
        Ieye.classList.replace("fa", "fa-solid");
      }
    });
  }
}

// CopyText

const btnCopy = document.getElementById("btnCopy");

// console.log(btnCopy);

// function copyText() {
//   const textCopy = document.getElementsByClassName("textCopy");

//   textCopy[0].select();
//   textCopy.setSelectionRange(0, 99999);

//   navigator.clipboard.writeText(copyText.value);
// }
if (btnCopy) {
  btnCopy.addEventListener("click", function () {
    var copyText = document.getElementById("textCopy");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    setTimeout(function () {
      const tooltip = document.getElementById("tooltiptext");
      // console.log(tooltip);
      tooltip.style.opacity = 1;
      tooltip.style.visibility = "visible";
    }, 1);
    setTimeout(function () {
      const tooltip = document.getElementById("tooltiptext");
      // console.log(tooltip);
      tooltip.style.opacity = 0;
      tooltip.style.visibility = "hidden";
    }, 1000);
  });
}
// Cehckbox Email dan Telpon
const checkTelp = document.querySelector(".check-telp");

if (checkTelp) {
  const dataValidate = checkTelp.getAttribute("data-validate");

  if (dataValidate != "") {
    checkTelp.checked = true;
  }

  hideEmailHp();

  checkTelp.addEventListener("change", function () {
    hideEmailHp();
  });
}

function hideEmailHp() {
  const divInpEmail = document.querySelector("#input-email");
  const divInpHp = document.querySelector("#input-hp");
  const inpEmail = divInpEmail.querySelector("input");
  const inpHp = divInpHp.querySelector("input");
  if (checkTelp.checked) {
    divInpHp.removeAttribute("hidden");
    divInpEmail.setAttribute("hidden", "");
    inpEmail.value = "";
  } else {
    divInpHp.setAttribute("hidden", "");
    divInpEmail.removeAttribute("hidden");
    inpHp.value = "";
  }
}

function formatRupiah(angka, prefix) {
  var number_string = angka.toString().replace(/[^,\d]/g, ""),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
