<?php

namespace App\Livewire;

use App\Models\State;
use Livewire\Component;
use Mary\Traits\Toast;

class StateCreate extends Component
{
    use Toast;

    public $state;

    public function saveState(){
        if ($this->state) {
            $village = new State();
            $village->stateName = $this->state;
            $village->save();

            $this->toast(
                type: 'success',
                title: $this->state . ' Added Successfully',
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
        return view('livewire.state-create');
    }
}
