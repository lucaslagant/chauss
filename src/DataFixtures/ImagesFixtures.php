<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    private $manager;

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $this->createImage('airForce1Hommeprofil.avif', '1');
        $this->createImage('airForce1Hommederrière.webp', '1');
        $this->createImage('airForce1Hommedessous.webp', '1');
        $this->createImage('airForce1Hommedessus.webp', '1');

        $this->createImage('reactVisionHommeprofil.webp', '2');
        $this->createImage('reactVisionHommederrière.webp', '2');
        $this->createImage('reactVisionHommedessous.webp', '2');
        $this->createImage('reactVisionHommedessus.webp', '2');

        $this->createImage('dunkLowHommeprofil.webp', '3');
        $this->createImage('dunkLowHommederrière.webp', '3');
        $this->createImage('dunkLowHommedessous.webp', '3');
        $this->createImage('dunkLowHommedessus.jpeg', '3');

        $this->createImage('stanSmithHommeprofil.avif', '4');
        $this->createImage('stanSmithHommederrière.avif', '4');
        $this->createImage('stanSmithHommedessous.avif', '4');
        $this->createImage('stanSmithHommedessus.avif', '4');

        $this->createImage('superstarHommeprofil.avif', '5');
        $this->createImage('superstarHommederrière.avif', '5');
        $this->createImage('superstarHommedessous.avif', '5');
        $this->createImage('superstarHommedessus.avif', '5');

        $this->createImage('NY90Hommeprofil.avif', '6');
        $this->createImage('NY90Hommederrière.avif', '6');
        $this->createImage('NY90Hommedessous.avif', '6');
        $this->createImage('NY90Hommedessus.avif', '6');

        $this->createImage('caProGlitchHommeprofil.webp', '7');
        $this->createImage('caProGlitchHommederrière.webp', '7');
        $this->createImage('caProGlitchHommedessous.webp', '7');
        $this->createImage('caProGlitchHommedessus.webp', '7');

        $this->createImage('raiderPlayOnHommeprofil.jpeg', '8');
        $this->createImage('raiderPlayOnHommederrière.webp', '8');
        $this->createImage('raiderPlayOnHommedessous.webp', '8');
        $this->createImage('raiderPlayOnHommedessus.webp', '8');

        $this->createImage('anzarunLiteHommeprofil.jpeg', '9');
        $this->createImage('anzarunLiteHommederrière.webp', '9');
        $this->createImage('anzarunLiteHommedessous.webp', '9');
        $this->createImage('anzarunLiteHommedessus.webp', '9');

        $this->createImage('dunkHightFemmeprofil.webp', '10');
        $this->createImage('dunkHightFemmederrière.webp', '10');
        $this->createImage('dunkHightFemmedessous.webp', '10');
        $this->createImage('dunkHightFemmedessus.webp', '10');

        $this->createImage('airMaxFuryosaFemmeprofil.webp', '11');
        $this->createImage('airMaxFuryosaFemmederrière.webp', '11');
        $this->createImage('airMaxFuryosaFemmedessous.webp', '11');
        $this->createImage('airMaxFuryosaFemmedessus.webp', '11');

        $this->createImage('blazerLowPlatformFemmeprofil.webp', '12');
        $this->createImage('blazerLowPlatformFemmederrière.webp', '12');
        $this->createImage('blazerLowPlatformFemmedessous.webp', '12');
        $this->createImage('blazerLowPlatformFemmedessus.webp', '12');

        $this->createImage('avrynFemmeprofil.avif', '13');
        $this->createImage('avrynFemmederrière.avif', '13');
        $this->createImage('avrynFemmedessous.avif', '13');
        $this->createImage('avrynFemmedessus.avif', '13');

        $this->createImage('forumMidFemmeprofil.avif', '14');
        $this->createImage('forumMidFemmederrière.avif', '14');
        $this->createImage('forumMidFemmedessous.avif', '14');
        $this->createImage('forumMidFemmedessus.avif', '14');

        $this->createImage('runfalcon3Femmeprofil.avif', '15');
        $this->createImage('runfalcon3Femmederrière.avif', '15');
        $this->createImage('runfalcon3Femmedessous.avif', '15');
        $this->createImage('runfalcon3Femmedessus.avif', '15');

        $this->createImage('rs-xEfektFemmeprofil.webp', '16');
        $this->createImage('rs-xEfektFemmederrière.webp', '16');
        $this->createImage('rs-xEfektFemmedessous.webp', '16');
        $this->createImage('rs-xEfektFemmedessus.webp', '16');

        $this->createImage('caliFemmeprofil.webp', '17');
        $this->createImage('caliFemmederrière.webp', '17');
        $this->createImage('caliFemmedessous.webp', '17');
        $this->createImage('caliFemmedessus.webp', '17');

        $this->createImage('mazeStackFemmeprofil.webp', '18');
        $this->createImage('mazeStackFemmederrière.webp', '18');
        $this->createImage('mazeStackFemmedessous.webp', '18');
        $this->createImage('mazeStackFemmedessus.webp', '18');

        $manager->flush();
    }

    public function createImage(string $name, string $prod){

        $image = new Images();
        $image->setName($name);
        $product = $this->getReference('prod-'.$prod);
        $image->setProducts($product);

        $this->manager->persist($image);
    }

    //Ici on dit que products fixtures doit être excuté avant ImagesFixtures sinon les ref produits existe pas
    public function getDependencies():array
    {
        return [
            ProductsFixtures::class
        ];
    }
}
