<?php

namespace App\Livewire;

use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Component;

class DemoForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                ToggleButtons::make('q1')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live(),

                ToggleButtons::make('q1_0')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1') === 'yes'),

                ToggleButtons::make('q1_1')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1') === 'no'),

                ToggleButtons::make('q1_0_0')
                    ->helperText('q1_0_0')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_0') === 'yes'),

                ToggleButtons::make('q1_0_1')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_0') === 'no'),

                ToggleButtons::make('q1_1_0')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_1') === 'yes'),

                ToggleButtons::make('q1_1_1')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_1') === 'no'),

                ToggleButtons::make('q1_1_1_0')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_1_1') === 'yes'),

                ToggleButtons::make('q1_1_1_1')
                    ->options(['yes' => 'Yes', 'no' => 'No',])->grouped()->live()
                    ->visible(fn (Get $get) => $get('q1_1_1') === 'no'),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.demo-form');
    }
}
