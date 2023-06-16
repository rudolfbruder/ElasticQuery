<?php

declare(strict_types=1);

namespace Spameri\ElasticQuery\Query;

class SuggesterTerm implements LeafQueryInterface
{
    private string $field;

    /**
     * @param string|int|bool|float $query
     */
    public function __construct(
        string $field
    ) {
        $this->field = $field;
    }

    public function key(): string
    {
        return 'suggester_term_' . $this->field;
    }

    public function toArray(): array
    {
        return [
            'term' => [
                'field' => $this->field,
            ],
        ];
    }
}
