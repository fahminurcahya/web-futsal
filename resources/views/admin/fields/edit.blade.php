<x-admin.layout>
    <section class="content">
        <div class="card card-solid">
            <div class="card-header border-transparent">
                <h3 class="card-title">Edit</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('admin.field.update', $field->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $field->name }}">
                        @if($errors->has('name'))
                        <p style="font-style: bold; color: red;">
                            {{ $errors->first('name') }}</p>
                        @endif
                        <x-input-error :messages="$errors->first('name')" />
                    </div>
                    <div class="form-group">
                        <label for="price_per_hour">Price / hour</label>
                        <input type="text" class="form-control" id="price_per_hour" name="price_per_hour"
                            placeholder="100000" value="{{ $field->price_per_hour }}">
                        <x-input-error :messages="$errors->first('price_per_hour')" />
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" class="form-control" id="desc" name="desc"
                            placeholder="Lapangan Rumput, Bola 2" value="{{ $field->desc }}">
                        <x-input-error :messages="$errors->first('desc')" />
                    </div>
                    <div class="form-group">
                        <label for="image">Image input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" accept="image/png, image/svg, image/jpeg" class="" id="image"
                                    name="image" >
                            </div>
                        </div>
                        <x-input-error :messages="$errors->first('image')" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.field') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
        </div>
</x-admin.layout>
