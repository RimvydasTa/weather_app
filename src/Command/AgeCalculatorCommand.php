<?php

namespace App\Command;

use App\AgeCalculator\AgeCalculatorManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


class AgeCalculatorCommand extends Command
{
    /**
     * @var AgeCalculatorManager
     */
    private $ageManager;
    /**
     * @var
     */
    private $age;

    /**
     * @var string
     */
    protected static $commandName = 'app:age:calculator';
    /**
     * @var string
     */
    protected static $birthDateArgument = 'birthDate';
    /**
     * @var string
     */
    protected static $isAdultOption = 'adult';

    /**
     * AgeCalculatorCommand constructor.
     * @param $ageManager
     */
    public function __construct(AgeCalculatorManager $ageManager)
    {
        parent::__construct();
        $this->ageManager = $ageManager;
    }


    protected function configure()
    {
        $this
            ->setName(self::$commandName)
            ->setDescription('Calculates the age by given birth date and checks if person is adult')
            ->addArgument(self::$birthDateArgument, InputArgument::OPTIONAL, 'Person birth date')
            ->addOption(self::$isAdultOption, null, InputOption::VALUE_NONE, 'This options lets you check if person is adult')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $this->age = $this->ageManager->calculateAge($input->getArgument(self::$birthDateArgument));
        $io->note(sprintf('I am %s years old',  $this->age));

        $checkAdult = $this->ageManager->adultChecker($input->getOption(self::$isAdultOption),$this->age);

        if ($checkAdult === true){
            $io->success('Am I and adult?   ----   YES!');
        }else {
            $io->warning('Am I and adult?   ----   NO!');
        }

    }
}
