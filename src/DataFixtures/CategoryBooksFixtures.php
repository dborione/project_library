<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryBooksFixtures extends Fixture
{
  
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //Loop pour créer 5 catégories fixtures
        for ($i=0; $i < 5; $i++){
            $category = new Category();

            $category->setName($faker->word());
            $category->setSlug($faker->slug);
        
        
            $manager->persist($category); 

            //Loop pour créer 3 book fixtures par catégorie
            for ($j=0; $j < 3; $j++){
                $book = new Book();
        
                $book->setTitle($faker->sentence(3, false));
                $book->setAuthor($faker->name());
                $book->setDescription($faker->text());
                $book->setPublishingDate($faker->dateTime());
                $book->setFile('placeholder.jpg');
                $book->setSlug($faker->slug);
                $book->setIsBorrowed($faker->randomElement([true, false]));
                $book->setIsReserved($faker->randomElement([true, false]));
                $book->addCategory($category);
        
            $manager->persist($book); 
            }

        }

        $manager->flush();
    }

  
}
