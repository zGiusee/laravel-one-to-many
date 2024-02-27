@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            @include('admin.partials.dashboard_nav')

            {{-- TYPES TABLE --}}
            <div class="col-12">
                <div class="py-3">
                    <table class="table my-table-styles my-mt-80 text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th>Included in N'Projects</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    {{-- TABLE PROPERTIES --}}
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ count($type->projects) }}
                                    </td>

                                    {{-- TOOLS --}}
                                    <td>

                                        {{-- REDIRECT TO MODIFY PAGE --}}
                                        <a href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>


                                        {{-- <button class="my_delete_button" data-bs-toggle="modal"
                                            data-bs-target="#delete_modal" type="button"
                                            data-project-slug="{{ $project->slug }}"
                                            data-project-name="{{ $project->name }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- @include('admin.partials.delete_modal') --}}
    </div>
@endsection
