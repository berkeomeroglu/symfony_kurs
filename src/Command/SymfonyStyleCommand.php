<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SymfonyStyleCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:symfony:style')
            ->setDescription('Size güzel bir output verir.')
            ->setHelp('php bin/console app:symfony:style veya a:s:s şeklinde çalıştırılabilir.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input,$output);

        // Title
        $io->title('Mükemmel Title');

        // Section
        $io->section('Mükemmel Section');

        // text
        $io->text('Merhaba bu içerik');

        // Text array
        $io->text([
            'Merhaba gündüz',
            'Merhaba öğlen',
            'Merhaba gece',
        ]);

        $io->listing([
            'Item 1',
            'Item 2',

        ]);

        $io->table(
           ['Name', 'Surname'],
           [
               ['Arthur', 'Abidal'],
               ['Cristiano', 'Ronalo'],
               ['Xavier', 'Marquez'],
           ]
        );

        $io->newLine(2);

        // Note
        $io->note('Türkiye benim güzel ülkem!');

        // Caution
        $io->caution('Biraz uyumanda fayda var.');

//        // progress bar
//        $io->progressStart(100);
//
//        foreach (range(0,100) as $item) {
//            $io->progressAdvance(1);
////            sleep(1);
//        }

//        $io->progressFinish();

        $color = $io->ask('Hangi rengi seversiniz');

        $io->write($color);

        $io->confirm('Tüm veritabanı silinsin mi?');

        $io->askHidden('Please set a password');

        $io->choice('What is your favorite support?', ['Football', 'Basketball', 'Tennis']);

        // Success
        $io->success('İşlem başarılı');


//        $output->writeln('Merhaba');
    }
}