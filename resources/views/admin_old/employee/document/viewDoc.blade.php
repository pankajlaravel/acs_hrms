
  {{-- <div id="documentModal" class="modal">
    <span id="closeModal" class="close">&times;</span>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close" id="closeModal"></button>
            <img id="documentImage" class="modal-content" style="height: 200px; width: auto;" >
          </div>
        </div>
      </div>
</div> --}}

<div id="fileModal" class="modal fade" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="fileModalLabel">View Document</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div id="fileViewer" style="width: 100%; height: 500px; text-align: center;"></div>
          </div>
      </div>
  </div>
</div>