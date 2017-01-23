<?php

namespace CarBundle\Command;

use CarBundle\Entity\Car;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CarsPromotionsExpireCommand extends Command
{
    /**
     * @var $entityManager EntityManager
    **/
    protected $entityManager;

    /**
     * CarsPromotionsExpireCommand constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }


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

        $carRepository = $this->entityManager->getRepository('CarBundle:Car');
        $cars = $carRepository->findAll();
        $bar = new ProgressBar($output, count($cars));
        $bar->start();
        foreach ($cars as $car){
            $car->setPromote(false);
            $this->entityManager->persist($car);

            $bar->advance();
        }
        $this->entityManager->flush();
        $bar->finish();
        $output->writeln('Reset all');
    }

}
