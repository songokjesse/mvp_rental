@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="mt-3">
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent="save" class="form" enctype="multipart/form-data">
        @if ($photo)
            Image Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="mt-3 mb-3">
        @endif
        <input type="file" wire:model="photo" class="form-control" >
        @error('photo') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="btn btn-primary btn-sm mt-3"><i class="bi bi-save"></i> Save Images</button>
    </form>
</div>
