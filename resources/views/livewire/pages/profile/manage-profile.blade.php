<?php
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Livewire\Forms\ProfileForm;
use App\Models\Profile;

new #[Layout('layouts.app')] class extends Component {
    public ProfileForm $form;
    public ?Profile $profile;

    public function store()
    {
        $result = $this->form->save();
        if ($result) {
            dd('Saved');
        } else {
            dd('Faild to save');
        }
    }

    public function update()
    {
        $result = $this->form->update($this->profile);
        if ($result) {
            dd('Updated');
        } else {
            dd('Faild to update');
        }
    }

    public function handlerSubmit()
    {
        if ($this->profile) {
            $this->update();
        } else {
            $this->store();
        }
    }

    public function mount()
    {
        $this->profile = Profile::where('user_id', auth()->id())->first();
        $this->form->fill($this->profile->toArray());
    }
};
?>

<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manage profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form wire:submit='handlerSubmit'>
                        <div class="flex justify-center">
                            <img class="inline-block rounded-full w-[120px] h-[120px] ring-2 ring-white"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="grid grid-cols-1 gap-x-8 sm:grid-cols-2">

                            <div class="mt-4">
                                <x-input-label for="full-name" :value="__('Full name')" />
                                <x-text-input wire:model="form.name" id="name" class="block w-full mt-1"
                                    type="text" name="name" />
                                <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input wire:model="form.phone" id="phone" class="block w-full mt-1"
                                    type="text" name="phone" />
                                <x-input-error :messages="$errors->get('form.phone')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-8 sm:grid-cols-2">
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email adress')" />
                                <x-text-input wire:model="form.email" id="email" class="block w-full mt-1"
                                    type="email" name="email" />
                                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="country" :value="__('Country')" />
                                <x-text-input wire:model="form.country" id="country" class="block w-full mt-1"
                                    type="text" name="country" />
                                <x-input-error :messages="$errors->get('form.country')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-8 sm:grid-cols-2">
                            <div class="mt-4">
                                <x-input-label for="state" :value="__('State')" />
                                <x-text-input wire:model="form.state" id="state" class="block w-full mt-1"
                                    type="text" name="state" />
                                <x-input-error :messages="$errors->get('form.state')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input wire:model="form.city" id="city" class="block w-full mt-1"
                                    type="text" name="city" />
                                <x-input-error :messages="$errors->get('form.city')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="web-site" :value="__('Web site')" />
                            <x-text-input wire:model="form.website" id="website" class="block w-full mt-1"
                                type="text" name="website" />
                            <x-input-error :messages="$errors->get('form.website')" class="mt-2" />
                        </div>
                        <div class="flex justify-end mt-4">
                            <x-primary-button class="">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
