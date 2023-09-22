document.querySelectorAll('.section').forEach(section => {
    if (section.querySelector('.section-title') === null) {
        return;
    }
    section.querySelector('.section-container').addEventListener('mouseover', () => { // hover du contenu ou du titre
        section.querySelector('.section-title').style.display = 'none';
        section.querySelector('.section-content').style.display = 'flex';
        section.querySelector('.section-container').style.height = '60%';
        section.querySelector('.section-container').style.width = '70%';
        // element.addEventListener('mouseover', () => { // hover du contenu ou du titre
        //     section.querySelectorAll('.section-title').style.transform = 'translate(0px, 50%);';
        
        
        //     section.querySelector('.section-title').style.display = 'none';
        // section.querySelector('.section-content').style.display = 'flex';

        // }); 
    });
    section.addEventListener('mouseover', () => { // hover de la section
    });
    section.addEventListener('mouseout', () => { // sortie de la section
        section.querySelector('.section-container').style.height = '50%';
        section.querySelector('.section-container').style.width = '60%';
        section.querySelector('.section-title').style.display = 'flex';
        section.querySelector('.section-content').style.display = 'none';
    });
});

function wait(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}