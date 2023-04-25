<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    //Création du counter pour la référence
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        //Création de la 1ére caté parent
        $parent = $this->createCategory('Homme', '',null, 1, $manager);

        //Appelle de la fonction pour créé nos sous caté + définition de qui ils sont enfant et de leur nom
        $this->createCategory('Nike', 'nike.png',$parent, 2, $manager);
        $this->createCategory('Adidas','adidas.png',$parent, 3, $manager);
        $this->createCategory('Puma', 'puma.png',$parent, 4, $manager);

        
        //Création de la 2éme caté parent
        $parent = $this->createCategory('Femme', '',null, 5, $manager);

        //Appelle de la fonction pour créé nos sous caté + définition de qui ils sont enfant et de leur nom
        $this->createCategory('Nike', 'nike.png',$parent, 6, $manager);
        $this->createCategory('Adidas', 'adidas.png',$parent, 7, $manager);
        $this->createCategory('Puma','puma.png', $parent, 8, $manager);

        $manager->flush();
    }
    
    //Création d'une fonction afin de créé nos sous caté
    public function createCategory(string $name, string $image ,Categories $parent = null, int $categoryOrder, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setImage($image);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $category->setCategoryOrder($categoryOrder);
        
        $manager->persist($category);

        // Création d'une référence
        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}