<?php
// L'encapsulation ::: Sécurisé le code ::: Protéger la propriété age pour ne pas qu'un futur dev sur ce code ne puisse le changer avec quelque chose d'incohérent.

class Employe 
{ 
    public $nom;        
    public $prenom;     
    private $age; 

    public function __construct($nom, $prenom, $age) 
    { 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge ($age);
    }

   
    public function setAge($age)
    {
        if(is_int($age) && $age >= 1 && $age <= 120)
        {  
            $this->age = $age;
        } 
        else 
        { 
            throw new Exception ("L'âge d'un employé devrait être un entier entre 1 et 120 !."); 
        }
        
    }

    public function getAge()
    {
        return $this->age;
    }
       
    function presentation()
    {
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    } // Je veux dire salut au lieu de bonjour car c'est une entreprise ouverte.
    // Je peux changer la fonction présentation uniquement dans la class employé, et ça changera aussi pour ce qui hérite de cette class.
}

/* -------------------------------------------------- */
/* -------------------------------------------------- */

// J'ai envie maintenant de représenter un Patron, c'est la même chose qu'un employé mais avec une propriété de plus qui est la voiture et il va avoir une méthode de plus qui est de conduire.


// ATTENTION !!! Copier tel quel comme le fichier précédent est très mauvais !!
// Principe du DRY ::: Don't repeat yourself !! On a répété plusieurs fois les propriété nom prénom age, une bonne partie de la fonction construction, getAge get age et présentation. Juste pour rajouter une notion de voiture et une méthode rouler !!

// C'est la que l'héritage intervient ! Je peux utiliser l'héritage de class
// Le but c'est qu'on a la possibilité de créer une class qui va hériter de la class employé. 
// ( donc tout ce qui contient la class employé va être hérité, c'est à dire les données et les comportements vont être copier par PHP lui même.)


class Patron extends Employe // Le patron hérite de l'employé ::: Je n'ai donc pas besoin de répété tout le code que je met en commentaire juste en dessous.
// On appel une class qui hérite, (la fille) et la class dont ont hérite (le parent)
// Donc la, la class patron est fille de la class employé.
{ 
/*     public $nom;        
    public $prenom;     
    private $age;  */
    public $voiture;

    public function __construct($nom, $prenom, $age, $voiture) { 
        // Pour ne pas répéter ce qui fait parti du constructeur de la class parent, je peux appeler le constructeur de la class employé 
        parent::__construct($nom, $prenom, $age);
/*         $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge ($age);  */
        $this->voiture = $voiture;
    }

    /* public function setAge($age){
        if(is_int($age) && $age >= 1 && $age <= 120){  
            $this->age = $age;
        } 
        else {
            throw new Exception ("L'âge d'un employé devrait être un entier entre 1 et 120 !.");
        }
        
    }

    public function getAge()
    {
        return $this->age;
    }
       
    function presentation()
    {
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    } */
    public function rouler()
    {
        var_dump("Bonjour, je roule avec ma $this->voiture !");
    }
}

/* -------------------------------------------------- */
/* -------------------------------------------------- */

$employe1 = new Employe("Uzumaki", "Naruto", 18); 

$employe2 = new Employe("Namikaze", "Minato",32);

$employe1->setAge(50);

$employe1->presentation();

$patron = new Patron("Hatake", "Kakashi", 38, "Mercedes");
$patron->presentation();
$patron->rouler();



