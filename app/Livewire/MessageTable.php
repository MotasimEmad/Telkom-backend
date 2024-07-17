<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MessageTable extends PowerGridComponent
{
    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage('50')
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Message::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('full_name', function ($model) {
                return Str::limit($model->full_name, 20, '...');
            })

            ->add('company_name', function ($model) {
                return Str::limit($model->company_name, 20, '...');
            })

            ->add('email', function ($model) {
                return Str::limit($model->email, 20, '...');
            })

            ->add('phone_number', function ($model) {
                return Str::limit($model->phone_number, 20, '...');
            })
            ->add('message', function ($model) {
                return Str::limit($model->message, 20, '...');
            })

            ->add('created_at')
            ->add('created_at_formatted', fn (Message $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Full name', 'full_name')
                ->searchable()
                ->sortable(),

            Column::make('Company name', 'company_name')
                ->searchable()
                ->sortable(),

            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),

            Column::make('Phone number', 'phone_number')
                ->searchable()
                ->sortable(),

            Column::make('Message', 'message')
                ->searchable()
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable(),
        ];
    }
}
