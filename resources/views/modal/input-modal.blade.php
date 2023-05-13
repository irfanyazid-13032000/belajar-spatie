<style>
  /* Set modal backdrop color */
.modal-backdrop {
  background-color: rgba(0, 0, 0, 0.5);
}

/* Set modal content style */
.modal-content {
  background-color: #fff;
  border: none;
  border-radius: 0.25rem;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

/* Set modal header style */
.modal-header {
  border-bottom: none;
}

/* Set modal title style */
.modal-title {
  font-size: 1.25rem;
  font-weight: 500;
}

/* Set modal body style */
.modal-body {
  padding: 1rem 1.5rem;
}

/* Set modal footer style */
.modal-footer {
  border-top: none;
}

/* Set close button style */
.close {
  font-size: 1.5rem;
  font-weight: 500;
  opacity: 1;
  color: #000;
}

/* Set close button hover style */
.close:hover {
  opacity: 0.75;
  text-decoration: none;
}

</style>

<button class="btn btn-primary" id="btn-popup">Tampilkan Pop-up</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ini Adalah Pop-up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Isi dari pop-up akan ditampilkan di sini.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $("#btn-popup").click(function(){
      document.querySelector('#myModal').style.display = "block"
    });
  });
</script>
