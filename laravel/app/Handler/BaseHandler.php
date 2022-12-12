<?php
namespace App\Handler;

use Spatie\DataTransferObject\DataTransferObject;

abstract class BaseHandler
{
    protected bool $isTransactional = true;
    protected int $numberOfAttempts = 1;
    private array $errors = ["_keys" => [], "_messages" => []];

    abstract protected function handleCommand($dto);

    /**
     * @param DataTransferObject $dto
     * @return mixed
     * @throws Throwable
     */
    final public function handle(DataTransferObject $dto) {
        if (!$this->isTransactional) {
            return $this->processResult($this->handleCommand($dto));
        }

        $self = $this;
        return \DB::transaction(function() use($self, $dto) {
            return $this->processResult($self->handleCommand($dto));
        }, $this->numberOfAttempts);
    }

    private function processResult(mixed $data): mixed
    {
        if (count($this->errors['_keys']) || count($this->errors['_messages']) > 0) {
            abort(422, 'The given data was invalid');
        }
        return $data;
    }
}
