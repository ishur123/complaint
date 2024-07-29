<?php

namespace App\Livewire;

use App\Models\Distt;
use App\Models\Mandal;
use App\Models\State;
use Livewire\Component;
use Mary\Traits\Toast;

class DisttCreate extends Component
{
    use Toast;
    public $selMandal;
    public $mandals;
    public $distt;

    public function mount()
    {
        $this->mandals = Mandal::all();
    }

    public function saveDistt(){
        if ($this->distt) {
            $distt = new Distt();
            $distt->mandalId = $this->selMandal;
            $distt->disttName = $this->distt;
            $distt->save();

            $this->toast(
                type: 'success',
                title: $this->distt . ' Added Successfully',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );

            $this->redirectRoute('villageForm');

        } else {
            $this->toast(
                type: 'success',
                title: 'Pleae Enter Distt Name',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                css: 'alert-info',
            );
        }
    }

    public function render()
    {
        return view('livewire.distt-create');
    }
}
