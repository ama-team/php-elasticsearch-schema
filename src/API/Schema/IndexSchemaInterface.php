<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Schema;

interface IndexSchemaInterface
{
    public function getAnalysis(): AnalysisSchemaInterface;

    /**
     * @return IndexSettingInterface[]
     */
    public function getSettings(): array;
}
