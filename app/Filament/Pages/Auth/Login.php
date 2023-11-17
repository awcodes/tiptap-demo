<?php

namespace App\Filament\Pages\Auth;

use Filament\Http\Livewire\Auth\Login as FilamentLogin;

class Login extends FilamentLogin
{
    public function mount(): void
    {
        $this->form->fill([
            'email' => 'bruce@wayneindustries.com',
            'password' => 'password',
        ]);
    }
}
