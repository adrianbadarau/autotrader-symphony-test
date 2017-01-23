<?php

namespace CarBundle\Command;

use CarBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CarsPromotionsExpireCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cars:promotions:expire')
            ->setDescription('This will set expire to false for all cars')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $carRepository = $em->getRepository('CarBundle:Car');
        $cars = $carRepository->findAll();
        $bar = new ProgressBar($output, count($cars));
        $bar->start();
        foreach ($cars as $car){
            /**
             * @var $car Car
            **/
            $car->setPromote(false);
            $em->persist($car);

            $bar->advance();
        }
        $em->flush();
        $bar->finish();
        $output->writeln('Reset all');
    }

}
