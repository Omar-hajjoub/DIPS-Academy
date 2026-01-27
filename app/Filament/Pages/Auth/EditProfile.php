<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Illuminate\Support\Facades\Hash;

class EditProfile extends BaseEditProfile
{
    protected static string $view = 'filament-panels::pages.auth.edit-profile';

    public static function getLabel(): string
    {
        return 'Mon Profil';
    }

    public function getTitle(): string
    {
        return 'Mon Profil';
    }

    public function getHeading(): string
    {
        return 'Paramètres du Profil';
    }

    public function getSubheading(): ?string
    {
        return 'Gérez vos informations personnelles et vos préférences';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations Personnelles')
                    ->description('Mettez à jour vos informations de profil et votre photo.')
                    ->icon('heroicon-o-user-circle')
                    ->collapsible()
                    ->schema([
                        FileUpload::make('avatar')
                            ->label('Photo de Profil')
                            ->image()
                            ->avatar()
                            ->directory('avatars')
                            ->disk('public')
                            ->maxSize(2048)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('200')
                            ->imageResizeTargetHeight('200')
                            ->columnSpanFull()
                            ->circleCropper(),

                        Grid::make(2)
                            ->schema([
                                $this->getNameFormComponent()
                                    ->label('Nom Complet')
                                    ->placeholder('Entrez votre nom complet'),
                                    
                                $this->getEmailFormComponent()
                                    ->label('Adresse Email')
                                    ->placeholder('votre@email.com'),

                                TextInput::make('phone')
                                    ->label('Numéro de Téléphone')
                                    ->tel()
                                    ->maxLength(20)
                                    ->prefixIcon('heroicon-o-phone')
                                    ->placeholder('+33 6 00 00 00 00'),

                                Select::make('timezone')
                                    ->label('Fuseau Horaire')
                                    ->options($this->getTimezones())
                                    ->searchable()
                                    ->prefixIcon('heroicon-o-clock')
                                    ->default('Europe/Paris'),

                                Select::make('locale')
                                    ->label('Langue')
                                    ->options([
                                        'fr' => 'Français',
                                        'en' => 'English',
                                        'ar' => 'العربية',
                                    ])
                                    ->prefixIcon('heroicon-o-language')
                                    ->default('fr'),
                            ]),
                    ]),

                Section::make('Sécurité du Compte')
                    ->description('Assurez-vous que votre compte utilise un mot de passe fort.')
                    ->icon('heroicon-o-lock-closed')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        $this->getPasswordFormComponent()
                            ->label('Nouveau Mot de Passe')
                            ->placeholder('Laissez vide pour ne pas changer'),
                        $this->getPasswordConfirmationFormComponent()
                            ->label('Confirmer le Mot de Passe')
                            ->placeholder('Confirmez votre nouveau mot de passe'),
                    ]),
            ]);
    }

    protected function getTimezones(): array
    {
        $timezones = timezone_identifiers_list();
        $result = [];

        foreach ($timezones as $timezone) {
            $result[$timezone] = str_replace(['/', '_'], [' / ', ' '], $timezone);
        }

        return $result;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['phone'] = $this->getUser()->phone;
        $data['timezone'] = $this->getUser()->timezone ?? 'Europe/Paris';
        $data['locale'] = $this->getUser()->locale ?? 'fr';
        $data['avatar'] = $this->getUser()->avatar;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Enregistrer les Modifications');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Annuler');
    }
}
