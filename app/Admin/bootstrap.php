<?php

use SleepingOwl\Admin\Model\ModelConfiguration;

// PackageManager::load('admin-default')
//    ->css('extend', public_path('packages/sleepingowl/default/css/extend.css'));
AdminSection::registerModel(\App\Driver::class, function (ModelConfiguration $model) {
    $model->setTitle('Водители');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::link('name')->setLabel('Имя')->setWidth('400px'),
            AdminColumn::datetime('birth_date')->setLabel('Дата рождения'),
        ]);
        $display->paginate(15);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::date('birth_date', 'Дата рождения')
//            AdminFormElement::text('phone', 'Phone')
        );
        return $form;
    });
})
    ->addMenuPage(\App\Driver::class, 0)
    ->setIcon('fa fa-plus');


AdminSection::registerModel(\App\Transport::class, function (ModelConfiguration $model) {
    $model->setTitle('Транспорт');
    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::link('brand')->setLabel('Марка автомобиля')->setWidth('400px'),
            AdminColumn::text('mileage')->setLabel('Пробег'),
            AdminColumnEditable::select('status_id')->setWidth('250px')
                ->setModelForOptions(new \App\TransportStatus())
                ->setLabel('Состояние')
                ->setDisplay('name'),
            AdminColumnEditable::select('type_id')->setWidth('250px')
                ->setModelForOptions(new \App\TransportType())
                ->setLabel('Тип транспорта')
                ->setDisplay('name'),
            AdminColumnEditable::select('driver_id')->setWidth('250px')
                ->setModelForOptions(new \App\Driver())
                ->setLabel('Водитель')
                ->setDisplay('name'),
        ]);
        $display->paginate(15);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('brand', 'Марка автомоблия')->required(),
            AdminFormElement::text('mileage', 'Пробег'),
            AdminFormElement::text('status_id', 'Состояние'),
            AdminFormElement::text('type_id', 'Тип транспорта')
        );
        return $form;
    });
})
    ->addMenuPage(\App\Transport::class, 0)
    ->setIcon('fa fa-plus');