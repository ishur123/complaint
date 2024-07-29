<?php

namespace App\Livewire;

use App\Models\NatureOfComplaint;
use Livewire\Component;
use Mary\Traits\Toast;

class NatureOfComplaintCreate extends Component
{
    use Toast;
    public $natureOfComplaint;

    public function saveNatureOfComplaint(){
        if ($this->natureOfComplaint) {
            $natureOfComplaint = new NatureOfComplaint();
            $natureOfComplaint->compName = $this->natureOfComplaint;
            $natureOfComplaint->save();

            $this->toast(
                type: 'success',
                title: $this->natureOfComplaint . ' Added Successfully',
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
        return view('livewire.nature-of-complaint-create');
    }
}
