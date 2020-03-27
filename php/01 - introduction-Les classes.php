<?php

// Variable = Propriété
// fonction = méthode
// Public = modificateur
// $employe1 = new Employe(); // En francais :: La variable $employe1 contient une nouvelle instance de la class employe.

// Commençons par créer des employers.
/* ---------------------------------------------------------------------- */
/* Sans avoir créer une class */
/* ---------------------------*/

// Ceci aurait été comme ça si on aurait pas fait de class, mais du coup, pour 30 employés, il aurait fallut créer un $nom $prenom $age pour les 30 employés, ce qui aurait fait 90. C'est trop.

/* 
    $nom = "Qayouh";
    $prenom = "Yassine";
    $age = 28;

    $nom2 = "uzumaki";
    $prenom2 = "naruto";
    $age2 = 18;

    function presentation($nom, $prenom, $age){
        var_dump("Bonjour, je suis $prenom $nom et j'ai $age ans.");
    } 

    presentation($nom, $prenom, $age);
    presentation($nom2, $prenom2, $age2);
*/
/* ---------------------------------------------------------------------- */
/* ---------------------------------------------------------------------- */
/* En créant une class */
/* ------------------- */

class Employe { // La fonction presentation est le comportement.
    // La class est une representation, qu'est ce que un employé ! Tandis que l'objet que nous allonrs créer juste après est un véritable employé.
    public $nom;        // public est un modificateur.
    public $prenom;     // $nom, $prenom, $age => sont des propriétés de l'objet.
    public $age;

    // Quand je crée un véritable Employé, j'aimerais lui donner directement les valeurs de son prenom, de son nom et de son age ::: c'est la notion de ::: constructeur !!
    public function __construct($nom, $prenom, $age) {  // Elle sera appelé à chaque fois qu'on dira :: new Employe
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        /* var_dump("Bonjour, je suis construit"); */ // Ici, il dira 2x le contenu du var dump car on appel 2x new Employe pour Employe1 et Employe2.
    }
       
    function presentation(){ // (public) les fonctions n'en ont pas besoin car par défaut, elles sont public. // D'ailleurs, la function presentation s'appel une méthode et non plus une fonction car elle est à l'intérieur d'un objet.
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    } // Bonjour, je suis le prenom de ceci, le nom de ceci, l'age de ceci //this représente, l'objet dans lequel on se trouve. // ici, this représente l'employe 1. Ligne 62.
}

// L'objet est un véritable employé. Création de l'objet.// Le nouvel objet issue de la class employe // new, reprend la représentation et crée un véritable objet. // $employe1 est une instance de la class employe(la class employe est une idée) et (employe1 est une instance réel de cet employe).
$employe1 = new Employe("Uzumaki", "Naruto", 18); // En francais :: La variable $employe1 contient une nouvelle instance de la class employe.
/* Je n'ai plus besoin de ces 3 lignes grace à la function __construct ligne 44
$employe1->nom="Uzumaki";
$employe1->prenom="Naruto";
$employe1->age=18; 
*/

$employe2 = new Employe("Namikaze", "Minato",32);
/* 
$employe2->nom="Namikaze";
$employe2->prenom="Minato";
$employe2->age=32; 
*/

$employe1->presentation();//Bonjour, je suis le prenom de ceci, le nom de ceci, l'age de ceci // ici, this représente l'employe 1. Ligne 62. 
