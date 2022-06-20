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
const logo = document.querySelector(".logo img");
logo.addEventListener("mouseover", (event) => {
  event.target.style.transform = "scale(1.05)";
});
logo.addEventListener("mouseout", (event) => {
  event.target.style.transform = "scale(1)";
});
// AKHIR NAVIGASI
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

// INPUT FILE
function preview() {
  const file = document.querySelector(".file-input");
  const filePreview = document.querySelector(".file-preview");

  filePreview.textContent = file.files[0].name;
}
// AKHIR INPUT FILE
// TINYMCE
var editor_config = {
  path_absolute: "/",
  selector: "textarea",
  body_class: "mceBody",
  mobile: {
    menubar: true,
  },
  plugins: [
    "advlist autolink lists link charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker",
  ],
  toolbar:
    "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
  relative_urls: false,
  file_browser_callback: function (field_name, url, type, win) {
    var x =
      window.innerWidth ||
      document.documentElement.clientWidth ||
      document.getElementsByTagName("body")[0].clientWidth;
    var y =
      window.innerHeight ||
      document.documentElement.clientHeight ||
      document.getElementsByTagName("body")[0].clientHeight;
    var cmsURL =
      editor_config.path_absolute +
      "laravel-filemanager?field_name=" +
      field_name;
    if (type == "image") {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file: cmsURL,
      title: "Filemanager",
      width: x * 0.8,
      height: y * 0.8,
      resizable: "yes",
      close_previous: "no",
    });
  },
};

tinymce.init(editor_config);
// AKHIR TINYMCE
