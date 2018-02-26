addEventListener("DOMContentLoaded", function() { 
  /* Read more functionality */
  const sections = document.querySelectorAll(".readmore-section")

  sections.forEach((section) => {
    section.addEventListener('click', (event) => {
      const isReadmoreToggle = event.target.classList.contains('readmore-toggle')
      if (isReadmoreToggle) {
        event.preventDefault();
        section.classList.toggle('readmore-section-clicked')
      }
    })
  })
});
