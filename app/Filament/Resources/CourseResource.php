<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'الدورات';
    protected static ?string $modelLabel = 'دورة';
    protected static ?string $pluralModelLabel = 'الدورات';
    protected static ?string $navigationGroup = 'إدارة المحتوى';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الدورة')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('العنوان')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        
                        Forms\Components\TextInput::make('slug')
                            ->label('الرابط')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('instructor_id')
                            ->label('المدرس')
                            ->relationship('instructor', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        
                        Forms\Components\Select::make('level')
                            ->label('المستوى')
                            ->options([
                                'beginner' => 'مبتدئ',
                                'intermediate' => 'متوسط',
                                'advanced' => 'متقدم',
                            ])
                            ->required(),
                        
                        Forms\Components\Select::make('status')
                            ->label('الحالة')
                            ->options([
                                'draft' => 'مسودة',
                                'published' => 'منشور',
                                'archived' => 'مؤرشف',
                            ])
                            ->required()
                            ->default('draft'),
                    ])->columns(2),
                
                Forms\Components\Section::make('الوصف')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label('الوصف القصير')
                            ->maxLength(500)
                            ->rows(3),
                        
                        Forms\Components\RichEditor::make('description')
                            ->label('الوصف الكامل')
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('what_you_will_learn')
                            ->label('ما سوف تتعلمه')
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('requirements')
                            ->label('المتطلبات')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('التسعير والمعلومات')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->label('السعر')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                        
                        Forms\Components\TextInput::make('discount_price')
                            ->label('السعر المخفض')
                            ->numeric()
                            ->prefix('$'),
                        
                        Forms\Components\TextInput::make('duration_hours')
                            ->label('المدة بالساعات')
                            ->numeric()
                            ->required()
                            ->default(0),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة الدورة')
                            ->image()
                            ->directory('courses')
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('instructor.name')
                    ->label('المدرس')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('level')
                    ->label('المستوى')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'beginner' => 'success',
                        'intermediate' => 'warning',
                        'advanced' => 'danger',
                    }),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر')
                    ->money('USD')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'danger',
                    }),
                
                Tables\Columns\TextColumn::make('students_count')
                    ->label('الطلاب')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('rating')
                    ->label('التقييم')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => number_format($state, 1) . ' ⭐'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'draft' => 'مسودة',
                        'published' => 'منشور',
                        'archived' => 'مؤرشف',
                    ]),
                
                Tables\Filters\SelectFilter::make('level')
                    ->label('المستوى')
                    ->options([
                        'beginner' => 'مبتدئ',
                        'intermediate' => 'متوسط',
                        'advanced' => 'متقدم',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
