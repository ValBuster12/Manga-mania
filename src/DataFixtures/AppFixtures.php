<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Electronics');
        $manager->persist($category);

        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName('Product ' . $i)
                ->setPrice(mt_rand(10, 100))
                ->setDescription('Description for product ' . $i)
                ->setStock(mt_rand(0, 50))
                ->setStatus('available')
                ->setCategory($category);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
