<?php

namespace Solarium\QueryType\Graph;

use Solarium\Core\Client\Client;
use Solarium\Core\Query\AbstractQuery;
use Solarium\Core\Query\RequestBuilderInterface;
use Solarium\Core\Query\ResponseParserInterface;
use Solarium\QueryType\Stream\RequestBuilder;

/**
 * Graph query.
 */
class Query extends AbstractQuery
{
    /**
     * Default options.
     *
     * @var array
     */
    protected $options = [
        'handler' => 'graph',
        'resultclass' => Result::class,
    ];

    /**
     * Get type for this query.
     *
     * @return string
     */
    public function getType(): string
    {
        return Client::QUERY_GRAPH;
    }

    /**
     * Get a requestbuilder for this query.
     *
     * @return RequestBuilder
     */
    public function getRequestBuilder(): RequestBuilderInterface
    {
        return new RequestBuilder();
    }

    /**
     * No response parser required since we pass through GraphML.
     */
    public function getResponseParser(): ResponseParserInterface
    {
    }

    /**
     * Set the expression.
     *
     * @param string $expr
     *
     * @return self Provides fluent interface
     */
    public function setExpression(string $expr): self
    {
        $this->setOption('expr', $expr);
        return $this;
    }

    /**
     * Get the expression.
     *
     * @return string|null
     */
    public function getExpression(): ?string
    {
        return $this->getOption('expr');
    }
}
