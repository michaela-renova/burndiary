import './bootstrap';

<<<<<<< HEAD
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()


document.addEventListener("DOMContentLoaded", function () {
    const fireButton = document.getElementById("erase");
    const fireGif = document.getElementById("fire-gif");

    if (fireButton && fireGif) {
        fireButton.addEventListener("click", () => {
        
            const src = fireGif.src;
            fireGif.src = "";        
            fireGif.offsetHeight;   
            fireGif.src = src;      

            fireGif.classList.remove("hidden");

            setTimeout(() => {
                fireGif.classList.add("hidden");
            }, 2000);
        });
    }
});

    const fireButton = document.getElementById("erase-guest");
    const fireGif = document.getElementById("fire-gif-guest");

    if (fireButton && fireGif) {
        fireButton.addEventListener("click", () => {
           
            const src = fireGif.src;
            fireGif.src = "";       
            fireGif.offsetHeight;    
            fireGif.src = src;       

            fireGif.classList.remove("hidden");

            setTimeout(() => {
                fireGif.classList.add("hidden");
            }, 2000);
        });
    }
;
=======
>>>>>>> parent of 8249026 (edits)

