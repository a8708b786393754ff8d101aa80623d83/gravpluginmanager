<?php

namespace Grav\Plugin\Console;

use Grav\Console\ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class InstallCommand
 *
 * @package Grav\Plugin\Console
 */
class InstallCommand extends ConsoleCommand
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
            ->setName("Install")
            ->setDescription("Install plugins from a file")
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'Name file plugin'
            );
    }

    /**
     * @return int|null|void
     */
    protected function serve()
    {
        $input = $this->getInput();
        $io = $this->getIO();

        $filename = $input->getArgument('name'); // recupere l'argument name 

        if (file_exists($filename)) {
            $contents = file_get_contents($filename); // recupere le contenue du fichier 
            $plugins = explode(' --- ', $contents); //split le contenue du fichier pour recuperer que les nom de plugins 
            $length_plugins = count($plugins); 

            for ($i = 0; $i < $length_plugins; $i++) {
                if ($plugins[$i] !== "") {
                    system('bin/gpm install ' . $plugins[$i]); //execute la commande pour installer les plugins une par une 
                }
            }
            $io->success($length_plugins.' plugin is installed'); 

        } else { // si le fichier donne n'existe pas 
            $io->error('The file ' . $filename . ' not exists'); 
        }
    }
}
