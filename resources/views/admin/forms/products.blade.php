<div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(isset($product))
        <div class="form-group" display="none">
            <input class="hidden" name="id" id="id" value="{{ $product->id }}">
        </div>
    @endif
    <div class = "form-group">
        <div class="col-md-2">
            <label class="control-label">Naziv:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product)) <input type="text" name="name" id = "name" class="form-control" @error('name') is-invalid @enderror placeholder="Naziv" value="{{ $product->name }}" required />
            @else <input type="text" name="name" id ="name" class="form-control form-validate" @error('name') is-invalid @enderror placeholder="Naziv" value="{{ old('name') }}" required />
            @endif
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <label class="control-label">Tekst:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product)) <textarea id="wysiwyg" class="form-control control-5-rows textarea" @error('text') is-invalid @enderror placeholder="Enter text ..." spellcheck="false" name="text" required>{{ $product->text }} </textarea>
            @else <textarea id="wysiwyg" class="form-control control-5-rows textarea" @error('text') is-invalid @enderror placeholder="Unesite tekst ..." spellcheck="false" name="text"  required>{{ old('text') }}</textarea>
            @endif
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class = "form-group">
        <div class="col-md-2">
            <label class="control-label">Sifra Proizvoda:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product)) <input type="text" name="key" id = "key" class="form-control" @error('key') is-invalid @enderror placeholder="Sifra" value="{{ $product->key }}" required />
            @else <input type="text" name="key" id ="key" class="form-control form-validate" @error('key') is-invalid @enderror placeholder="Sifra" value="{{ old('key') }}" required />
            @endif
            @error('key')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div id="size-boxes">
        <div class = "form-group" id="divcopy_0" >
            <div class="col-md-2">
                <button type="button" class="glyphicon glyphicon-plus" id="sizeBtn" ></button>
                <label class="control-label">Pakovanje:</label>
            </div>
            @if(isset($product->sizes))
                @foreach($product->sizes as $num=>$size)
                <div class = "form-group">
                    @if($num>0)
                        <div class="col-md-2"></div>
                    @endif
                        <div class="col-md-2">
                            <label class="control-label">Kolicina:</label>
                            <input type="number" name="sizes[0][quantity]" id = "quantity" class="form-control" @error('quantity') is-invalid @enderror placeholder="kolicina" value="{{ $size->quantity }}" required />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Jedinica mere:</label>
                            <input type="text" name="sizes[0][unit]" id = "unit" class="form-control" @error('unit') is-invalid @enderror placeholder="jedinica" value="{{ $size->unit }}" required />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Na stajanju:</label>
                            <input type="number" name="sizes[0][stock]" id = "stock" class="form-control" @error('stock') is-invalid @enderror placeholder="Paketa na stajanju" value="{{ $size->stock }}" required />
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">Cena:</label>
                            <input type="text" name="sizes[0][price]" id = "price" class="form-control" @error('price') is-invalid @enderror placeholder="Cena" value="{{ $size->price }}" required />
                        </div>
                        @if($num>0)
                        <button type="button" class="obrisiSize" id="{{ $size->id }}"><i class="fa fa-times"></i></button>
                        @endif
                </div>
                @endforeach
                    <input type="hidden" id="removesize" name="removesize" value="[]">
            @elseif(!isset($product->sizes))
                <div class="col-md-2">
                    <label class="control-label">Kolicina:</label>
                    <input type="number" name="sizes[0][quantity]" id ="quantity" class="form-control form-validate" @error('sizes'[0].'[quantity]') is-invalid @enderror placeholder="kolicina" value="{{ old('sizes')[0]["quantity"] }}" required />
                    @error('sizes[0][quantity]')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="control-label">Jedinica mere:</label>
                    <input type="text" name="sizes[0][unit]" id ="unit" class="form-control form-validate" @error('sizes'[0].'[unit]') is-invalid @enderror placeholder="jedinica" value="{{  old('sizes')[0]["unit"] }}" required />
                    @error('sizes[0][unit]')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="control-label">Na stajanju:</label>
                    <input type="number" name="sizes[0][stock]" id ="stock" class="form-control form-validate" @error('sizes'[0].'[stock]') is-invalid @enderror placeholder="Paketa na stajanju" value="{{ old('sizes')[0]["stock"] }}" required />
                    @error('sizes[0][stock]')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="control-label">Cena:</label>
                    <input type="text" name="sizes[0][price]" id ="price" class="form-control form-validate" @error('sizes[0][price]') is-invalid @enderror placeholder="Cena" value="{{ old('sizes')[0]["price"] }}" required />
                    @error('sizes[0][price]')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endif
        </div>
    </div>
    <div class = "form-group">
        <div class="col-md-2">
            <label class="control-label">Tagovi:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product->tags))
                <?php
                    $tag_string = "";
                    foreach($product->tags as $num=>$tag) {
                        if($num > 0) {
                            $tag_string .= ",";
                        }
                        $tag_string .= $tag->name;
                        $num++;
                    }
                ?>
                <input id="tags" name="tags" type="text" value="{{ $tag_string }}"  class='form-control' multiple data-role="tagsinput" style="display: none;" >
            @else
                <input type="text" name="tags" id ="tags" class="form-control form-validate" @error('tags') is-invalid @enderror placeholder="Tagovi..." value="{{ old('tags') }}" required />
            @endif
            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class = "form-group">
        <div class="col-md-2">
            <label class="control-label">Kategorije:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product->categories))
                <?php
                $category_string = "";
                foreach($product->categories as $num=>$category) {
                    if($num > 0) {
                        $category_string .= ",";
                    }
                    $category_string .= $category->name;
                    $num++;
                }
                ?>
            <input id="category" name="category" type="text" value="{{ $category_string }}"  class='form-control' multiple data-role="tagsinput" style="display: none;" >
            @else <input type="text" name="category" id ="category" class="form-control form-validate" @error('category') is-invalid @enderror placeholder="Kategorije..." value="{{ old('category') }}" required />
            @endif
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class = "form-group">
        <div class="col-md-2">
            <label class="control-label">Opis:</label>
        </div>
        <div class="col-md-10">
            @if(isset($product)) <input type="text" name="description" id = "description" class="form-control" @error('description') is-invalid @enderror placeholder="Opis" value="{{ $product->description }}" required />
            @else <input type="text" name="description" id ="description" class="form-control form-validate" @error('description') is-invalid @enderror placeholder="Opis" value="{{ old('description') }}" required />
            @endif
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <label class="control-label">Slike:</label>
        </div>
        <div class="col-md-10">
                <input type="file" name="photos[]" id="uploadPhotoFiles" class="uploadPhotoFiles" accept="image/jpg, image/jpeg, image/png" multiple />
        </div>
    </div>
    @if(isset($product))
        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div id="gallery">
                    <div id="image-container">
                        <ul id="image-list">
                            @foreach($product->materials as $material)
                                <li style="list-style-type: none;" id="image_{{$material->id}}">
                                    <div class="row">
                                        <div class="col-md-2" id="imagediv_{{$material->id}}">
                                            <div class="box-head">
                                                <header>
                                                </header>
                                                <div class="tools">
                                                    <div class="btn-group btn-group-transparent">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-equal btn-sm removeImageDiv" id="remove_{{$material->id}}"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="thumbnail img-responsive img" src="{{asset($material->url)}}"  style="background-color: #f7f7f7; width:100%">
                                        </div>
                                        <div class="col-md-10"></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="removematerials" name="removematerials" value="[]">
        <input type="hidden" id="sortImages" name="sortImages" value="[]">
    @endif
    <div class="form-group">
        <div class="form-footer col-lg-offset-1 col-md-offset-1 col-sm-9">
            <button type="button" class="btn btn-primary" id="addBuilding" data-toggle="modal" data-target="#simpleModal">{{$submit}} Proizvod</button>
        </div>
    </div>
    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="simpleModalLabel">Sačuvajte promene</h4>
                </div>
                <div class="modal-body">
                    <p><text>Da li želite da </text> @if ($submit == 'Dodaj')<text>dodate</text>
                        @elseif ($submit == 'Uredi')<text>uredite</text>
                        @endif <text>ovu Vest?</text>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
                    <button type="submit" id="submitBuilding" class="btn btn-primary">Sačuvaj</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->
</div>
