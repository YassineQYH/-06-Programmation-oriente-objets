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
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans.");
    }
}

/* -------------------------------------------------- */
/* -------------------------------------------------- */

// J'ai envie maintenant de représenter un Patron, c'est la même chose qu'un employé mais avec une propriété de plus qui est la voiture et il va avoir une méthode de plus qui est de conduire.
// Je peux donc reprendre ma class employé, la copier et la coller en allant modifier son nom pour l'appeler patron. Lui ajouter une propriété public qui est voiture. Sur son constructeur, je vais ajouter la possibilité de passer la voiture. 

class Patron { 
    public $nom;        
    public $prenom;     
    private $age; 
    public $voiture;

    public function __construct($nom, $prenom, $age, $voiture) { 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge ($age); 
        $this->voiture = $voiture;
    }

    public function setAge($age){
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



