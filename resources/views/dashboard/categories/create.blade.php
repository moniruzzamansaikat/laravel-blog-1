<x-admin-layout>
    <h1>Add new category</h1>

    <form method="post" action="{{ route('dashboard.categories.store') }}">
        @csrf

        <div class="form-group">
            <input
                tabindex="1"
                type="text"
                name="name"
                class="form-control"
                placeholder="Category Name"
                value="{{ old('name') }}"
            />
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>
</x-admin-layout>
