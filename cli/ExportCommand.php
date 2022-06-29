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
    protected function configure(): void
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
            $plugins = getcwd() . '/user/plugins/';
            $folders_plugin = array_slice(scandir($plugins), 3); // pour supprimer le fichier .gitkeep, .., .

            if (is_null($ouput)) {
                $file = fopen($export_filename, 'w');
            } else {
                $file = fopen($ouput . $export_filename, 'w');
            }

            foreach ($folders_plugin as $folder) {
                if (!is_file($folder)) {
                    fwrite($file, $folder . ' --- ');
                }
            }
            $io->success('All plugins have been exported to the file ' . $export_filename);
        } else {
            $io->error('The file name enter exists');
        }
    }
}
