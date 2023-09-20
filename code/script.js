document.querySelectorAll('.section').forEach(section => {
    if (section.querySelector('.section-title') === null) {
        return;
    }
    section.querySelectorAll('div').forEach(element => { 
        element.addEventListener('mouseover', () => { // hover du contenu ou du titre
            section.querySelector('.section-title p').style.transform = 'translate(100px, 0)';
            wait(200).then(() => {
                section.querySelector('.section-title').style.display = 'none';
                section.querySelector('.section-content').style.display = 'block';
            });
        });
    });
    section.addEventListener('mouseover', () => { // hover de la section
        section.querySelector('.section-title').style.height = '60%';
        section.querySelector('.section-title').style.width = '70%';
    });
    section.addEventListener('mouseout', () => { // sortie de la section
        section.querySelector('.section-title').style.height = '50%';
        section.querySelector('.section-title').style.width = '60%';
        section.querySelector('.section-title').style.display = 'flex';
        section.querySelector('.section-content').style.display = 'none';
    });
});

function wait(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}