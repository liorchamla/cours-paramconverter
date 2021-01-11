<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $post = new Post;

            $post->setTitle("Article $i")
                ->setContent($faker->paragraph(10))
                ->setSlug("article-$i");

            $manager->persist($post);
        }

        $manager->flush();
    }
}
