<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">
        <a href="{{ $link->getCompleteShorturl() }}" target="_blank">{{ $link->getCompleteShorturl() }}</a><br>
    </h4>
</div>
<div class="modal-body text-center">
    <div class="row">
    <img src="{{ $link->getQrcodeFilename() }}">
    </div>
    <div class="row">
        <p>Vous pouvez enregistrer ce QRCode en faisant un clic droit puis Enregistrer ou Copier</p>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
</div>
