// un objet theme
const theme = {
    
    init: function() {
        // pour debug
        console.log("theme : init");

        // on sélectionne le bouton "lune" et on ajoute un écouteur d'événement dessus
        const button = document.getElementById("theme-switch"); // ou document.querySelector("#theme-switch")
        button.addEventListener("click", theme.changeTheme);
        button.addEventListener("click", theme.changeTheme);
        const themeColor = document.querySelectorAll(".theme-button");
        themeColor.element.addEventListener("click", handleThemeColorClick);
        
        
        for(themeColorButton of themeColor ){
        themeColorButton.element.addEventListener("click", theme.handleThemeColorClick);
        console.log(themeColorButton)
        }
    },

        handleThemeColorClick: function (event){
        console.log(event.currentTarget.id);
        theme.changeColorTheme();

    
    },
    changeColorTheme: function(themeColorButton){
        if(themeColorButton === theme-green){
            console.log('vert')
        }else if(themeColorButton === theme-red){
            console.log('rouge')
        }else if (themeColorButton === theme-blue){
            console.log('blue')
        };
    },
  

    changeTheme: function() {
        // on sélectionne le body
        const body = document.querySelector('body');

        // on va conditionner l'ajout ou la suppression en fonction du thème actuel
        if(body.classList.contains('theme-dark')) {
            // la classe `theme-dark` est présente sur le body, donc on l'enlève !
            body.classList.remove('theme-dark');
        } else {
            // la classe `theme-dark` n'est pas présente, donc on l'ajoute !
            body.classList.add('theme-dark');
        }

        // ou avec .toggle()
        //body.classList.toggle('theme-dark');

    }
    }
    
};

