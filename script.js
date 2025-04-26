// change the navbar background
window.addEventListener("scroll", function () {
    let header = document.querySelector("header");
  
    if (window.scrollY > 0) {
      header.style.backdropFilter = "blur(5px)";
      header.style.backgroundColor = "#14213D";
    } else {
      header.style.backgroundColor = "transparent"; 
    }
  });

  document.getElementsByClassName