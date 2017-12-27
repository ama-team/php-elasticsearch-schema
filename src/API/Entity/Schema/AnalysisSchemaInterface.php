<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\API\Entity\Schema;

interface AnalysisSchemaInterface
{
    public function getAnalyzers(): AnalyzerSchemaInterface;
    public function getTokenizers(): TokenizerSchemaInterface;
    public function getTokenFilters(): TokenFilterSchemaInterface;
    public function getCharFilters(): CharacterFilterSchemaInterface;
}
