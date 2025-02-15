<div class="mb-3">
    <label for="title" class="form-label">Заголовок</label>
    <input type="text"
           class="form-control @error('title') is-invalid @enderror"
           id="title"
           name="title"
           value="{{ old('title', $article->title ?? '') }}"
           required>
    @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Категория</label>
    <select class="form-select @error('category_id') is-invalid @enderror"
            id="category_id"
            name="category_id"
            required>
        <option value="">Выберите категорию</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ (old('category_id', $article->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">URL (slug)</label>
    <input type="text"
           class="form-control @error('slug') is-invalid @enderror"
           id="slug"
           name="slug"
           value="{{ old('slug', $article->slug ?? '') }}">
    @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">Оставьте пустым для автоматической генерации</div>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Краткое описание</label>
    <textarea class="form-control @error('description') is-invalid @enderror"
              id="description"
              name="description"
              rows="3">{{ old('description', $article->description ?? '') }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label">Содержание</label>
    <textarea class="form-control @error('content') is-invalid @enderror"
              id="content"
              name="content"
              rows="10"
              required>{{ old('content', $article->content ?? '') }}</textarea>
    @error('content')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
