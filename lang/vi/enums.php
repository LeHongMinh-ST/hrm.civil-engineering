<?php

use App\Enums\Salary\SalaryAdvancesType;
use App\Enums\Salary\SalaryStatus;
use App\Enums\User\UserRole;
use App\Enums\Worker\WorkerStatus;

return [
    UserRole::class => [
        UserRole::Admin => 'Quản trị',
        UserRole::User => 'Người dùng',
    ],
    SalaryStatus::class => [
        SalaryStatus::Owed => 'Còn nợ',
        SalaryStatus::Unpaid => 'Chưa thanh toán',
        SalaryStatus::Paid => 'Chưa thanh toán',
    ],
    SalaryAdvancesType::class => [
        SalaryAdvancesType::Advances => 'Ứng lương',
        SalaryAdvancesType::Payment => 'Thanh toán',
    ],
    WorkerStatus::class => [
        WorkerStatus::InWorking => 'Đang làm',
        WorkerStatus::Quit => 'Đã nghỉ',
    ]
];
