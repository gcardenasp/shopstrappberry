<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Product;
use ShopBundle\Entity\ShoppingCart;

class ShoppingFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $basket = new ShoppingCart();

        $product1 = new Product();
        $product1->setName('Product A');
        $product1->setDescription('This is an excellent product');
        $product1->setAdditionDate(new \DateTime('-1 days ago'));
        $product1->setPrice(100);

        $product2 = new Product();
        $product2->setName('Product B');
        $product2->setDescription('This is an excellent product');
        $product2->setPrice(80);
        $product2->setAdditionDate(new \DateTime('2 hours ago'));

        $basket->addProduct($product1);

        foreach ([$product1, $product2, $basket] as $entity) {
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
