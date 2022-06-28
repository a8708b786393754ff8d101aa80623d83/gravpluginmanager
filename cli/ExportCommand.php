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
            // ->addOption(
                // 'file',
                // 'y',
                // InputOption::VALUE_NONE,
                // 'Wheter the greetings should be yelled or quieter'
            // )
            // ->setHelp('The <info>Export</info> greets someone.')
        ;
    }

    /**
     * @return int|null|void
     */
    protected function serve()
    {
        var_dump($this); 
    }
}