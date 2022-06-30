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
                'target folder',
                InputArgument::OPTIONAL,
                'Target folder ouput'
            );
    }

    /**
     * @return int|null|void
     */
    protected function serve(): void
    {
        $input = $this->getInput();
        $io = $this->getIO();

        $import_filename = $input->getArgument('name'); //recuper le nom du fichier 
        $target_folder = $input->getArgument('target folder'); // recupere le chemin de destination

        if (!file_exists($import_filename)) {

            $plugins = getcwd() . '/user/plugins/'; //recupere le chemin complet ou est executer le script(la racine du projet) plus le chemin dossier du plugins
            $folders_plugin = array_slice(scandir($plugins), 3); // pour supprimer le fichier .gitkeep, .., .

            if (!is_null($target_folder)) { // si le dossier cible est entrez, le mode d'ouverture est d'ecriture
                $file = fopen($target_folder . $import_filename, 'w');
            } else {
                $file = fopen($import_filename, 'w');
            }

            foreach ($folders_plugin as $folder) { //boucle sur contenue du dossier 
                if (!is_file($folder)) {
                    fwrite($file, $folder . ' --- '); // ecris les plugins sur le fichier sur chaque boucle 
                }
            }
            $io->success('All plugins have been exported to the file ' . $import_filename);
        } else {
            $io->error('The file name enter exists');
        }
    }
}
