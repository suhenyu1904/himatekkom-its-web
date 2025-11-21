<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BsoResource\Pages;
use App\Filament\Resources\BsoResource\RelationManagers;
use App\Models\Bso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BsoResource extends Resource
{
    protected static ?string $model = Bso::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'BSO';
    
    protected static ?string $navigationGroup = 'Organisasi';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama BSO')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),
                    
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                    
                Forms\Components\Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'supporter' => 'Supporter (Centurion)',
                        'competition' => 'Competition (Mage)',
                    ])
                    ->required(),
                    
                Forms\Components\RichEditor::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('bso'),
                    
                Forms\Components\TextInput::make('icon')
                    ->label('Icon (emoji)')
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('vision')
                    ->label('Visi')
                    ->rows(3)
                    ->columnSpanFull(),
                    
                Forms\Components\Textarea::make('mission')
                    ->label('Misi')
                    ->rows(3)
                    ->columnSpanFull(),
                    
                Forms\Components\TextInput::make('contact_email')
                    ->label('Email Kontak')
                    ->email()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('contact_phone')
                    ->label('No. Telepon')
                    ->tel()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram')
                    ->prefix('@')
                    ->maxLength(255),
                    
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                    
                Forms\Components\TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->colors([
                        'success' => 'supporter',
                        'primary' => 'competition',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'supporter' => 'Supporter',
                        'competition' => 'Competition',
                        default => $state,
                    }),
                    
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                    
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBsos::route('/'),
            'create' => Pages\CreateBso::route('/create'),
            'edit' => Pages\EditBso::route('/{record}/edit'),
        ];
    }
}
