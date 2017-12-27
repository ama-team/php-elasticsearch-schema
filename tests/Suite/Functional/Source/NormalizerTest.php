<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Test\Suite\Functional\Source;

use AmaTeam\ElasticSearch\Schema\Entity\Schema\MappingSchema;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\MappingType;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\Parameter;
use AmaTeam\ElasticSearch\Schema\Entity\Schema\Schema;
use AmaTeam\ElasticSearch\Schema\Source\Normalizer;
use Codeception\Test\Unit;
use Doctrine\Common\Annotations\AnnotationRegistry;
use PHPUnit\Framework\Assert;

class NormalizerTest extends Unit
{
    public static function setUpBeforeClass()
    {
        AnnotationRegistry::registerLoader('class_exists');
    }

    public function schemaDataProvider()
    {
        return [
            [
                [
                    'parameters' => [
                        'dynamic' => [
                            'type' => 'boolean'
                        ]
                    ]
                ],
                (new Schema())
                    ->setParameter('dynamic', (new Parameter())->setType(['boolean']))
            ],
            [
                [
                    'mapping' => [
                        'types' => [
                            'root' => [
                                'parameters' => [
                                    'dynamic' => null,
                                    'enabled' => null
                                ],
                                'title' => 'Root'
                            ]
                        ]
                    ]
                ],
                (new Schema())
                    ->setMapping(
                        (new MappingSchema())
                            ->setTypes([
                                'root' => (new MappingType())
                                    ->setTitle('Root')
                                    ->setParameter('dynamic', new Parameter())
                                    ->setParameter('enabled', new Parameter())
                            ])
                    )
            ]
        ];
    }

    /**
     * @param array $schema
     * @param Schema $expectation
     *
     * @test
     * @dataProvider schemaDataProvider
     */
    public function normalizesSchema(array $schema, Schema $expectation)
    {
        $result = (new Normalizer())->normalize($schema, Schema::class);
        Assert::assertEquals($expectation, $result);
    }
}
