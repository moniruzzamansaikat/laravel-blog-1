<x-admin-layout>
    <h1>Edit Category</h1>

    <form
        method="post"
        action="{{ route('dashboard.categories.update', $category) }}"
    >
        @csrf @method('PUT')

        <div class="form-group">
            <input
                tabindex="1"
                type="text"
                name="name"
                class="form-control"
                placeholder="Category Name"
                value="{{ $category->name }}"
            />
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">
                Update Category
            </button>
        </div>
    </form>
</x-admin-layout>
