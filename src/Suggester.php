<?php

declare(strict_types=1);

namespace Spameri\ElasticQuery;

class Suggester implements \Spameri\ElasticQuery\Entity\ArrayInterface
{
    public function __construct(
        private ?\Spameri\ElasticQuery\Query\SuggesterCollection $query = null
    ) {
        if ($query === null) {
            $query = new \Spameri\ElasticQuery\Query\SuggesterCollection();
        }
    }

    public function toArray(): array
    {
        return [
            'suggest' => $this->query->toArray()
        ];
    }
}
