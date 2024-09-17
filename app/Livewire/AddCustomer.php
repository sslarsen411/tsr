<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Repeater;

class AddCustomer extends Component implements HasForms, HasActions
{
    
    use InteractsWithActions;
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
            Repeater::make('Customer Data')
                ->schema(components: Customer::getForm())
                ->deletable(false)
                ->reorderable(false)
                ->columns(2)
            ])
            ->statePath('data')
            ->model(Customer::class);
        }
        
        public function create(): void
        {
            ray($this->form->getState());
        }
    public function render()
    {
        return view('livewire.add-customer');
    }
}
