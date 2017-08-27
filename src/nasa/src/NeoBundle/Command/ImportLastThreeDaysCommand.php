<?php

namespace NeoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use NeoBundle\Entity\Neo;

class ImportLastThreeDaysCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('neo:import:lastThreeDays')
            ->setDescription('Imports last 3 days form nasa api')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>Import last 3 days from nasa api...</info>");


        $em = $this->getContainer()->get('doctrine')->getManager();

        $product = new Neo();
        $product->setName('Keyboard');
        $product->setReference(1);
        $product->setApproachAt(new \DateTime());
        $product->setSpeed(doubleval(2.04));
        $product->setIsHazardous(true);

        $em->persist($product);

        $em->flush();

    }
}
