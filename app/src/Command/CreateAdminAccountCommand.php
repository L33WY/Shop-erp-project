<?php declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateAdminAccountCommand extends Command
{
    private const ERROR_OUTPUT_FORMAT = '<fg=white;bg=red>%s</>';
    private const SUCCESS_OUTPUT_FORMAT = '<fg=white;bg=green>%s%s</>';

    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher,
        string $name = 'shop-erp:create-admin'
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->setHelp('This command allows you to create a admin user')
            ->addArgument('first-name', InputArgument::REQUIRED)
            ->addArgument('last-name', InputArgument::REQUIRED)
            ->addArgument('password', InputArgument::REQUIRED)
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $user = new User();
        $firstName = ($input->getArgument('first-name'));
        $lastName = ($input->getArgument('last-name'));
        $user->setEmail(sprintf('%s.%s@shop.erp.pl',$firstName, $lastName));
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));

        $this->userRepository->add($user, true);

        $output->writeln(sprintf(self::SUCCESS_OUTPUT_FORMAT, 'Created admin user: ', $user->getEmail()));

        return Command::SUCCESS;
    }
}