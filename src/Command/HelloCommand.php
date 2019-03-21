<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:hello')
            ->setDescription('Size güzel bir hello metni verir.')
            ->setHelp('php bin/console app:hello veya a:h şeklinde çalıştırılabilir.')
            ->addArgument('name', InputArgument::REQUIRED, 'Kime selam vermemi istersin?')
            ->addArgument('surname', InputArgument::OPTIONAL, 'Hangi soyad?')
            ->addOption('age', 'age', InputOption::VALUE_OPTIONAL, 'Yaşınızı öğrenebilir miyim?', 87);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $surname = $input->getArgument('surname');
        if (!empty($surname)) {
            $name = $name. ' '. $surname;
        }
        $age = $input->getOption('age');
        $ageText = $age != '' ? 'Yaşınız:'. $age : '';
        $output->writeln('Merhaba Güzel İnsan '. $name. $ageText);
    }
}