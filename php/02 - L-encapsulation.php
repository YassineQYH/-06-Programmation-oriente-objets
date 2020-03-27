<?php
// L'encapsulation ::: Sécurisé le code ::: Protéger la propriété age pour ne pas le changer avec quelque chose d'incohérent.

class Employe { 
    public $nom;        
    public $prenom;     
    private $age; // Modificateur "Private" ::: Spéficie qu'une propriété ne peut être touchée que depuis la classe elle-même. Empèche d'accèder/modifier à la propriété privé age. // // L'age est une propriété qui ne peut être modifier que par une fonction qui est déclaré dans ma class employé.

    // Laisser la possibilité de changer l'âge : Mettre en place des guetteurs et setteurs.
    // Accesseurs et mutateurs ::: Des portes ouvertes pour accéder malgré tout aux propriétés privée. // Pour modifier.

    public function __construct($nom, $prenom, $age) { 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge ($age); // L'age est intouchable !! Même pas dans la nouvelle déclaration d'un employé (dans la création d'un nouvel objet !)
    }

    // Fonction public qui me permet de travailler sur l'age qui lui est privé. A pour but de recevoir un age et de dire, ok mon age c'est l'age qu'on m'a envoyé.
    public function setAge($age){
        if(is_int($age) && $age >= 1 && $age <= 120){   // La fonction :: is_int de PHP permet de voir si l'age est un entier.
            $this->age = $age;
        } 
        else { // Permet d'indiqué un message d'erreur au developpeur qui reprendra le code si il veut changer l'âge par une chaine de caractère.
            throw new Exception ("L'âge d'un employé devrait être un entier entre 1 et 120 !."); // Lancer une nouvelle exception.
        }
        
    }

    public function getAge(){
        return $this->age;
    }
       
    function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    }
}

$employe1 = new Employe("Uzumaki", "Naruto", 18); // Bloqué le changement de 18 par un string ligne 15. avec setAge($age);


$employe2 = new Employe("Namikaze", "Minato",32);


/* $employe1->setAge("yo"); */ // L'âge restera 18 ans grace à la fonction is_int // Il est mieux de mettre un message d'erreur pour faire comprendre au prochain dev qui veut changer l'age pourquoi ça ne fonctionne pas. Ligne 24.
$employe1->setAge(50);

$employe1->presentation();
