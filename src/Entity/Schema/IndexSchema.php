<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\AnalysisSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\IndexSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\IndexSettingInterface;
use JMS\Serializer\Annotation as Serializer;

class IndexSchema implements IndexSchemaInterface
{
    use ParametrizedTrait;

    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\AnalysisSchema")
     *
     * @var AnalysisSchemaInterface
     */
    private $analysis;
    /**
     * @Serializer\Type("array<string, AmaTeam\ElasticSearch\Schema\Entity\Schema\IndexSetting>")
     *
     * @var IndexSettingInterface[]
     */
    private $settings = [];

    /**
     * @param AnalysisSchemaInterface $analysis
     * @param IndexSettingInterface[] $settings
     */
    public function __construct(
        AnalysisSchemaInterface $analysis = null,
        array $settings = []
    ) {
        $this->analysis = $analysis ?? new AnalysisSchema();
        $this->settings = $settings;
    }


    /**
     * @return AnalysisSchemaInterface
     */
    public function getAnalysis(): AnalysisSchemaInterface
    {
        return $this->analysis;
    }

    /**
     * @param AnalysisSchemaInterface $analysis
     * @return $this
     */
    public function setAnalysis(AnalysisSchemaInterface $analysis)
    {
        $this->analysis = $analysis;
        return $this;
    }

    /**
     * @return IndexSettingInterface[]
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @param IndexSettingInterface[] $settings
     * @return $this
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
