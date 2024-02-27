
// dès le chargement de la page, on veut charger les images dans le slider,
// donc on appelle notre fonction !
loadSliderImages();

/**
 * Cette fonction charge les images dans le slider
 */
function loadSliderImages() {

    // un tableau pour stocker toutes les images à charger
    const sliderImages = [
        'road.jpg',
        'canyon.jpg',
        'ocean.jpg',
        'ski.jpg',
        'city.jpg'
    ];

    // 1. on sélectionne le parent / l'emplacement dans lequel on veut ajouter notre balise
    const slider = document.querySelector('.slider');

    // pour charger toutes les images dans le tableau, on va boucler sur le tableau !
    for(const image of sliderImages) {

        // on créé une nouvelle balise img avec createElement
        const img = document.createElement('img');

        // on lui ajoute la classe slider__img
        img.classList.add('slider__img');

        // on remplit son attribut src
        img.src = "img/" + image;

        // 2. on ajoute notre baliser à l'élément sélectionné !
        //slider.append(img);
        // append ajoute à la fin du parent (après tous les enfants existants)
        // si on veut ajouter au début du parent, on peut utiliser prepend !
        slider.prepend(img);
    }

    // en dernier, après avoir ajouté toutes les images, 
    // on sélectionne l'une d'entres-elles et on ajoute la classe slider__img--current
    // pour sélectionner la première image, on peut utiliser querySelector('.slider__img')
    const firstImage = document.querySelector('.slider__img');
    firstImage.classList.add('slider__img--current');

    // // on veut ajouter des balises img, pour faire ça en javascript on utilise la fonction document.createElement()
    // const img = document.createElement('img');
    // // à ce stade, on a une balise img dans la variable img.
    // // cette balise n'a pas encore été ajoutée à la page, on va le faire dans un second temps.

    // // pour ajouter une classe à notre image, on sait déjà faire : on utilise classList.add()
    // img.classList.add('slider__img');
    // img.classList.add('slider__img--current'); // pour que l'image s'affiche

    // // pour remplir l'attribut src de la balise, on utilise :
    // img.src = "img/ski.jpg";

    // // pour remplir l'attribut alt de la balise, on utilise :
    // img.alt = "Partir à la montagne";

    // // on doit maintenant ajouter cette balise dans le DOM
    // // pour ajouter un élément dans le DOM, 2 étapes :
    // // 1. on sélectionne le parent / l'emplacement dans lequel on veut ajouter notre balise
    // const slider = document.querySelector('.slider');

    // // 2. on ajoute notre baliser à l'élément sélectionné !
    // slider.append(img); // a.append(b) permet d'ajouter d'ajouter l'élément b à l'intérieur de a

}

// une variable pour stocker la position ACTUELLE dans le slider
// par défaut, première image donc position 0
let sliderPosition = 0;

// on ajoute des écouteurs d'événements sur nos deux boutons
const previousButton = document.querySelector("#previous-button");
previousButton.addEventListener("click", handlePreviousClick);

const nextButton = document.querySelector("#next-button");
nextButton.addEventListener("click", handleNextClick);

function handlePreviousClick() {
    // on a cliqué sur le bouton précédent, on passe à l'image précédente ! (sliderPosition-1)
    // SEULEMENT SI sliderPosition > 0
    if(sliderPosition > 0) {
        sliderPosition--;
    } else {
        // si on est à la première position (0), on va à la fin !
        sliderPosition = 4;
    }
    
    // on sélectionne l'image actuellement affichée
    const currentImage = document.querySelector('.slider__img--current');
    // on lui retire la classe `slider__img--current` !
    currentImage.classList.remove("slider__img--current");

    // on ajoute la classe à l'image N°sliderPosition !
    // pour ça, on récupère toutes les images avec querySelectorAll
    const images = document.querySelectorAll('.slider__img');
    // on ajoute la classe `slider__img--current` sur l'image N°sliderPosition
    images[sliderPosition].classList.add("slider__img--current");
}

function handleNextClick() {
    // on a cliqué sur le bouton suivante, on passe à l'image suivante ! (sliderPosition+1)
    // SEULEMENT SI sliderPosition < 4
    if(sliderPosition < 4) {
        sliderPosition++;
    } else {
        // si on est à la dernière position (4), on revient au début !
        sliderPosition = 0;
    }
    
    // on sélectionne l'image actuellement affichée
    const currentImage = document.querySelector('.slider__img--current');
    // on lui retire la classe `slider__img--current` !
    currentImage.classList.remove("slider__img--current");

    // on ajoute la classe à l'image N°sliderPosition !
    // pour ça, on récupère toutes les images avec querySelectorAll
    const images = document.querySelectorAll('.slider__img');
    // on ajoute la classe `slider__img--current` sur l'image N°sliderPosition
    images[sliderPosition].classList.add("slider__img--current");
}