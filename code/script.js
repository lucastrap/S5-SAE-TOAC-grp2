document.querySelectorAll('.section').forEach(section => {
    if (section.querySelector('.section-title') === null) {
        return;
    }
    section.querySelectorAll('div').forEach(element => {
        element.addEventListener('mouseover', () => {
            section.querySelector('.section-title').style.display = 'none';
            section.querySelector('.section-content').style.display = 'block';
        });
    });
    section.addEventListener('mouseover', () => {
        section.querySelector('.section-title').style.height = '60%';
        section.querySelector('.section-title').style.width = '70%';
    });
    section.addEventListener('mouseout', () => {
        section.querySelector('.section-title').style.height = '50%';
        section.querySelector('.section-title').style.width = '60%';
        section.querySelector('.section-title').style.display = 'flex';
        section.querySelector('.section-content').style.display = 'none';
    });
});