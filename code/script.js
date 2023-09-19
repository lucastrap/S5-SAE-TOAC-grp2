document.querySelectorAll('.section').forEach(section => {
    if (section.querySelector('.section-title') === null) {
        return;
    }
    section.addEventListener('mouseover', () => {
        section.querySelector('.section-title').hidden = true;
        section.querySelector('.section-elements').hidden = false;
        console.log(section.querySelector('.section-title').innerHTML);
    });
});