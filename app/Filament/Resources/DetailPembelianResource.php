<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailPembelianResource\Pages;
use App\Filament\Resources\DetailPembelianResource\RelationManagers;
use App\Models\DetailPembelian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class DetailPembelianResource extends Resource
{
    protected static ?string $model = DetailPembelian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('id_pembelian')
                    ->label('Pembelian')
                    ->relationship('pembelian', 'id')
                    ->required(),
                Forms\Components\Select::make('id_barang')
                    ->label('Barang')
                    ->relationship('barang', 'id')
                    ->nullable(),
                Forms\Components\TextInput::make('jumlah_barang')
                    ->label('Jumlah Barang')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('subtotal_pembelian')
                    ->label('Subtotal Pembelian')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('harga_perbarang')
                    ->label('Harga Per Barang')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id_pembelian')->label('Pembelian'),
                TextColumn::make('id_barang')->label('Barang'),
                TextColumn::make('jumlah_barang')->label('Jumlah Barang'),
                TextColumn::make('subtotal_pembelian')->label('Subtotal Pembelian'),
                TextColumn::make('harga_perbarang')->label('Harga Per Barang')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetailPembelians::route('/'),
            'create' => Pages\CreateDetailPembelian::route('/create'),
            'edit' => Pages\EditDetailPembelian::route('/{record}/edit'),
        ];
    }
}
