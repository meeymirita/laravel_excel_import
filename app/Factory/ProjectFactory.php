<?php

namespace App\Factory;

use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProjectFactory
{
    private $typeId;
    private $title;
    private $createdAtTime;
    private $deadline;
    private $contractedAt;
    private $isChain;
    private $isOnTime;
    private $hasOutsource;
    private $hasInvestors;
    private $workerCount;
    private $serviceCount;
    private $paymentFirstStep;
    private $paymentSecondStep;
    private $paymentThirdStep;
    private $paymentForthStep;
    private $comment;
    private $effectiveValue;

    public function __construct(
        $typeId,
        $title,
        $createdAtTime,
        $deadline,
        $contractedAt,
        $isChain,
        $isOnTime,
        $hasOutsource,
        $hasInvestors,
        $workerCount,
        $serviceCount,
        $paymentFirstStep,
        $paymentSecondStep,
        $paymentThirdStep,
        $paymentForthStep,
        $comment,
        $effectiveValue
    )
    {
        $this->typeId = $typeId;
        $this->title = $title;
        $this->createdAtTime = $createdAtTime;
        $this->deadline = $deadline;
        $this->contractedAt = $contractedAt;
        $this->isChain = $isChain;
        $this->isOnTime = $isOnTime;
        $this->hasOutsource = $hasOutsource;
        $this->hasInvestors = $hasInvestors;
        $this->workerCount = $workerCount;
        $this->serviceCount = $serviceCount;
        $this->paymentFirstStep = $paymentFirstStep;
        $this->paymentSecondStep = $paymentSecondStep;
        $this->paymentThirdStep = $paymentThirdStep;
        $this->paymentForthStep = $paymentForthStep;
        $this->comment = $comment;
        $this->effectiveValue = $effectiveValue;
    }

    public static function make($map, $row, $createdAt)
    {
        return new self(
            self::getTypeId($map, $row[0]), // Тип
            $row[1] ?? null, // Наименование
            $createdAt, // Дата создания
            isset($row[7]) ? self::parseDate($row[7]) : null, // Дедлайн
            self::parseDate($row[13]),  // "Подписание договора"
            isset($row[3]) ? self::getBool($row[3]) : null,        // "Сетевик" - boolean
            isset($row[8]) ? self::getBool($row[8]) : null,      // "Сдача в срок" - boolean
            isset($row[5]) ? self::getBool($row[5]) : null,   // "Наличие аутсорсинга" - boolean
            isset($row[6]) ? self::getBool($row[6]) : null,   // "Наличие инвесторов" - boolean
            $row[4] ?? null,    // "Количество участников"
            $row[14] ?? null,  // "Количество услуг"
            $row[9] ?? null, // Вложение в первый этап
            $row[10] ?? null, // Вложение в второй этап
            $row[11] ?? null, // Вложение в третий этап
            $row[12] ?? null, // Вложение в четвертый этап
            $row[15] ?? null, // Комментарий
            $row[16] ?? null, // Значение эффективности


        );
    }

    private static function getTypeId($map, $title)
    {
        return isset($map[$title])
            ? $map[$title]
            : Type::create(['title' => $title])->id;
    }
    private static function getBool($item) : bool
    {
        return $item == 'Да';
    }

    private static function parseDate($value)
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

    public function getValue() : array
    {
        $props = get_object_vars($this);
        $res = [];
        foreach ($props as $key => $prop) {
            $res[Str::snake($key)] = $prop;
        }
        return $res;

    }
}
