<?php

namespace Grav\Plugin\Console;

use Grav\Console\ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ExportCommand
 *
 * @package Grav\Plugin\Console
 */
class ExportCommand extends ConsoleCommand
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * Greets a person with or without yelling
     */
    protected function configure()
    {
        $this
            ->setName("Export")
            ->setDescription("Export in file JSON all plugin installed ")
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Name file input'
            )
            ->addArgument(
                'output directory',
                InputArgument::OPTIONAL,
                'Name file input'
            );
    }

    /**
     * @return int|null|void
     */
    protected function serve()
    {
        $input = $this->getInput();
        $io = $this->getIO();

        $export_filename = $input->getArgument('name');
        $ouput = $input->getArgument('output directory');

        if (!file_exists($export_filename)) {
            var_dump($ouput);
        } else {
            $io->error('The file name enter exists');
        }

        //NOTE ajouter le reperoire d'enregistrement si c'est pas NULL 


    }
}
