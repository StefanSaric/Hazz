var counter = 1;
$(document).on('click', "#sizeBtn", function() {
    var div = $('#size-boxes')
    var html = `
        <div class = "form-group">
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
			<input type="number" name="sizes[`+counter+`][quantity]" id = "sizes[`+counter+`][quantity]" class="form-control" placeholder="kolicina" value="" required />
		</div>
		<div class="col-md-2">
			<input type="text" name="sizes[`+counter+`][unit]" id ="sizes[`+counter+`][unit]" class="form-control form-validate" placeholder="jedinica" value="" required />
		</div>
		<div class="col-md-2">
			<input type="number" name="sizes[`+counter+`][stock]" id ="sizes[`+counter+`][stock]" class="form-control form-validate" placeholder="Paketa na stajanju" value="" required />
		</div>
		<div class="col-md-2">
            <input type="text" name="sizes[`+counter+`][price]" id ="sizes[`+counter+`][price]" class="form-control form-validate" placeholder="Cena" value="" required />
        </div>
        <button type="button" class="btn btn-equal btn-sm btn-close obrisiRed"><i class="fa fa-times"></i></button>
	</div>`;
    counter++;
    div.append(html);
});
