<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAddCommand extends Command
{
    protected static $defaultName = 'user:add';

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;

    public function __construct(
        string $name = null,
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $encoder
    ) {
        parent::__construct($name);
        $this->entityManager = $entityManager;
        $this->encoder       = $encoder;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add new user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $io->askQuestion(new Question('Set email'));
        $password = $io->askQuestion((new Question('Set password'))->setHidden(true));

        $user = new User();
        $user
            ->setEmail($email)
            ->setPassword($this->encoder->encodePassword($user, $password))
        ;

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('User was created.');

        return 0;
    }
}
