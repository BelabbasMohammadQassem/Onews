// app.js : le fichier "principal", la porte d'entrée de notre appli JS

const app = {

    /**
     * Initialisation de l'application
     */
    init: function() {
        console.log("theme : init");

        // ici, on initialise tous les autres modules (qui nécessitent de l'être) de notre application !
        destinations.init();
        newsletter.init();
        theme.init();
        slider.init();
            // TODO : initialiser les autres modules ! (par exemple, le theme !)
    }
}

// pour que la méthode init de notre objet app soit appelée à la fin du chargement de la page,
// on ajoute un écouteur d'événement sur le document, pour surveiller l'event `DOMContentLoaded` !
document.addEventListener("DOMContentLoaded", app.init);