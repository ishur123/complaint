<?php

namespace App\Livewire;

use App\Models\Mandal;
use App\Models\State;
use Livewire\Component;
use Mary\Traits\Toast;

class MandalCreate extends Component
{
    use Toast;

    public $mandal;
    public $states;
    public $selState;

    public function mount()
    {
        $this->states = State::all();
    }

    public function saveMandal()
    {
        if ($this->mandal) {
            $mandal = new Mandal();
            $mandal->stateId = $this->selState;
            $mandal->mandalName = $this->mandal;
            $mandal->save();

            $this->toast(
                type: 'success',
                title: $this->mandal . ' Added Successfully',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );

            $this->redirectRoute('villageForm');

        } else {
            $this->toast(
                type: 'success',
                title: 'Pleae Enter Village Name',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );
        }
    }

    public function render()
    {
        return view('livewire.mandal-create');
    }
}
