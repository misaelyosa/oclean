let lastScroll = 0;
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
  const currentScroll = window.scrollY;
    console.log(currentScroll)
  if (currentScroll > lastScroll) {
    
    // Scrolling ke bawah - sembunyikan navbar
    navbar.classList.add('hide');
    navbar.classList.remove('appear');
  } else {
    // Scrolling ke atas - tampilkan navbar
    navbar.classList.remove('hide');
    navbar.classList.add('appear');
  }

  // Update last scroll
  lastScroll = currentScroll;
});
