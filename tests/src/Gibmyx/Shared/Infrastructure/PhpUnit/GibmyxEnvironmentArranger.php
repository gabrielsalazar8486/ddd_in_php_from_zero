<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class GibmyxEnvironmentArranger
{

    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {

    }
}