/**
 * Calcule le positionnement de l'élément par rapport au haut de la page
 * @param {HTMLElement} element 
 * @returns {number}
*/
function offsetTop(element, acc = 0) {
    if(element.offsetParent){
        return offsetTop(element.offsetParent, acc + element.offsetTop);
    }
    return acc + element.offsetTop;
}

/**
 * @property {HTMLElement} element
 * @property {{y: number, y: number, rotation: number, scale: number, display: string, arrow: number, variable: boolean}} options
 */
class Parallax {
    /**
     * 
     * @param {HTMLElement} element 
    */
   constructor(element) {
       this.element = element;
       this.options = this.parseAttribute();

       this.onScroll = this.onScroll.bind(this);
       this.onIntersection = this.onIntersection.bind(this);
       this.onResize = this.onResize.bind(this);
       
       this.elementY = offsetTop(this.element) + this.element.offsetHeight/2;
       const observer = new IntersectionObserver(this.onIntersection);
       observer.observe(element);
       this.onScroll();
    }
    
    parseAttribute(){
        const defaultOptions = {
            y: 0,
            x: 0,
            rotation: 0,
            scale: 0,
            display: "",
            arrow: false,
            variable: false
        };
        if(this.element.dataset.parallax.startsWith('{')){
            return {...defaultOptions, ...JSON.parse(this.element.dataset.parallax)};
        }
        return{...defaultOptions, y: parseFloat(this.element.dataset.parallax)};
    }

    
    /**
     * 
     * @param {IntersectionObserverEntry[]} entries 
    */
   onIntersection(entries){
       for(const entry of entries){
           if(entry.isIntersecting){
               document.addEventListener('scroll', this.onScroll);
               window.addEventListener('resize', this.onResize);
               this.elementY = offsetTop(this.element) + this.element.offsetHeight/2;
            } else {
                document.removeEventListener('scroll', this.onScroll);
                window.removeEventListener('resize', this.onResize);
            }
        }
    }

    onResize(){
        this.elementY = offsetTop(this.element) + this.element.offsetHeight/2;
        this.onScroll();
    }

    onScroll = () => {
        window.requestAnimationFrame(() => {
            const screenY = window.scrollY + window.innerHeight/2;
            const diffY = this.elementY - screenY;
            const translateY = diffY * -1 * this.options.y;
            if(this.options.variable){
                this.element.style.setProperty('--parallaxY', translateY + 'px')
            }
            let transform = "translateY("+translateY+"px)";
            if(this.options.rotation){
                transform += " rotate("+diffY * this.options.rotation+"deg)";
            }
            if(this.options.scale && diffY > 0 && diffY < 300){
                const scaleFactor = this.options.scale + ((1 - this.options.scale) * diffY / 300);
                console.log(scaleFactor);
                transform += " scale(" + scaleFactor + ")";
            } else if (this.options.scale && diffY <= 0){
                transform += " scale(" + this.options.scale + ")";
            }
            if(this.options.x && diffY > 0 && diffY < 200){
                const yFactor = -170 + (170 * (diffY / 200));
                transform += " translateY("+yFactor+"px)";
                document.querySelector("#"+this.options.display).style.display = "flex";
            } else if (this.options.x && diffY <= 0){
                transform += " translateY(-170px)";
            } else if (this.options.x && diffY > 0){
                transform += " translateY(0px)";
                document.querySelector("#"+this.options.display).style.display = "none";
            }
            if(this.options.arrow && diffY > -500){
                transform = "translateY("+diffY * -1 * this.options.arrow+"px)"; 
            }
            this.element.style.setProperty(
                "transform",
                transform
            );
        
        });
    }

    /**
     * 
     * @returns {Parallax[]}
     */
    static bind(){
        return Array.from(document.querySelectorAll('[data-parallax]')).map(element => {
            return new Parallax(element);
        });
    }
}

Parallax.bind();


// data-parallax > 1 : l'élément va dans le sens du scroll
// data-parallax = 1 : l'élément ne bouge pas
// 1 > data-parallax > 0 : l'élément va dans le sens inverse du scroll
// data-parallax = 0 : l'élément va dans le sens inverse du scroll avec la même vitesse (effet null)
// 0 > data-parallax > -1 : l'élément va dans le sens inverse du scroll avec une vitesse plus grande
// data-parallax = -1 : l'élément va dans le sens inverse du scroll avec une vitesse double
// data-parallax < -1 : l'élément va dans le sens inverse du scroll avec une vitesse plus grande