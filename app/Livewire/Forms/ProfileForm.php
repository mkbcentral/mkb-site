<?php

namespace App\Livewire\Forms;

use App\Models\Profile;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|string|email', onUpdate: false)]
    public string $email = '';

    #[Validate('required|string')]
    public string $phone = '';

    #[Validate('nullable|string')]
    public ?string $photo = null;

    #[Validate('nullable|string')]
    public ?string $city = null;

    #[Validate('nullable|string')]
    public ?string $state = null;

    #[Validate('nullable|string',)]
    public ?string $country = null;

    #[Validate('nullable|string')]
    public ?string $website = null;

    // This method is called when the component is mounted
    public function save(): bool
    {
        $this->validate();
        $profile = Profile::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $this->photo,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'website' => $this->website,
            'user_id' => auth()->id(),
        ]);
        if ($profile) {
            $this->reset();
            return true;
        } else {
            return false;
        }
    }
    //Update profile
    public function update(Profile $profile): bool
    {
        $this->validate();
        $profile->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $this->photo,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'website' => $this->website,
        ]);
        if ($profile) {
            $this->reset();
            return true;
        } else {
            return false;
        }
    }
}
