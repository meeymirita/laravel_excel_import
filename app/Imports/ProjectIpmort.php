<?php

namespace App\Imports;

use App\Factory\ProjectFactory;
use App\Models\FailedRow;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProjectIpmort implements
    ToCollection, WithValidation, SkipsOnFailure, WithStartRow
{
    private $task;

    /**
     * @param $task
     */
    public function __construct($task)
    {
        $this->task = $task;
    }


    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $typesMap = $this->getTypesMap(Type::all());
        // Пропускаем первую строку с заголовками
//        $collection->shift();
        // $row строка а элементы ячейки dd($row);
        foreach ($collection as $row) {
            if (!isset($row[1])) continue;

            $createdAt = $this->parseDate($row[2]);
            // пропускаем если дата не распарсилась
            if (!$createdAt) continue;

            $projectFactory = ProjectFactory::make($typesMap, $row, $createdAt);

            Project::updateOrCreate([
                'type_id' => $projectFactory->getValue()['type_id'],
                'title' => $projectFactory->getValue()['title'],
                'created_at_time' => $projectFactory->getValue()['created_at_time'],
                'contracted_at' => $projectFactory->getValue()['contracted_at'],
            ], $projectFactory->getValue());
        }
    }

    private function getTypesMap($typse): array
    {
        $map = [];
        foreach ($typse as $type) {
            $map[$type->title] = $type->id;
        }
        return $map;
    }

    private function parseDate($value)
    {
        if (empty($value)) {
            return null;
        }

        // Если это числовое значение Excel даты
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value);
        }

        // Если это строка с датой
        try {
            return Carbon::parse($value);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string',
            '1' => 'required|string',
            '2' => 'required|string',
            '13' => 'required|integer',
            '7' => 'nullable|integer',

            '3' => 'nullable|string',
            '4' => 'nullable|integer',
            '14' => 'nullable|integer',

            '5' => 'nullable|string',
            '6' => 'nullable|string',
            '8' => 'nullable|string',
            '9' => 'nullable|integer',
            '10' => 'nullable|integer',
            '11' => 'nullable|integer',
            '12' => 'nullable|integer',
            '15' => 'nullable|string',
            '16' => 'nullable|numeric',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        $map = [];
        foreach ($failures as $failure) {
            foreach ($failure->errors() as $error) {
                $map[] = [
                    'key' => $failure->attribute(),
                    'row' => $failure->row(),
                    'message' => $error,
                    'task_id' => 1
                ];
            }
        }
        if (count($map) > 0) FailedRow::insertFailedRows($map, $this->task);
    }
    public function customValidationMessages()
    {
        return [
            '0.required' => 'Поле "Тип" обязательно для заполнения',
            '0.string' => 'Поле "Тип" должно быть текстом',

            '1.required' => 'Поле "Наименование" обязательно для заполнения',
            '1.string' => 'Поле "Наименование" должно быть текстом',

            '2.required' => 'Поле "Дата создания" обязательно для заполнения',
            '2.date' => 'Поле "Дата создания" должно быть корректной датой',

            '13.required' => 'Поле "Подписание договора" обязательно для заполнения',
            '13.integer' => 'Поле "Подписание договора" должно быть числом',

            '7.integer' => 'Поле "Дедлайн" должно быть числом',

            '3.string' => 'Поле "Сетевик" должно быть текстом',
            '4.integer' => 'Поле "Количество участников" должно быть числом',
            '14.integer' => 'Поле "Количество услуг" должно быть числом',

            '5.string' => 'Поле "Наличие аутсорсинга" должно быть текстом',
            '6.string' => 'Поле "Наличие инвесторов" должно быть текстом',
            '8.string' => 'Поле "Сдача в срок" должно быть текстом',

            '9.integer' => 'Поле "Вложение в первый этап" должно быть числом',
            '10.integer' => 'Поле "Вложение во второй этап" должно быть числом',
            '11.integer' => 'Поле "Вложение в третий этап" должно быть числом',
            '12.integer' => 'Поле "Вложение в четвертый этап" должно быть числом',

            '15.string' => 'Поле "Комментарий" должно быть текстом',
            '16.numeric' => 'Поле "Значение эффективности" должно быть числом',
        ];
    }
    public function customValidationAttributes()
    {
        return [
            '0' => 'Тип',
            '1' => 'Наименование',
            '2' => 'Дата создания',
            '3' => 'Сетевик',
            '4' => 'Количество участников',
            '5' => 'Наличие аутсорсинга',
            '6' => 'Наличие инвесторов',
            '7' => 'Дедлайн',
            '8' => 'Сдача в срок',
            '9' => 'Вложение в первый этап',
            '10' => 'Вложение во второй этап',
            '11' => 'Вложение в третий этап',
            '12' => 'Вложение в четвертый этап',
            '13' => 'Подписание договора',
            '14' => 'Количество услуг',
            '15' => 'Комментарий',
            '16' => 'Значение эффективности',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
