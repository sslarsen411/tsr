<div>
    <h2>Add Customers to the Two Shakes Database</h2>
    <form wire:submit="create">
        {{ $this->form }}        
        <x-secondary-button type="submit" class="mt-5 next float-right" disable=false>Submit</x-secondary-button>
    </form>
</div>
