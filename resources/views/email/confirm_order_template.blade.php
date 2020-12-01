<p>Postovani, </p>

<p>Vasa porudzbina #{{ $data['order_id'] }} je evidentirana </p>

<p>Hvala na ukazanom poverenju!</p>

<p>Nakon pregleda porudžbine, na vašu e-mail adresu stići će obaveštenje o statusu porudžbine,
   a sredstva će biti naplaćena samo za proizvode koje ćemo isporučiti.
   Zajedno sa našim partnerima iz kurirske službe potrudićemo se da vašu porudžbinu dobijete u roku, ali vas molimo za razumevanje ako dođe do malog kašnjenja.</p>

<p><strong>Broj narudžbine:</strong>  #{{ $data['order_id'] }}</p>

<p><strong>Iznos:</strong>  {{ $data['total'] }} RSD</p>

<p>Ime: {{ $data['firstname'] }},</p>

<p>Prezime: {{ $data['lastname'] }},</p>

<p>Email: {{ $data['email'] }},</p>

<p>Telefon: {{ $data['phone'] }},</p>

<p>Grad: {{ $data['city'] }},</p>

<p>Ulica i broj: {{ $data['address'] }} {{ $data['num'] }}, Stan: {{ $data['apartment'] }}</p>
