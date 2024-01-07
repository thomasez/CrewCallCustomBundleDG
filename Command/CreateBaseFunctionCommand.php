<?php

namespace CustomBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use App\Entity\FunctionEntity;

class CreateBaseFunctionCommand extends Command
{
    use \App\Command\CommonCommandFunctions;

    protected static $defaultName = 'custom:create-base-functions';

    private $functions = array(
        array(
            'name' => 'Admin',
            'description' => 'Admin Functions',
        ),
        array(
            'name' => 'Organizations',
            'description' => 'Organization Functions',
        ),
        array(
            'name' => 'Contact',
            'description' => 'Contact Person',
            'parent' => 'Organizations',
        ),
        array(
            'name' => 'Employee',
            'description' => 'Employee types',
        ),
        array(
            'name' => 'Freelance',
            'description' => 'Freelance',
            'parent' => 'Employee',
        ),
        array(
            'name' => 'Part-time',
            'description' => 'Paid per job',
            'parent' => 'Employee',
        ),
        array(
            'name' => 'Fulltime',
            'description' => 'Full time employee',
            'parent' => 'Employee',
        ),
    );

    protected function configure()
    {
        $this
        ;
        $this->setDefinition(array())
            ->setDescription('Creates the first set of functions the system needs.')
                ->setHelp(<<<EOT
Creates the first set of functions the system needs.
EOT
        );
        $this->addCommonOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $this->function_repo = $em->getRepository(FunctionEntity::class);

        foreach ($this->functions as $fd) {
            $func = new FunctionEntity();
            $func->setState("VISIBLE");
            $func->setName($fd['name']);
            $func->setDescription($fd['description']);
            if (isset($fd['parent'])) {
                $parent = $this->function_repo->findOneByName($fd['parent']);
                $func->setParent($parent);
            }
            $em->persist($func);
            $em->flush();
            $em->clear();
            $output->writeln('Made ' . $fd['name']);
        }
        $output->writeln('OK Done.');
    }
}
