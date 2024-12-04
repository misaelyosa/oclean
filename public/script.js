document.addEventListener('DOMContentLoaded', () => {
  let lastScroll = 0;
  const navbar = document.getElementById('navbar');

  if (!navbar) {
    console.error('Navbar not found!');
    return;
  }

  window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    console.log(currentScroll);
    if (currentScroll > lastScroll) {
      navbar.classList.add('hide');
      navbar.classList.remove('appear');
    } else {
      navbar.classList.remove('hide');
      navbar.classList.add('appear');
    }
    lastScroll = currentScroll;
  });
});
