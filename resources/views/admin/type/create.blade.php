@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">

            {{-- TYPES CREATION FORM --}}
            <div class="col-12">
                <div class="my-3">

                    <form class="my-form" action="{{ route('admin.types.store') }}" method="post">
                        @csrf

                        <div class="container">
                            <div class="row">

                                {{-- TYPE NAME --}}
                                <div class="col-12 my-3 ">
                                    <label for="name">Type name:</label>
                                    <input required max="255" class="w-25" type="text" name="name"
                                        id="name" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 my-3">
                                    <button class="my-red-btn" type="submit">Create</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
