        /*
        const contenuCarré1 = `
        <h2>Samedi 03 Juin</h2>
            
        `;
        const contenuCarré2 = `
        <h2><b>Dimanche 04 Juin</b></h2>
           
        `;
        const hcontenuCarré1 = `
            <h2><b>Samedi 03 Juin</b></h2> 
            <br>
            
            <p> <br><b> Triathlon Distance L </b><br> Départ à 8h30 <br><br> <b>Aquathlons jeunes & XS </b><br> Départ 10h15 & 10h30 <br><br> <b>Triathlon Distance S </b><br> Départ 14h30.</p>

        `;
        const hcontenuCarré2 = `
        <h2><b>Dimanche 04 Juin</b></h2>
            <br>
            
            <p> <br><b> Triathlon Distance M </b><br> Départ à 9h <br><br> <b>Swimrun Distance S </b><br> Départ à 14h </p>

        `;
    
        const square1 = document.querySelector('[name="carre1"]');
        const square2 = document.querySelector('[name="carre2"]');
    
        const defaultContent1 = contenuCarré1; // Contenu par défaut
        const defaultContent2 = contenuCarré2; // Contenu par défaut
    
        square1.addEventListener('mouseenter', () => {
            const hoverContent1 = hcontenuCarré1; // Contenu au survol
    
            // Changez le texte et le style du carré au survol
            square1.innerHTML = hoverContent1;
            square1.classList.add('hovered');
        });
    
        square1.addEventListener('mouseleave', () => {
            // Rétablissez le contenu par défaut et le style lorsque le survol est terminé
            square1.innerHTML = defaultContent1;
            square1.classList.remove('hovered');
        });
    
        square2.addEventListener('mouseenter', () => {
            const hoverContent2 = hcontenuCarré2; // Contenu au survol
    
            // Changez le texte et le style du carré au survol
            square2.innerHTML = hoverContent2;
            square2.classList.add('hovered');
        });
    
        square2.addEventListener('mouseleave', () => {
            // Rétablissez le contenu par défaut et le style lorsque le survol est terminé
            square2.innerHTML = defaultContent2;
            square2.classList.remove('hovered');
        });
        */
        const squares = document.querySelectorAll('.square');

        squares.forEach((square) => {
            const eventsList = square.querySelector('.events-list');
        
            square.addEventListener('mouseenter', () => {
                // Show the events list and update the style on hover
                eventsList.style.display = 'block';
                square.classList.add('hovered');
            });
        
            square.addEventListener('mouseleave', () => {
                // Hide the events list and restore the default style when the hover ends
                eventsList.style.display = 'none';
                square.classList.remove('hovered');
            });
        });
        