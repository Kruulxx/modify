<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="form-group">
            <label for="file">Upload Excel CSV File:</label>
            <input type="file" wire:model="file" id="file">
            @error('file') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Upload and Process</button>
        </div>
    </form>
</div>
