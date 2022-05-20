<?php

namespace Domain\Metrics\Services\Computers\Core;

use Arr;
use Validator;

class TextMetricComputerResult
{
    protected function __construct(protected array $data)
    {

    }

    public static function fromData(array $data = []): static
    {
        $data['results'] = $data['results'] ?? [];
        $data['detailed_results'] = $data['detailed_results'] ?? [];
        $data['section_results'] = $data['section_results'] ?? [];

        $validated = Validator::make($data, [
            'results' => 'array',
            'results.*' => 'required|numeric',
            'detailed_results' => 'array',
            'section_results' => 'array',
        ])->validated();

        return new static($validated);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function only(array|string $params): array
    {
        return Arr::only($this->getData(), $params);
    }

    public function except(array|string|float|int $params): array
    {
        return Arr::except($this->getData(), $params);
    }

    public function getResults(): array
    {
        return $this->data['results'];
    }

    public function getDetailedResults(): array
    {
        return $this->data['detailed_results'];
    }

    public function getSectionResults(): array
    {
        return $this->data['section_results'];
    }

    public function setResults(array $results, bool $merge = true): static
    {
        if (!$merge) {
            $this->data['results'] = $results;
        } else {
            $this->data['results'] = array_merge($this->data['results'], $results);
        }

        return $this;
    }

    public function setDetailedResults(array $results, bool $merge = true): static
    {
        if (!$merge) {
            $this->data['detailed_results'] = $results;
        } else {
            $this->data['detailed_results'] = array_merge($this->data['detailed_results'], $results);
        }

        return $this;
    }

    public function setSectionResults(array $results, bool $merge = true): static
    {
        if (!$merge) {
            $this->data['section_results'] = $results;
        } else {
            $this->data['section_results'] = array_merge($this->data['section_results'], $results);
        }

        return $this;
    }

    public function addSectionResults(string $uuid, array $results, bool $merge = true): static
    {
        $origin = $this->fetchSectionResult($uuid);

        if (!$merge) {
            $data = [$uuid => $results];
        } else {
            $data = [$uuid => array_merge(
                $origin,
                $results
            )];
        }

        return $this->setSectionResults($data);
    }

    public function fetchSectionResult(string $uuid): array
    {
        return Arr::get($this->getSectionResults(), $uuid, []);
    }

    public function merge(array|self $obj): static
    {
        $data = ($obj instanceof self) ? $obj->getData() : $obj;

        $this->setResults($data['results']);
        $this->setDetailedResults($data['detailed_results']);
        $this->setSectionResults($data['section_results']);

        return $this;
    }
}
