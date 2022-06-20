// PARALLAX
ScrollOut({
  threshold: 0.2,
});
// AKHIR PARALLAX
// NAVIGASI
// NAVIGASI
const sidebar = document.querySelector("nav ul");
const toggle = document.querySelector(".menu-toggle");
const all = document.querySelector("main");
const first = toggle.querySelector("span:nth-child(1)");
const second = toggle.querySelector("span:nth-child(2)");
const third = toggle.querySelector("span:nth-child(3)");
const brand = document.querySelectorAll("nav .logo a");
const menuService = document.querySelector("nav  ul li:nth-child(3) a");
const menuLearn = document.querySelector("nav  ul li:nth-child(2) a");
toggle.addEventListener("click", () => {
  first.classList.toggle("topburger");
  third.classList.toggle("bottomburger");
  second.classList.toggle("midburger");
  sidebar.classList.toggle("slide");
});
// AKHIR NAVIGASI
// PENGUMUMAN
const linkpengumuman = document.querySelectorAll(".side-pengumuman ul li");
const mainpengumuman = document.querySelectorAll(
  ".main-pengumuman .pengumuman-item"
);
linkpengumuman.forEach((link) => {
  link.addEventListener("click", () => {
    if (
      event.target ==
      document.querySelector(".side-pengumuman ul li:nth-child(1)")
    ) {
      const itempengumuman = document.querySelector(
        ".main-pengumuman .pengumuman-item:nth-child(1)"
      );
      mainpengumuman.forEach((main) => main.classList.remove("tampil"));
      linkpengumuman.forEach((linkpeng) => linkpeng.classList.remove("aktif"));
      itempengumuman.classList.add("tampil");
      event.target.classList.add("aktif");
    } else if (
      event.target ==
      document.querySelector(".side-pengumuman ul li:nth-child(2)")
    ) {
      const itempengumuman = document.querySelector(
        ".main-pengumuman .pengumuman-item:nth-child(2)"
      );
      mainpengumuman.forEach((main) => main.classList.remove("tampil"));
      linkpengumuman.forEach((linkpeng) => linkpeng.classList.remove("aktif"));
      itempengumuman.classList.add("tampil");
      event.target.classList.add("aktif");
    } else if (
      event.target ==
      document.querySelector(".side-pengumuman ul li:nth-child(3)")
    ) {
      const itempengumuman = document.querySelector(
        ".main-pengumuman .pengumuman-item:nth-child(3)"
      );
      mainpengumuman.forEach((main) => main.classList.remove("tampil"));
      linkpengumuman.forEach((linkpeng) => linkpeng.classList.remove("aktif"));
      itempengumuman.classList.add("tampil");
      event.target.classList.add("aktif");
    } else if (
      event.target ==
      document.querySelector(".side-pengumuman ul li:nth-child(4)")
    ) {
      const itempengumuman = document.querySelector(
        ".main-pengumuman .pengumuman-item:nth-child(4)"
      );
      mainpengumuman.forEach((main) => main.classList.remove("tampil"));
      linkpengumuman.forEach((linkpeng) => linkpeng.classList.remove("aktif"));
      itempengumuman.classList.add("tampil");
      event.target.classList.add("aktif");
    } else {
      const itempengumuman = document.querySelector(
        ".main-pengumuman .pengumuman-item:nth-child(5)"
      );
      mainpengumuman.forEach((main) => main.classList.remove("tampil"));
      linkpengumuman.forEach((linkpeng) => linkpeng.classList.remove("aktif"));
      itempengumuman.classList.add("tampil");
      event.target.classList.add("aktif");
    }
  });
});
// AKHIR PENGUMUMAN
// SMOOTH SCROLL
if (
  document.querySelector("main.home") ||
  document.querySelector("main.ppdb") ||
  document.querySelector("main.about-contact")
) {
  $(".page-scroll").on("click", function (event) {
    const tujuan = $(this).attr("href");
    //tangkap elemen Tujuan
    const elemenTujuan = $(tujuan);

    //Scroll
    $("html, body").animate(
      {
        scrollTop: elemenTujuan.offset().top - 50,
      },
      1000,
      "easeInOutExpo"
    );

    event.preventDefault();
  });
}
// AKHIR SMOOTH SCROLL

// MATERI
const toggleketerangan = document.querySelectorAll(
  ".card-detail .buttons .toggle"
);
toggleketerangan.forEach((ket) => {
  ket.addEventListener("click", (event) => {
    event.preventDefault();
    console.log(event.target.parentElement.parentElement.nextElementSibling);
    if (
      event.target.parentElement.parentElement.nextElementSibling.classList.contains(
        "hide"
      )
    ) {
      event.target.parentElement.parentElement.parentElement.classList.toggle(
        "expand"
      );
      event.target.parentElement.parentElement.nextElementSibling.style.display =
        "block";
      setTimeout(() => {
        event.target.parentElement.parentElement.nextElementSibling.classList.toggle(
          "hide"
        );
      }, 100);
    } else {
      event.target.parentElement.parentElement.nextElementSibling.classList.toggle(
        "hide"
      );
      setTimeout(() => {
        event.target.parentElement.parentElement.nextElementSibling.style.display =
          "none";
        event.target.parentElement.parentElement.parentElement.classList.toggle(
          "expand"
        );
      }, 600);
    }
  });
});

const optionKelas = document.querySelectorAll(".toggle-class");
const materi = document.querySelectorAll(".card-materi");
optionKelas.forEach((kelas) => {
  kelas.addEventListener("click", (event) => {
    event.preventDefault();
    const id = event.target.dataset.class;
    if (id != "all") {
      optionKelas.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      materi.forEach((mat) => {
        if (mat.classList.contains(id)) {
          mat.style.display = "grid";
        } else {
          mat.style.display = "none";
        }
      });
    } else {
      optionKelas.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      materi.forEach((mat) => (mat.style.display = "grid"));
    }
  });
});
// AKHIR MATERI
// TOGGLE CLASS
const optionRole = document.querySelectorAll(".toggle-class");
const list = document.querySelectorAll(".card-list");
optionRole.forEach((kelas) => {
  kelas.addEventListener("click", (event) => {
    event.preventDefault();
    const id = event.target.dataset.class;
    if (id != "all") {
      optionRole.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      list.forEach((item) => {
        if (
          item.classList.contains(`${id}`) ||
          item.classList.contains("all")
        ) {
          item.style.display = "flex";
        } else {
          item.style.display = "none";
        }
      });
    } else {
      optionRole.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      list.forEach((item) => (item.style.display = "flex"));
    }
  });
});
// AKHIR TOGGLE CLASS
// MODAL

//DETAIL
document.addEventListener("click", async function (event) {
  if (event.target.classList.contains("modal-detail-button")) {
    try {
      const id = event.target.dataset.id;
      const kegiatanDetail = await getKegiatanDetail(id);
      tampilkanDetail(kegiatanDetail[0]);
    } catch (err) {
      console.log(err);
    }
    const modalContainer = document.querySelector(".modal-container");
    setTimeout(() => {
      modalContainer.classList.add("open");
    }, 50);
  }
});

function getKegiatanDetail(id) {
  return fetch(`/pages/getKegiatan/${id}`).then((response) => {
    if (response.status !== 200) {
      throw new Error(response.statusText);
    }
    return response.json();
  });
}

function tampilkanDetail(kegiatanDetail) {
  const putDrinkDetail = inputKegiatanDetail(kegiatanDetail);
  const modalBody = document.querySelector(".modal");
  modalBody.innerHTML = putDrinkDetail;
}

function inputKegiatanDetail(kegiatan) {
  return `<div class="modal-container">
            <div class="modal-item">
              <div class="close-modal">
                <h3>${kegiatan.nama}</h3>
                <a href="#" class="close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#24305b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line class="close" x1="18" y1="6" x2="6" y2="18"></line><line class="close" x1="6" y1="6" x2="18" y2="18"></line></svg></a>
              </div>
              <div class="modal-kegiatan">
                <img class="img-modal-item" src="/img/news/${kegiatan.gambar}" alt="${kegiatan.nama}">
                <div class="keterangan-modal">
                  <p class="subtitle">${kegiatan.tanggal}</p>
                  <p>${kegiatan.keterangan}</p>
                </div>
              </div>
            </div>
          </div>
  `;
}

document.addEventListener("click", function (event) {
  if (event.target.classList.contains("close")) {
    const modalContainer = document.querySelector(".modal-container");
    event.preventDefault();
    modalContainer.classList.remove("open");
  }
});
// AKHIR DETAIL
// ILUSTRASI PPDB
const online = document.querySelector(".ilustrasi.online");
const manual = document.querySelector(".ilustrasi.manual");
const pilihAlur = document.querySelectorAll(".pilih-alur");
pilihAlur.forEach((alur) => {
  alur.addEventListener("click", (event) => {
    event.preventDefault();
    pilihAlur.forEach((e) => e.classList.remove("aktif"));
    event.target.classList.add("aktif");
    if (event.target.classList.contains("online")) {
      manual.classList.remove("tampil");
      online.classList.add("tampil");
    } else if (event.target.classList.contains("manual")) {
      online.classList.remove("tampil");
      manual.classList.add("tampil");
    }
  });
});

if (document.querySelector(".ilustrasi") != null) {
  let ukuranLayar = window.screen.width;
  if (ukuranLayar <= 700) {
    document
      .querySelector(".ilustrasi.online img ")
      .setAttribute("src", "/img/daftarOnlineMobille.svg");
    document
      .querySelector(".ilustrasi.manual img ")
      .setAttribute("src", "/img/daftarManualMobille.svg");
  } else if (ukuranLayar >= 700) {
    document
      .querySelector(".ilustrasi.online img ")
      .setAttribute("src", "/img/daftarOnline.svg");
    document
      .querySelector(".ilustrasi.manual img ")
      .setAttribute("src", "/img/daftarManual.svg");
  }
  window.addEventListener("resize", () => {
    let layar = window.screen.width;
    if (layar <= 700) {
      document
        .querySelector(".ilustrasi.online img ")
        .setAttribute("src", "/img/daftarOnlineMobille.svg");
      document
        .querySelector(".ilustrasi.manual img ")
        .setAttribute("src", "/img/daftarManualMobille.svg");
    } else if (layar >= 700) {
      document
        .querySelector(".ilustrasi.online img ")
        .setAttribute("src", "/img/daftarOnline.svg");
      document
        .querySelector(".ilustrasi.manual img ")
        .setAttribute("src", "/img/daftarManual.svg");
    }
  });
  // AKHIR ILUSTASI PPDB
}

// TESTIMONI
const testi = document.querySelectorAll(".testi-plus");
const testiButton = document.querySelector(".see-more-testi");
if (testiButton) {
  testiButton.addEventListener("click", (event) => {
    event.preventDefault();
    if (testiButton.classList.contains("terbuka")) {
      testiButton.innerHTML = `<img src="/icons/list.svg" alt="list" class="icon">Lihat Selengkapnya`;

      const elemenTujuan = $("#testimoni");
      //Scroll
      $("html, body").animate(
        {
          scrollTop: elemenTujuan.offset().top - 30,
        },
        1000,
        "easeInOutExpo"
      );
      // TESTI ITEM
      testi.forEach((tes) => {
        tes.classList.toggle("hide");
        setTimeout(() => {
          tes.classList.toggle("displayControl");
        }, 1000);
      });
    } else {
      testiButton.innerHTML = `<img src="/icons/close.svg" alt="close" class="icon">Tutup`;
      const elemenTujuan = $(this).scrollTop();

      //Scroll
      $("html, body").animate(
        {
          scrollTop: elemenTujuan + 100,
        },
        1000,
        "easeInOutExpo"
      );
      // TESTI ITEM
      testi.forEach((tes) => {
        tes.classList.toggle("displayControl");
        setTimeout(() => {
          tes.classList.toggle("hide");
        }, 100);
      });
    }

    testiButton.classList.toggle("terbuka");
  });
}
// AKHIR TESTIMONI
// PRESTASI TAMBAHAN

document.addEventListener("click", async function (event) {
  if (event.target.classList.contains("modal-pres-button")) {
    event.preventDefault();
    try {
      const prestambahan = await getPres();
      tampilkanPres(prestambahan);
    } catch (err) {
      console.log(err);
    }
    const modalContainer = document.querySelector(".modal-container");
    setTimeout(() => {
      modalContainer.classList.add("open");
    }, 50);
  }
});

function getPres() {
  return fetch(`./pages/getPres`).then((response) => {
    if (response.status !== 200) {
      throw new Error(response.statusText);
    }
    return response.json();
  });
}

function tampilkanPres(prestambahan) {
  let konten = inputPresDetail(prestambahan);
  const modalBody = document.querySelector(".modalPres");
  modalBody.innerHTML = konten;
}

function inputPresDetail(pres) {
  let container1 = `<div class="modal-container">
                      <div class="modal-item">
                          <div class="close-modal">
                              <h3>Prestasi Sejak 2017</h3>
                              <a href="#" class="close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#24305b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line class="close" x1="18" y1="6" x2="6" y2="18"></line><line class="close" x1="6" y1="6" x2="18" y2="18"></line></svg></a>
                          </div>
                          <div class="prestasi-plus">`;
  let isi = " ";
  pres.forEach(
    (prestasi) =>
      (isi += `<div class="prestasi-lain" data-scroll>
                                        <div class="kiri">
                                            <p class="subtitle">${prestasi.tahun}</p>
                                            <h4>${prestasi.nama}</h4>
                                            <p>${prestasi.tingkat}</p>
                                        </div>
                                        <h4 class="kanan">${prestasi.juara}</h4>
                                      </div>`)
  );
  let container2 = `</div></div></div>`;
  return container1 + isi + container2;
}

document.addEventListener("click", function (event) {
  if (event.target.classList.contains("close")) {
    event.preventDefault();
    const modalContainer = document.querySelector(".modal-container");
    modalContainer.classList.remove("open");
  }
});
// AKHIR DETAIL
// AKHIR PRESTASI
// KELULUSAN
const pendaftar = document.querySelectorAll(".pendaftar");
optionKelas.forEach((kelas) => {
  kelas.addEventListener("click", (event) => {
    event.preventDefault();
    const id = event.target.dataset.status;
    if (id != "all") {
      optionKelas.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      pendaftar.forEach((mat) => {
        if (mat.classList.contains(id)) {
          mat.style.display = "flex";
        } else {
          mat.style.display = "none";
        }
      });
    } else {
      optionKelas.forEach((k) => k.classList.remove("on"));
      event.target.classList.add("on");
      pendaftar.forEach((mat) => (mat.style.display = "flex"));
    }
  });
});
// AKHIR KELULUSAN
