<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('book.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="title" value="Judul" />
                            <x-text-input id="title" type="text" name="title" class="mt-1 block w-full"
                                value="{{ old('title')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="author" value="Penulis" />
                            <x-text-input id="author" type="text" name="author" class="mt-1 block w-full"
                                value="{{ old('author')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="year" value="Tahun Terbit" />
                            <x-text-input id="year" type="number" name="year" class="mt-1 block w-full"
                                value="{{ old('year')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('year')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="publisher" value="Penerbit" />
                            <x-text-input id="publisher" type="text" name="publisher" class="mt-1 block w-full"
                                value="{{old('publisher')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="city" value="Kota Terbit" />
                            <x-text-input id="city" type="text" name="city" class="mt-1 block w-full"
                                value="{{ old('city')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="quantity" value="Jumlah Buku" />
                            <x-text-input id="quantity" type="number" name="quantity" class="mt-1 block w-full"
                                value="{{old('quantity')}}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="category_id" value="Kategori Buku" />
                            <x-select-input id="category_id" name="category_id" class="mt-1 block w-full" required>
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $category)
                                @if(old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="bookshelf_id" value="Rak Buku" />
                            <x-select-input id="bookshelf_id" name="bookshelf_id" class="mt-1 block w-full" required>
                                <option value="">Pilih kategori</option>
                                @foreach($bookshelves as $bookshelf)
                                    @if(old('bookshelf_id') == $bookshelf->id)
                                        <option value="{{ $bookshelf->id }}" selected>{{ $bookshelf->name }}</option>
                                    @else
                                        <option value="{{ $bookshelf->id }}">{{ $bookshelf->name }}</option>
                                    @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="cover" value="Gambar" />
                            <x-file-input id="cover" name="cover" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>

                        <x-secondary-button tag="a" href="{{route('book.index')}}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
