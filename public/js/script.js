// --------navbar---------
document.addEventListener("DOMContentLoaded", function() {
    var menuIcon = document.getElementById("menu-icon");
    var navList = document.querySelector(".nav-list");
    var body = document.body;

    menuIcon.addEventListener("click", function() {
        navList.classList.toggle("open");
        body.classList.toggle("no-scroll");
    });
});

// -------SlideShow-------
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

// scripts.js

document.addEventListener("DOMContentLoaded", function() {
    const formContainer = document.querySelector(".container");

    // Apply initial animation
    formContainer.style.opacity = 0;
    formContainer.style.transform = "translateY(-20px)";
    formContainer.style.transition = "opacity 0.5s ease, transform 0.5s ease";

    // Trigger animation
    setTimeout(() => {
        formContainer.style.opacity = 1;
        formContainer.style.transform = "translateY(0)";
    }, 100);

    // Add a hover effect for the button
    const submitButton = document.querySelector(".btn-primary");
    submitButton.addEventListener("mouseenter", function() {
        submitButton.style.transform = "scale(1.05)";
    });

    submitButton.addEventListener("mouseleave", function() {
        submitButton.style.transform = "scale(1)";
    });
});

// -------Dropdown-------
document.addEventListener("DOMContentLoaded", function() {
  var cityForm = document.getElementById("cityForm");
  var cityInput = document.getElementById("cityInput");
  var cityDropdown = document.getElementById("cityDropdown");
  var cityOptions = cityDropdown.getElementsByTagName("a");

  // Tambahkan event listener untuk menangani submit form
  cityForm.addEventListener("submit", function(event){
      event.preventDefault();
      // Lakukan logika pencarian di sini
      // Untuk demonstrasi, kita akan menampilkan nama kota yang dipilih
      alert("Mencari: " + cityInput.value);
  });

  // Tambahkan event listener untuk menangani perubahan pada input kota
  cityInput.addEventListener("input", function(event) {
      var inputText = cityInput.value.toLowerCase();
      for (var i = 0; i < cityOptions.length; i++) {
          var optionText = cityOptions[i].textContent.toLowerCase();
          if (optionText.includes(inputText)) {
              cityOptions[i].style.display = "block";
          } else {
              cityOptions[i].style.display = "none";
          }
      }
  });

  // Tambahkan event listener untuk menangani klik pada dropdown
  cityInput.addEventListener("click", function(event) {
      cityDropdown.style.display = "block";
  });

  // Tambahkan event listener untuk menutup dropdown saat di luar dropdown diklik
  document.addEventListener("click", function(event) {
      if (!cityDropdown.contains(event.target) && event.target !== cityInput) {
          cityDropdown.style.display = "none";
      }
  });

  // Tambahkan event listener untuk menangani klik pada pilihan kota di dropdown
  cityDropdown.addEventListener("click", function(event) {
      if (event.target.tagName === "A") {
          cityInput.value = event.target.textContent;
          cityDropdown.style.display = "none";
          cityForm.submit();
      }
  });
});
