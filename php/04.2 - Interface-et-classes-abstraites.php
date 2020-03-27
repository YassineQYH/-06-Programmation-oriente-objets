<?php
/*  INTERFACES ET CLASSES ABSTRAITES */

// La classe abstraite ::: C'est exactement comment une interface mais qui à en plus des propriétés et d'autres méthodes qui peuvent déjà être défini, donc ne pas être abstraite.

abstract class Humain
{
    public $nom;        
    public $prenom;     
    protected $age;

    public function __construct($nom, $prenom, $age) 
    { 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }

    // Si je met une méthode public function travailler (); 
    // Et cette fonction, je ne met rien dedans car je me dit que un humain, travailler ça ne veut rien dire.
    // Un étudiant ça révise, un patron ça dirige, un employé ça travail.
    // Je ne veux pas dire dans la class humain ce qu'est que de travailler.
    // J'ai envie que chacun quand ils vont créer les classes qui hérite de l'humain, le disent eux même.
    // Donc je peux ne pas dire ce qu'elle fait.
    // Quand une fonction, n'a pas d'implémentation/ n'a pas de sens en elle même. C'est ce qu'on appel une fonction abstraite. ça ressemble à rien.

    // Par contre, je n'ai pas le droit d'avoir une class qui possède une ou plusieurs méthode abstraite sans qu'elle soit elle même déclaré abtraite.

    // Je n'ai donc plus besoin de l'interface travailler.

    // 1. Redéfinition obligatoire ::: Comme pour l'interface, la méthode abstraite doit être implémentée !


    abstract public function travailler();

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
}


// Faire hérité l'employé de humain
class Employe extends Humain
{ 

    public function travailler()
    {
        return "Je suis un employé et je travaille.";
    }
   
    function presentation()
    {
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    } 
}

/* -------------------------------------------------- */
/* -------------------------------------------------- */

class Patron extends Employe 

{ 

    public $voiture;

    public function __construct($nom, $prenom, $age, $voiture) { 
        parent::__construct($nom, $prenom, $age);

        $this->voiture = $voiture;
    }

    public function travailler()
    {
        return "Je suis le patron et je bosse aussi ! ";
    }

    public function presentation()
    {
        var_dump("Salut, je suis $this->prenom $this->nom, j'ai $this->age ans et j'ai une voiture.");
    }

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


/* -------------------------------------------------- */
// Etudiant aussi, hérite de humain.
class Etudiant extends Humain
{
    public function travailler()
    {
        return "Je suis un étudiant et je révise.";
    }
}
faireTravailler($employe1);
faireTravailler($patron);


/* -------------------------------------------------- */

// Au lieu de faire travailler qui recoit un objet qui est travailleur, je peux faire travailler n'importe quel objet qui est un humain.
// Faire travailler peut recevoir n'importe quel objet qui est un humain.
function faireTravailler(Humain $objet)
{
    var_dump("Travail en cours : {$objet->travailler()}");
}

/* $humain = new Humain("Anne", "Durand", 18); */ // Ceci n'a pas de sens // 2. Pas d'instance possible ! :: On ne peut pas créer d'objet à partir d'une classe abstraite !

