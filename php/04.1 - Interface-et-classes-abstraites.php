<?php
/*  INTERFACES ET CLASSES ABSTRAITES */


/* Une interface qu'est-ce qu'elle fait ? Elle défini simplement des méthodes que l'ont veut rendre obligatoire sur tout les objets qui se définissent comme des travailleurs.  */
interface Travailleur 
{
public function travailler();
}


// Si je me dit qu'il serait bien que l'employé implémente l'interface travailleur.
// ça veut dire :: ça serait bien que la classe employé signe ce contrat, dise qu'il est un travailleur.
// Pour dire ça, on va utilisé le mot clé :: implements et la on va donner le nom de l'interface qu'elle doit implementer
// Pourquoi on dit implémenté ?? L'interface elle dit, il faut une fonction travaillé. Quand on veut vraiment dire qu'est ce qu'elle va faire cette fonction travaillé alors il faut qu'on implémente la fonction/ il faut qu'on dise ce qu'elle fait.
// Donc ici, l'employé s'engage à implémenter toutes les méthodes qui sont demandé dans l'interface travailleur.
// Pour que ça fonctionne, ce que je dois faire, c'est que mon employé est quelque part une public fonction travailler()

class Employe implements travailleur
{ 
    public $nom;        
    public $prenom;     
    protected $age; 
    public function __construct($nom, $prenom, $age) 
    { 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge ($age);
    }

    // Pour que ça fonctionne, ce que je dois faire, c'est que mon employé est quelque part une public fonction travailler().
    public function travailler()
    {
        return "Je suis un employé et je travaille.";
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

    // Je redéfini la fonction travailler pour le patron.
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

// Je peux passer un employé à la fonction faireTravailler sans problème.
faireTravailler($employe1);


/* -------------------------------------------------- */
/* -------------------------------------------------- */

// On veut y recevoir n'importe quel objet et qu'il fasse un var dump du travail en cours.
// Afficher le résultat d'une méthode qui existe sur l'objet et qui s'appel travailler.
// Ce qui veut dire que quelque soit l'objet que l'ont passe à la fonction faire travailler, on veut être sur à 100% que cet objet qu'on nous à passé, qu'il ai une fonction travailler.
// Si on nous passe un objet qui n'a pas cette fonction travailller, le code va planter.
// On veut absolument que les prochain dév qui vont créer des objets et qui vont appeler cette méthode faireTravailler, Qu'ils appelent ça avec un objet qui à la méthode travailler.

// Comment faire ça ?? On peut utiliser la :: notion d'interface.
// Notion d'interface ::: C'est un contrat qu'une classe signe et qu'elle doit respecter.
// Une interface ::: c'est un contrat qu'on met en place et on dit au gens, si vous ne respectez pas ce contrat ce n'est pas la paine qu'on travail ensemble.
// On va pouvoir créer tout au haut de notre fichier, une interface.


// Je peux dire que ma fonction faireTravailler, que dans tout les cas ce qu'elle recevra ici, c'est quelque chose qui implémente l'interface travailleur. Ici, personne ne peut appelé la fonction travailler sans passé un objet qui implémente l'interface travailleur. 
// Donc je rajoute :: travailleur devant $objet.

/* faireTravailler("Salut"); */ // Ceci ne fonctionnera donc pas mais je peux passer un employé ou un patron.
faireTravailler($employe2);
faireTravailler($patron);

/* -------------------------------------------------- */
// La vrai beauté de ceci c'est que n'importe quel dev peut venir ici et créer la class dont il a besoin.
class Etudiant implements Travailleur
{
    public function travailler()
    {
        return "Je suis un étudiant et je révise.";
    }
}
$etudiant = new Etudiant();
faireTravailler($etudiant);

// ça, du point de vue de la fonction faireTravailler, c'est ce qu'on appel l'abstraction. CAD, je m'en fou de ce que vous me faite passé, tant que il à la :: fonction travailler :: , ça fonctionne.
//NOTION D'ABSTRACTION ::: On se fout de la façon dont c'est fait et de ce que ça fait, on veut juste faire 
/* ------------------- */
// ça veut dire que je suis sur que jamais, mon code de la fonction faireTravaille ne sera à l'origine d'un plantage douteux pck on m'a passé quelque chose qui n'avait pas la méthode travailler.
/* ---------------------------------- */
// C'est aussi ça qu'on appel le ::: POLYMORPHISME
//POLYMORPHISME ::: Une fonction de même nom qui ne donne pas les mêmes comportements.
/* ------------------- */
// C'est que moi, j'appel la fonction travailler sur un objet, en fonction de l'objet qu'on a passé, elle n'a rien à voir. Quand on à passé l'employé il se passe une chose, quand on à passé le patron il se passe une autre chose, quand on a passé l'étudiant, encore autre chose. Pourtant, j'appel toujours sur l'objet qu'on me passe, la fonction travailler. C'est ça qu'on peut appeler le polymorphisme.
// On à une fonction travailler qui prend différente forme, en fonction de l'objet qu'on à passé.

/* -------------------------------------------------- */


function faireTravailler(Travailleur $objet)
{
    var_dump("Travail en cours : {$objet->travailler()}");
}

