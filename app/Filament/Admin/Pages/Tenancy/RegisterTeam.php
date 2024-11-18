<?php

namespace App\Filament\Admin\Pages\Tenancy;
 
use App\Models\Team;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
 
class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->unique()
                    ->required(),
                // ...
            ]);
    }
 
    protected function handleRegistration(array $data): Team
    {
        $team = new Team();
        $team->name = $data['name'];
        $team->slug    = \Illuminate\Support\Str::slug($data['name']);
        $team->save();
 
        $team->members()->attach(auth()->user());
 
        return $team;
    }
}