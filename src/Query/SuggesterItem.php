<?php declare(strict_types = 1);

namespace Spameri\ElasticQuery\Query;

class SuggesterItem implements LeafQueryInterface
{
    private $collection;

    public function __construct(
        public string $name,
        public string $text;
    )

	public function key(): string
	{
		return 'suggester_' . $this->name;
	}

    public function addTerm(SuggesterTerm $term)
    {
        $this->collection[] = $term;
    }
}
