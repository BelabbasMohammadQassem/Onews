/**
 * La fonction changeTheme() permet de passer en thème sombre si on est en thème clair, et inversement
 */

let theme = {
    init: function() {
        console.log("theme : init");

        const button_lune = document.querySelectorAll("body");
  }
}
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