<?php

namespace App\Http\Resources\CourseWork;

use App\Enums\DocumentElementType;
use App\Models\Document;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Comment\Doc;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @mixin Media
 */
class CourseWorkDocumentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $guard = config('fortify.guard');

        if ($guard === 'web') {
            $guard = 'front';
        }

        /** @var Document $document */
        $document = Document::query()
            ->where('media_id', $this->id)
            ->first();

        $content = null;

        if ($document) {
            $content = [$document->content->toArray()];
            $this->transformContent($content);
        }

        return [
            'uuid' => $this->uuid,
            'size' => $this->size,
            'hash' => $this->custom_properties['hash'] ?? '',
            'url' => route("{$guard}.course-works.preview", [
                'course_work' => $this->model->uuid,
                'media' => $this->uuid,
            ]),
            'content' => $content,
            'section_results' => $document?->documentMetricResult?->section_results,
            'results' => $document?->documentMetricResult?->results,
            'created_at' => $this->created_at->toDayDateTimeString(),
        ];
    }

    protected function getIcon(DocumentElementType $type): ?string
    {
        return match ($type) {
            DocumentElementType::Document => 'pi pi-fw pi-book',
            DocumentElementType::Heading => 'pi pi-fw pi-bookmark',
//            DocumentElementType::Paragraph => 'pi pi-fw pi-align-left',
            DocumentElementType::Paragraph => null,
            DocumentElementType::ListItem => null,
//            DocumentElementType::ListItem => 'pi pi-fw pi-list',
        };
    }

    protected function getData(array $data)
    {
        return [
            'type' => $data['type'],
            'uuid' => $data['uuid'],
        ];
    }

    public function
    transformContent(
        array &$results
    ): void {
        foreach ($results as &$item) {
            $new = [
                'key' => $item['uuid'],
                'icon' => $this->getIcon($item['type']),
                'label' => mb_convert_encoding($item['text'] ?? '', 'UTF-8', 'UTF-8'),
                'data' => $this->getData($item),
                'selectable' => $item['type'] === DocumentElementType::Paragraph || $item['type']  ===
                    DocumentElementType::ListItem,
                'leaf' => true,
            ];

            if (!empty($item['children'])) {
                $this->transformContent($item['children']);
                $new['children'] = $item['children'];
                $new['leaf'] = false;
            }

            $item = $new;
        }
    }
}
