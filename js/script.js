// pour debug :
console.log("script.js chargé !");

// dès le chargement de la page, on veut charger les images dans le slider,
// donc on appelle notre fonction !
loadSliderImages();


/**
 * La fonction changeTheme() permet de passer en thème sombre si on est en thème clair, et inversement
 */
function changeTheme() {
    // En JS, quand on veut manipuler le DOM, ça se passe en 2 étapes !
    // 1ère étape : on sélectionne / on récupère l'élément du DOM qu'on veut manipuler
    // (pour ça, on utilise l'une des fonctions de sélection : getElementById, getElementsByClassName, querySelector, querySelectorAll, etc.)
    // vu que le body n'a pas d'ID ou de classe, le plus simple c'est d'utiliser le sélecteur CSS `body` (avec querySelector)
    const body = document.querySelector('body');

    // on va conditionner l'ajout ou la suppression en fonction du thème actuel
    if(body.classList.contains('theme-dark')) {
        // la classe `theme-dark` est présente sur le body, donc on l'enlève !
        body.classList.remove('theme-dark');
    } else {
        // la classe `theme-dark` n'est pas présente, donc on l'ajoute !
        body.classList.add('theme-dark');
    }

    // // 2ème étape : on effectue la manipulation souhaitée
    // // ici, on veut ajouter la classe `theme-dark` au body
    // // (pour manipuler les classes d'un élément du DOM, on utilise .classList, .classList.add(), .classList.remove())
    // body.classList.add('theme-dark');

    // on pourrait se simplifier la vie en utilisant classList.toggle()
    // toggle permet de basculer : si la classe est présente elle sera supprimée, si elle est absente elle sera ajoutée !
    //body.classList.toggle('theme-dark');
}

// on appelle notre fonction
// (c'était juste pour tester, après on va lier ça au bouton !)
//changeTheme();

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





// autre exemple : ajout d'un paragraphe dans l'encart de newsletter

// const p = document.createElement('p');

// p.textContent = "mon super paragraphe créé depuis JS !";

// // 1. on sélectionne la newsletter
// const newsletter = document.querySelector('.newsletter');
// // 2. on ajoute le p à la newsletter
// newsletter.append(p);

const button_new = document.querySelector('#button_newsletter');

button_new.addEventListener("click", handleClick);


// handleClick = la fonction qui gère le click sur notre bouton !

function handleClick(event){
    
    const newsle = document.querySelector('.newsletter');
    newsle.classList.add("newsletter--on");

    //ça va permettre de bloquer le rafraichement par defaut de la page
    //j'ai donc instauré un parametre event
    event.preventDefault();

}



const closeAsideNews = document.querySelector('.newsletter__close');

closeAsideNews.addEventListener("click", handleClick);

function handleClick(event) {
    event.preventDefault();
    
    const closeNews = document.querySelector('.newsletter');
    closeNews.classList.toggle("newsletter--on");

    
    
}

const forbiddenDomains = [
    '@yopmail.com',
    '@yopmail.fr',
    '@yopmail.net',
    '@cool.fr.nf',
    '@jetable.fr.nf',
    '@courriel.fr.nf',
    '@moncourrier.fr.nf',
    '@monemail.fr.nf',
    '@monmail.fr.nf',
    '@hide.biz.st',
    '@mymail.infos.st',
];

/*if(forbiddenDomains == false){
    console.log("afficher l'email")
}else{ 
    console.log("ne pas afficher l'email")

}*/

//document.getElementsByTagName('form')[0].addEventListener('submit', function(evt) {
   // evt.preventDefault(); // empêche le rechargement automatique de la page
// le code peut s'exécuter maintenant...
  //});
  
  const form = document.querySelector('#newsletter_form');

  // on ajoute ensuite un écouteur d'évènement SUR CE FORMULAIRE

  form.addEventListener("submit", handleSubmit);
  
  // notre fonction handler/de callback
  function handleSubmit(event) {
  event.preventDefault();
  
    console.log("formulaire envoyé !");
    //permet d'afficher le contenu dans la console
    const input = document.querySelector('.newsletter__field');
    let value = input.value;
    console.log(value);
  }