<?php

namespace App\Livewire;

use App\Models\Constituency;
use App\Models\State;
use Livewire\Component;
use Mary\Traits\Toast;

class ConstituencyCreate extends Component
{
    use Toast;
    public $constituency;
    public $states;
    public $selState;

    public function mount(){
        $this->states = State::all();
    }

    public function saveConstituency(){
        if ($this->constituency) {
            $constituency = new Constituency();
            $constituency->stateId = $this->selState;
            $constituency->name = $this->constituency;
            $constituency->save();

            $this->toast(
                type: 'success',
                title: $this->constituency . ' Added Successfully',
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
        return view('livewire.constituency-create');
    }
}
