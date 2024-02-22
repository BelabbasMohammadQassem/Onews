# Trip O'dvisor :airplane:

Salut jeune développeur. Il paraît que tu as des tripes ? Alors ce projet est fait pour toi !
On a un projet assez révolutionnaire de conseils touristiques pour aider les gens à organiser leurs voyages. On y trouvera des avis, des guides, des bons plans sur les destinations les plus recherchées, les restaurants les plus fins, les hôtels les plus luxueux, etc.

Le projet est déjà bien avancé. Tu trouveras l'intégration HTML/CSS  de la page des voyages directement dans le fichier `index.html`.

Pimpant, non ?

Oui c'est beau, mais ça manque de pep's. Moi je veux que ça bouge ! Il reste plein de fonctionnalités à implémenter !

## Changer de thème

Notre intégrateur a prévu un thème sombre pour le site, mais pour l'instant rien ne fonctionne. Il m'a dit qu'en ajoutant la classe `theme-dark` sur la balise `body` le thème change.
Sauf que la demande c'était que le thème passe à sombre quand on clique sur le bouton en forme de lune en haut de la page !

Ah, et il faut aussi pouvoir changer la couleur du thème ! Il y a trois pastille de couleur en haut à droite. Quand on clique sur la pastille de couleur, le thème change de couleur. Cette fois, c'est avec les classes `theme-red`, `theme-blue` et `theme-green` que ça se passe.


## Slider

Un beau slider d'images est prévu sur la page. Il doit permettre de faire défiler des images de superbes paysages de vacances.
Actuellement, il ne fonctionne pas, mais notre intégrateur prétend que c'est facile d'ajouter des images, il suffit de suivre le guide qu'il a fait en dessous.

C'est très bien mais je ne comprends pas ce guide ! Moi ce que je veux, c'est que quand je clique sur les flèches latérales, ça passe à l'image suivante !

<details>
  <summary>Guide pour ajouter des images</summary>
  
  Pour ajouter des images dans le slider, il suffit d'ajouter des balises `img` dans la section `.slider`.
  Chaque image doit avoir la classe `slider__img` pour être bien stylée et l'image affichée doit avoir en plus la classe `slider__img--current`.
  
  
  Voici un exemple de slider avec les images générées : 
  
  ```html
   <section class="slider">
        <!-- la classe slider__img--current permet d'afficher l'image -->
        <img class="slider__img slider__img--current" src="img/ocean.jpg" alt="Partir à la plage">
        <!-- sans la classe, l'image est cachée -->
        <img class="slider__img" src="img/ski.jpg" alt="Partir à la montagne">
        <img class="slider__img" src="img/city.jpg" alt="Partir à l'étranger">
     
        <button class="btn slider__btn" type="button" aria-label="Précédent">&lt;</button>
        <button class="btn slider__btn" type="button" aria-label="Suivant">&gt;</button>
    </section>
  ```
  
  Le mieux c'est d'utiliser un tableau avec le nom de l'image pour générer les balises automatiquement avec JS 😉
  
  Exemple de tableau : 
  
  ```js
  const sliderImages = [
     'ocean.jpg',
     'ski.jpg',
     'city.jpg'
  ];
  ```
  
</details>

## Newsletter

Notre intégrateur nous a fait un super encart de newsletter. Ça attire l'oeil et ça rapporte plein d'emails, c'est super !
Par contre, je veux que cet encart n'apparaisse que si on clique sur le lien `newsletter` en haut de l'écran. Et qu'il se ferme si on clique sur la croix, c'est évident !
Après si t'as un peu de temps libre, je veux bien qu'il s'affiche aussi si on "scrolle" un peu dans la page. Par exemple, dès qu'on a scrollé 300px, hop ! Apparition inexpliquée de la newsletter !


## Messages d'erreur

### Newsletter 

Ça, ça va avec le point précédent. On ne veut que de véritables emails dans notre encart Newsletter ! 
Des petits malins s'amusent à mettre des [emails jetables](https://yopmail.com/fr/) pour ne pas recevoir nos beaux emailings. Donc il faudrait afficher un message d'erreur si l'utilisateur a inscrit une adresse jetable. 
En gros, si l'adresse email inscrite contient une des adresses données ci-dessous, alors on affiche un message d'erreur.

<details>
  <summary>Liste des domaines d'emails jetables</summary>
  
  ```js
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
  ]
  ```
</details>

### Favoris

Sur chaque destination, il y a une icône 💚. Cette dernière sert à mettre la destination dans les favoris de l'utilisateur. Mais comme on n'a pas encore de système de connexion pour l'utilisateur, elle ne fonctionnera pas.
Donc ce qu'on veut, c'est que si on clique dessus, ça affiche aussi un message d'erreur au dessus de la destination.
Un truc du genre **"Vous devez être connecté pour gérer vos favoris"** irait parfaitement.

Petit conseil entre nous, vu qu'il faut gérer des messages d'erreur à deux endroits différents, ce serait pratique d'avoir un système réutilisable 😉.

## Commentaires

En bas de la page, il y a une liste de commentaires.  Ces derniers ont un nombre d'étoiles entre 1 et 3. Ce serait bien que selon les cases cochées sous le titre **derniers commentaires**, ça affiche ou cache les commentaires liés.
Par exemple, à tout hasard, si je ne coche que **3 étoiles**, ça n'affiche que les commentaires avec 3 étoiles.
