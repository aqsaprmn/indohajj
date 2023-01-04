const jamaah = document.getElementById("jamaah");

// Tambah Kurang Reserve Pakut Umrah

if (jamaah) {
  // console.log("test");
  const btnMin = jamaah.querySelector("#btn-min");
  const btnPlus = jamaah.querySelector("#btn-plus");
  const total = jamaah.querySelector("#total");
  const totaljamaah = jamaah.querySelector("#total-jamaah");
  const dataMaxPesan = total.getAttribute("data-max");
  // console.log(btnMin, btnPlus, total, totaljamaah);
  btnMin.addEventListener("click", function () {
    total.value = parseInt(total.value) - 1;
    let jamaahNormal = parseInt(totaljamaah.getAttribute("data-jamaah"));
    let jamaahView = jamaahNormal * parseInt(total.value);
    totaljamaah.innerHTML = jamaahView;
    if (total.value == 1) {
      btnMin.setAttribute("disabled", "");
    } else {
      btnMin.removeAttribute("disabled");
    }
  });
  btnPlus.addEventListener("click", function () {
    total.value = parseInt(total.value) + 1;
    let jamaahNormal = parseInt(totaljamaah.getAttribute("data-jamaah"));
    let jamaahView = jamaahNormal * parseInt(total.value);
    totaljamaah.innerHTML = jamaahView;
    if (parseInt(total.value) == parseInt(dataMaxPesan)) {
      btnPlus.setAttribute("disabled", "");
    }
    if (total.value == 1) {
      btnMin.setAttribute("disabled", "");
    } else {
      btnMin.removeAttribute("disabled");
    }
  });

  let jamaahNormal = parseInt(totaljamaah.getAttribute("data-jamaah"));
  let jamaahView = jamaahNormal * parseInt(total.value);
  totaljamaah.innerHTML = jamaahView;
  if (total.value == 1) {
    btnMin.setAttribute("disabled", "");
  }
  // else {
  //   btnMin.removeAttribute("disabled");
  // }

  total.addEventListener("change", function () {
    if (parseInt(total.value) > parseInt(dataMaxPesan)) {
      total.value = dataMaxPesan;
      totaljamaah.innerHTML = dataMaxPesan;
    } else if (total.value < 1) {
      total.value = 1;
      totaljamaah.innerHTML = 1;
    }
  });
}

// Alert
const M_UmrahDetail = document.getElementById("M_UmrahDetail");

if (M_UmrahDetail) {
  console.log(M_UmrahDetail);
}
