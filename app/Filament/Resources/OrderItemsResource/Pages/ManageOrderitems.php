<?php

namespace App\Filament\Resources\OrderitemsResource\Pages;

use App\Filament\Resources\OrderitemsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOrderitems extends ManageRecords
{
    protected static string $resource = OrderitemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
