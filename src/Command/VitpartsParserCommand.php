<?php

namespace App\Command;

use App\Service\Parser;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'parse')]
class VitpartsParserCommand extends Command
{
    protected static $defaultName = 'parse';
    private Parser $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->parser->parseVitparts();
        return Command::SUCCESS;
    }
}