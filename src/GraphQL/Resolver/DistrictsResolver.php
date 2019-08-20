<?php
namespace App\GraphQL\Resolver;

use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class DistrictsResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function resolve()
    {
        $districts = $this->em->getRepository('App:District')->findAll();
        return [
            'data' => $districts
        ];
    }

    public static function getAliases()
    {
        return [
            'resolve' => 'Districts'
        ];
    }
}