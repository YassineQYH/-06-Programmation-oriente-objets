<?php
// L'encapsulation ::: Sécurisé le code ::: Protéger la propriété age pour ne pas qu'un futur dev sur ce code ne puisse le changer avec quelque chose d'incohérent.

class Employe 
{ 
    public $nom;        
    public $prenom;     
    protected $age; // L'age est une propriété qui ne peut être modifier que par une fonction qui est déclaré dans ma class employé. // Le patron n'a pas le droit de modifier l'age, car l'ge est une propriété privé de l'employé. // Donc ici, on hérite de l'age mais on hérite pas de la possibilité de le modifier.
    // 2 solutions :: 
    // Au lieu de demander l'age, on modifie :: $this->age :: pour appeler ma fonction public getAge :: {$this->getAge()}
    // Soit, on garde :: $this->age :: et on donne la possibilité aux class qui hérite de l'employer de modifier et de lire l'age sans pour autant la rendre public grace au mot clé :: protected $age;
    // Le mot clé :: protected :: c'est le fait que l'age est une propriété qui est protégé, c'est une sorte de mélange entre le public et le privé. C'est à dire qu'on est privé, on est protégé mais au moins, les class qui hérite de l'employé peuvent s'en servir. Le public par contre n'a toujours pas accès à l'age.
    // PROTECTED /// Les classes enfants peuvent lire/modifier la propriété sans qu'elle soit public.

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

    // Le patron ne veut pas la même fonction que l'employer pour dire bonjour. 
    // On peut spécialiser au sein de la class patron, la façon dont lui va se présenter. ::: On appel ça ::: Une redéfinition.
    // Dans la class patron, on va re définir la présentation pour qu'elle fasse autre chose.
    public function presentation()
    {
        /* var_dump("Salut, je suis $this->prenom $this->nom, j'ai {$this->getAge()}  ans et j'ai une voiture."); */
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



