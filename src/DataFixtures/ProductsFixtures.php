<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductsFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $this->createProduct('Air Force 1', 'sneakers blanches en cuir véritable, coupe courte et une semmelle extérieure en caoutchouc pour plus de durabilité' , '135.00' , '3', $manager);
        $this->createProduct('React Vision', 'Avec leur douce languette, leur mousse Nike React et d\un renfort en caoutchouc sur la semelle . Leur empeigne s\'orne d\'un mesh transparent au design moderne' , '145.00' , '2', $manager);
        $this->createProduct('Dunk Low', 'Sa conception en matières recyclées est un gage écoresponsable et de haute qualité. Cette paire déjà iconique vous accompagnera à chaque occasion.' , '130.00' , '5', $manager);

        $manager->flush();
    }
    public function createProduct(string $name, string $description, string $price, string $stock, ObjectManager $manager)
    {
        $product = new Products();
        $product->setName($name);
        $product->setDescription($description);
        $product->setSlug($this->slugger->slug($product->getName())->lower());
        $product->setPrice($price);
        $product->setStock($stock);

        //On va chercher une référence de catégorie
        $category = $this->getReference('cat-'.'2');
        $product->setCategories($category);


        $manager->persist($product);
    }
}