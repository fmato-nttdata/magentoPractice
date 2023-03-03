<?php
namespace NttData\PokeGrid\Console;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;
use NttData\PokeGrid\Logger\Test;
 
class Log extends Command
{
    /**
     * @var
     */
    private $logger;
    private $logFacu;
 
    /**
     * @param LoggerInterface $logger
     * @param null $name
     */
    public function __construct(
        LoggerInterface $logger,
        Test $logFacu,
        $name = null
    ) {
        $this->logger = $logger;
        $this->logFacu = $logFacu;
        parent::__construct($name);
    }
 
    protected function configure(){
        $this->setName('pokegrid:log');
        $this->setDescription('Command to see the logs of my cron about the use of the pokeApi');
    }
 
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output){
        $this->logger->alert('Mensaje Alerta');
        $this->logger->critical('Mensaje Crítico');
        $this->logger->debug('Mensaje Debug');
        $this->logger->emergency('Mensaje Emergencia');
        $this->logger->error('Mensaje Error');
        $this->logger->info('Mensaje Info');
        $this->logger->notice('Mensaje Notice');
        $this->logger->warning('Mensaje Warning');
 
        $this->logger->log(\Psr\Log\LogLevel::INFO, 'Mensaje Log');
        $this->logFacu->info('probando mi log custom');
    }
 
}