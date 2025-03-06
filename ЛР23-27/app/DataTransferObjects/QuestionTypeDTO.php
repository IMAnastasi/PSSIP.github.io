<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\QuestionTypeRequest;

class QuestionTypeDTO implements ModelDTO
{
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title,
    )
    {
    }

    /**
     * @param QuestionTypeRequest $request
     * @return QuestionTypeDTO
     */
    public static function appRequest(QuestionTypeRequest $request): QuestionTypeDTO
    {
        return new QuestionTypeDTO(
            $request['title'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
