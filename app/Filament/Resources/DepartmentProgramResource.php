<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentProgramResource\Pages;
use App\Filament\Resources\DepartmentProgramResource\RelationManagers;
use App\Models\DepartmentProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentProgramResource extends Resource
{
    protected static ?string $model = DepartmentProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    
    protected static ?string $navigationLabel = 'Semua Program Kerja';
    
    protected static ?string $navigationGroup = 'Master Data';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('department_id')
                    ->label('Departemen')
                    ->relationship('department', 'name')
                    ->required()
                    ->searchable(),
                    
                Forms\Components\TextInput::make('title')
                    ->label('Judul Program')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\RichEditor::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\DatePicker::make('start_date')
                    ->label('Tanggal Mulai'),
                    
                Forms\Components\DatePicker::make('end_date')
                    ->label('Tanggal Selesai'),
                    
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'planned' => 'Direncanakan',
                        'ongoing' => 'Sedang Berjalan',
                        'completed' => 'Selesai',
                    ])
                    ->required()
                    ->default('planned'),
                    
                Forms\Components\FileUpload::make('images')
                    ->label('Gambar Program (Maks 3)')
                    ->helperText('Upload 1-3 gambar. Gambar pertama akan menjadi gambar utama.')
                    ->image()
                    ->multiple()
                    ->maxFiles(3)
                    ->directory('programs')
                    ->reorderable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $user = auth()->user();
                // Jika bukan super admin dan adalah kadep, hanya tampilkan program dari departemennya
                if ($user && $user->role === 'kadep' && $user->department_id) {
                    $query->where('department_id', $user->department_id);
                }
                return $query;
            })
            ->columns([
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Departemen')
                    ->sortable()
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable(),
                    
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'planned',
                        'primary' => 'ongoing',
                        'success' => 'completed',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'planned' => 'Direncanakan',
                        'ongoing' => 'Sedang Berjalan',
                        'completed' => 'Selesai',
                        default => $state,
                    }),
                    
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('department')
                    ->relationship('department', 'name')
                    ->label('Departemen'),
                    
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'planned' => 'Direncanakan',
                        'ongoing' => 'Sedang Berjalan',
                        'completed' => 'Selesai',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListDepartmentPrograms::route('/'),
            'create' => Pages\CreateDepartmentProgram::route('/create'),
            'edit' => Pages\EditDepartmentProgram::route('/{record}/edit'),
        ];
    }
}
