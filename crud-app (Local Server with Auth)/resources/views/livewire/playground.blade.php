<div>
    <div>
        <button wire:click="increment">+</button>
        Count is: {{$count}}
        <button wire:click="decrement">-</button>
    </div>
    <br />

    <div>
        {{$message}}
        <br />
        <input wire:model="message" type="text" />
    </div>
</div>