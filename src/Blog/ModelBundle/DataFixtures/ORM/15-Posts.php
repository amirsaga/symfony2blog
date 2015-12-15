<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Post Entity
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fringilla ornare lectus, vitae
        pulvinar lorem semper eu. Morbi sed turpis non nunc varius tincidunt. Lorem ipsum dolor sit amet, consectetur
        adipiscing elit. Nullam nec rutrum felis, vitae suscipit odio. Nam non sollicitudin tortor, quis mollis lorem.
        Etiam nec risus leo. Ut vitae consequat neque, sed finibus sapien. Lorem ipsum dolor sit amet, consectetur
        adipiscing elit. Aliquam luctus mauris sed euismod viverra. Vivamus sagittis tortor erat, vitae maximus justo
        volutpat pellentesque. Vivamus interdum justo eget magna egestas, vel varius felis feugiat.

Phasellus feugiat nulla vel condimentum vehicula. Sed pulvinar tortor vel egestas condimentum. Integer gravida
porttitor orci, eget vulputate dolor rutrum sit amet. Fusce fermentum mauris lorem, nec tincidunt lorem cursus eget.
Fusce non varius lectus. Curabitur gravida arcu lectus, ac eleifend urna pulvinar sollicitudin. Integer venenatis
diam massa, in feugiat metus aliquet pretium. Nam ultrices eros a hendrerit sagittis.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Pellentesque facilisis est est');
        $p2->setBody('Pellentesque facilisis est est, ac iaculis justo rutrum et. Proin elit diam, aliquam eu
        pellentesque vitae, bibendum eu mi. Integer sapien quam, ornare vel orci sed, mollis efficitur diam. Ut sed
        nisi posuere, posuere quam varius, semper felis. In fermentum risus sem, ullamcorper bibendum enim lobortis a.
        Nulla facilisi. Fusce eu est sit amet nisl viverra malesuada.

Pellentesque tincidunt leo ante, ac porta lorem imperdiet sit amet. Donec enim urna, pharetra nec elit ut, tempus
pulvinar ipsum. Pellentesque et nulla posuere libero consequat pharetra. Proin volutpat euismod justo non condimentum.
Etiam convallis massa nec ante maximus euismod ut sit amet ipsum. Proin hendrerit lacus sit amet condimentum mattis.
Proin cursus mauris a risus iaculis, vel lacinia erat scelerisque. Mauris nec elit quis dolor suscipit ultricies.
Proin varius laoreet porttitor. Quisque lectus metus, finibus in tincidunt nec, vulputate id lorem. Sed ante nibh,
dapibus eget commodo non, congue vel quam. Nunc pharetra consequat lectus, sit amet interdum nibh ultrices ut. Aenean
maximus mollis ipsum, blandit semper ligula sagittis quis.');
        $p2->setAuthor($this->getAuthor($manager, 'Amir'));

        $p3 = new Post();
        $p3->setTitle('Suspendisse vitae iaculis nisi');
        $p3->setBody('Sed ac urna aliquam, vulputate mi nec, feugiat libero. Suspendisse potenti. Nullam imperdiet,
        tellus vestibulum efficitur gravida, est lectus fermentum arcu, et vehicula dui ex non turpis. Curabitur in
        arcu sapien. Morbi mollis euismod accumsan. Nulla dictum ipsum nec mauris congue cursus. Suspendisse mollis
        massa eget facilisis lacinia. Etiam pellentesque magna leo, ac pharetra justo vehicula et. Vestibulum ante
        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus malesuada sollicitudin libero
        in feugiat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Pellentesque consectetur nunc purus, id elementum ex finibus ac. Fusce sit amet sapien lacus. Pellentesque in justo
turpis. Donec in suscipit justo, id tempor enim. Nulla vel lacinia dui. Etiam vestibulum ante in quam fringilla tempus
in vel dolor. Donec ornare iaculis finibus. Curabitur at imperdiet diam, eget malesuada nisl.');
        $p3->setAuthor($this->getAuthor($manager, 'Amir'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return \Blog\ModelBundle\Entity\Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name,
            )
        );
    }
}