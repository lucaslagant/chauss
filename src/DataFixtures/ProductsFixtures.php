<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductsFixtures extends Fixture
{
    private $manager;
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $this->createProduct('Air Force One', 'sneakers blanches en cuir véritable, coupe courte et une semmelle extérieure en caoutchouc pour plus de durabilité' , '135.00' , '3', '2');
        $this->createProduct('React Vision', 'Avec leur douce languette, leur mousse Nike React et d\'un renfort en caoutchouc sur la semelle . Leur empeigne s\'orne d\'un mesh transparent au design moderne' , '145.00' , '2', '2');
        $this->createProduct('Dunk Low', 'Sa conception en matières recyclées est un gage écoresponsable et de haute qualité. Cette paire déjà iconique vous accompagnera à chaque occasion.' , '130.00' , '5', '2');


        $this->createProduct('Stan Smith', 'Les Stan Smith ont une empeigne blanches lisse est surmontée par un renfort en cuir suédé.' , '110.00' , '1', '3');
        $this->createProduct('Superstar', 'Entièrement blanches, ces baskets s\'orment sur le coté des trois bandes noires emblématiques et aussi du logo imprimé en doré sur le haut de la languette en cuir enduit' , '120.00' , '8', '3');
        $this->createProduct('NY 90', 'Les NY 90 présentent une empeigne lisse habillée d’empiècements, de surpiqûres et de détails perforés. ' , '100.00' , '9', '3');

        $this->createProduct('CA Pro Glitch', 'Le point fort de cette paire de sneakers Puma Ca Pro Glitch réside dans sa teinte blanche unie, subtilement rehaussée par des notes de gris, et par le logo signature de la marque sur le côté de la sneaker. Sa coupe courte s’accordera avec toute votre garde-robe.' , '105.00' , '4', '4');
        $this->createProduct('Rider Play On', 'Les Rider Play On présentent une structure basse indémodable. L’empeigne noire est surmontée d’un renfort gris sur le talon et se décore de lignes colorées profilées sur le quartier. Craquez pour le clip rouge sur le bas de la tige et le détail moucheté de la semelle.' , '95.00' , '9', '4');
        $this->createProduct('Anzarun Lite', 'La Anzarun Lite est notre basket jusqu\'à présent la plus raffinée avec un style frais pour chaque occasion. Équipée d\'une matière supérieure en filet à ADN Anzarun aéré, d\'une semelle intérieure confortable SoftFoam+ et d\'une marque PUMA réduite, cette chaussure brille dans chaque situation.' , '60.00' , '1', '4');

        $this->createProduct('Dunk Hight Aluminium', 'Chaussure haute Nike' , '140.00' , '4', '6');
        $this->createProduct('Air Max Furyosa', 'Air max de couleur crème' , '160.00' , '3', '6');
        $this->createProduct('Blazer Low Platform', 'Sneakers toutes blanches avec une languette doré.' , '100.00' , '1', '6');

        $this->createProduct('Avryn', 'Découvre les technologies Boost et Bounce de l\'AVRYN pour un nouveau combo de confort et de polyvalence. Le meilleur des chaussures de sport, désormais dans une chaussure lifestyle pour tous. Les options de style sont illimitées.' , '140.00' , '4', '7');
        $this->createProduct('Forum Mid', 'Disponibles dans un coloris blanc avec des accents kaki, elles ont une tige en cuir enduit pour une usure de qualité supérieure. Ils sont dotés d\'une fermeture à lacets avec une sangle auto-agrippante amovible pour un ajustement verrouillé tandis que le col de cheville rembourré vous maintient bien au chaud. Sous le pied se trouve une semelle intercalaire spongieuse pour un amorti tout au long de la journée et une semelle extérieure en caoutchouc pour vous garder accroché à la rue. Avec des perforations à la pointe pour la respirabilité, elles sont signées avec les 3 bandes sur les parois latérales.' , '120.00' , '9', '7');
        $this->createProduct('Runfalcon 3', 'Conçues pour bouger, ces baskets Runfalcon pour femmes d\'adidas vous gardent à l\'aise de courte à longue distance. Dans un triple coloris noir, ces chaussures de course ont une tige textile et synthétique durable qui utilise au moins 50 % de contenu recyclé. Elles sont dotées d\'une fermeture à lacets ton sur ton pour vous enfermer et sont assises sur une semelle intercalaire Cloudfoam moelleuse pour un confort amorti léger. Avec une bande de roulement en caoutchouc adhérente, ces baskets sont finies avec la marque adidas signature et 3 bandes sur les flancs. ' , '66.00' , '1', '7');
        
        $this->createProduct('RS-X Efekt', 'Sortez avec style avec ces baskets RS-X Efekt pour femmes de PUMA. Dans un coloris blanc, ces gros coups de pied ont une tige en mesh respirant et synthétique, qui comprend au moins 20 % de matériaux recyclés. Ils sont dotés d\'une fermeture à lacets classique pour vous enfermer, d\'un col de cheville rembourré pour un soutien accru et de tirettes sur la languette et le talon pour un accès facile. Sous le pied, la semelle intercalaire en mousse futuriste amortit votre pas, tandis que la semelle extérieure en caoutchouc offre une traction adhérente à tout moment. Fini avec les logos emblématiques PUMA Cat et le légendaire Formstrip sur les flancs.' , '120.00' , '4', '8');
        $this->createProduct('Cali', 'Enfilez un style prêt pour l\'été avec ces baskets Cali pour femmes de PUMA. Dans un coloris blanc frais avec des accents olive, ces baskets basses ont une tige en cuir et synthétique pour un confort premium. Elles sont dotées d\'une fermeture à lacets ton sur ton pour un ajustement parfait et reposent sur une semelle intermédiaire épaisse qui maintient vos pieds amortis. Avec une semelle extérieure adhérente pour la traction dans les rues, ces baskets sont finies avec la légendaire marque Formstrip et PUMA sur les flancs.' , '90.00' , '9', '8');
        $this->createProduct('Mayze Stack', 'Prend de la hauteur avec ces baskets Mayze Stack pour femmes de PUMA.' , '120.00' , '1', '8');
        
        
        $manager->flush();
    }
    public function createProduct(string $name, string $description, string $price, string $stock, string $cat)
    {
        $product = new Products();
        $product->setName($name);
        $product->setDescription($description);
        $product->setSlug($this->slugger->slug($product->getName())->lower());
        $product->setPrice($price);
        $product->setStock($stock);

        //On va chercher une référence de catégorie
        $category = $this->getReference('cat-'.$cat);
        $product->setCategories($category);

        $this->addReference('prod-'.$this->counter, $product);
        $this->counter++;



        $this->manager->persist($product);
    }
}