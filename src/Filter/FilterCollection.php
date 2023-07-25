<?php

declare(strict_types=1);

namespace Spameri\ElasticQuery\Filter;

class FilterCollection implements FilterInterface
{
    /**
     * @var \Spameri\ElasticQuery\Query\MustCollection
     */
    private $mustCollection;
    private $mustNotCollection;

    public function __construct(
        ?\Spameri\ElasticQuery\Query\MustCollection $mustCollection = null,
        ?\Spameri\ElasticQuery\Query\MustCollection $mustNotCollection = null
    ) {
        if (!$mustCollection) {
            $mustCollection = new \Spameri\ElasticQuery\Query\MustCollection();
        }

        if (!$mustNotCollection) {
            $mustNotCollection = new \Spameri\ElasticQuery\Query\MustCollection();
        }

        $this->mustCollection = $mustCollection;
        $this->mustNotCollection = $mustNotCollection;
    }

    public function must(): \Spameri\ElasticQuery\Query\MustCollection
    {
        return $this->mustCollection;
    }

    public function mustNot(): \Spameri\ElasticQuery\Query\MustCollection
    {
        return $this->mustNotCollection;
    }

    public function key(): string
    {
        return '';
    }

    public function toArray(): array
    {
        $array = [];
        /** @var \Spameri\ElasticQuery\Query\LeafQueryInterface $item */
        foreach ($this->mustCollection as $item) {
            $array['bool']['must'][] = $item->toArray();
        }
        foreach ($this->mustNotCollection as $item) {
            $array['bool']['must_not'][] = $item->toArray();
        }

        return $array;
    }
}
