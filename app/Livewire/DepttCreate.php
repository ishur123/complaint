<?php

namespace App\Livewire;

use App\Models\Deptt;
use Livewire\Component;
use Mary\Traits\Toast;

class DepttCreate extends Component
{
    use Toast;
    public $deptt;

    public function saveDeptt(){
        if ($this->deptt) {
            $deptt = new Deptt();
            $deptt->depttName = $this->deptt;
            $deptt->save();

            $this->toast(
                type: 'success',
                title: $this->deptt . ' Added Successfully',
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
        return view('livewire.deptt-create');
    }
}
