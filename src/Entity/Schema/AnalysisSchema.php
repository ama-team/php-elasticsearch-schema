<?php

declare(strict_types=1);

namespace AmaTeam\ElasticSearch\Schema\Entity\Schema;

use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\AnalysisSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\AnalyzerSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\CharacterFilterSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenFilterSchemaInterface;
use AmaTeam\ElasticSearch\Schema\API\Entity\Schema\TokenizerSchemaInterface;
use JMS\Serializer\Annotation as Serializer;

class AnalysisSchema implements AnalysisSchemaInterface
{
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\AnalyzerSchema")
     *
     * @var AnalyzerSchemaInterface
     */
    private $analyzers;
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\TokenizerSchema")
     *
     * @var TokenizerSchemaInterface
     */
    private $tokenizers;
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\TokenFilterSchema")
     * @Serializer\SerializedName("token_filters")
     *
     * @var TokenFilterSchemaInterface
     */
    private $tokenFilters;
    /**
     * @Serializer\Type("AmaTeam\ElasticSearch\Schema\Entity\Schema\CharacterFilterSchema")
     * @Serializer\SerializedName("char_filters")
     *
     * @var CharacterFilterSchemaInterface
     */
    private $charFilters;

    /**
     * @param AnalyzerSchemaInterface $analyzers
     * @param TokenizerSchemaInterface $tokenizers
     * @param TokenFilterSchemaInterface $tokenFilters
     * @param CharacterFilterSchemaInterface $characterFilters
     */
    public function __construct(
        AnalyzerSchemaInterface $analyzers = null,
        TokenizerSchemaInterface $tokenizers = null,
        TokenFilterSchemaInterface $tokenFilters = null,
        CharacterFilterSchemaInterface $characterFilters = null
    ) {
        $this->analyzers = $analyzers ?? new AnalyzerSchema();
        $this->tokenizers = $tokenizers ?? new TokenizerSchema();
        $this->tokenFilters = $tokenFilters ?? new TokenFilterSchema();
        $this->charFilters = $characterFilters ?? new CharacterFilterSchema();
    }

    /**
     * @return AnalyzerSchemaInterface
     */
    public function getAnalyzers(): AnalyzerSchemaInterface
    {
        return $this->analyzers;
    }

    /**
     * @param AnalyzerSchemaInterface $analyzers
     * @return $this
     */
    public function setAnalyzers(AnalyzerSchemaInterface $analyzers)
    {
        $this->analyzers = $analyzers;
        return $this;
    }

    /**
     * @return TokenizerSchemaInterface
     */
    public function getTokenizers(): TokenizerSchemaInterface
    {
        return $this->tokenizers;
    }

    /**
     * @param TokenizerSchemaInterface $tokenizers
     * @return $this
     */
    public function setTokenizers(TokenizerSchemaInterface $tokenizers)
    {
        $this->tokenizers = $tokenizers;
        return $this;
    }

    /**
     * @return TokenFilterSchemaInterface
     */
    public function getTokenFilters(): TokenFilterSchemaInterface
    {
        return $this->tokenFilters;
    }

    /**
     * @param TokenFilterSchemaInterface $tokenFilters
     * @return $this
     */
    public function setTokenFilters(TokenFilterSchemaInterface $tokenFilters)
    {
        $this->tokenFilters = $tokenFilters;
        return $this;
    }

    /**
     * @return CharacterFilterSchemaInterface
     */
    public function getCharFilters(): CharacterFilterSchemaInterface
    {
        return $this->charFilters;
    }

    /**
     * @param CharacterFilterSchemaInterface $charFilters
     * @return $this
     */
    public function setCharFilters(CharacterFilterSchemaInterface $charFilters)
    {
        $this->charFilters = $charFilters;
        return $this;
    }
}
