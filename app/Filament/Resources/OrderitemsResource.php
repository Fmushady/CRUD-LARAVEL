<?php

namespace App\Filament\Resources;
use Closure;
use App\Filament\Resources\OrderitemsResource\Pages;
use App\Filament\Resources\OrderitemsResource\RelationManagers;
use App\Models\Orderitems;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class OrderitemsResource extends Resource
{
    protected static ?string $model = Orderitems::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Pemesanan';
    public static function form(Form $form): Form
{
    $products = Products::all()->pluck('name', 'product_id');

    return $form
        ->schema([
            Forms\Components\Select::make('product_id')
    ->options($products)
    ->reactive()
    ->afterStateUpdated(function ($state, $set) {
        $product = Products::find($state);
        if ($product) {
            $set('price', $product->price);
        }
    }),

Forms\Components\TextInput::make('qty')
    ->numeric()
    ->default(0)
    ->reactive()
    ->afterStateUpdated(function ($state, $get, $set) {
        $price = $get('price');
        $qty = $get('qty');
        $subtotal = $price * $qty;
        $set('subtotal', $subtotal);
    }),


            Forms\Components\TextInput::make('subtotal')
                ->numeric()
                ->default(0)
                ->disabled()
                ->prefix('$')
                ->label('Subtotal'),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('product.image_url')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('product.price')
                    ->label('Price')
                    ->numeric()
                    ->sortable(),
               
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrderitems::route('/'),
        ];
    }
}


