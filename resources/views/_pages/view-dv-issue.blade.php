<form id="form-dv-issue" method="POST" class="wow animated fadeIn"
      action="{{ url('procurement/dv/issue/' . $key) }}">
    @csrf

    @if ($issueBack)
    <label>Responsible Person</label>
    <div class="md-form ml-0 mr-0 mb-5 mt-0">
        <select class="browser-default custom-select z-depth-1 required" name="issued_to">
            <option value=""> -- Select issuee -- </option>

            @if ($issuedTo)
                @foreach ($issuedTo as $emp)
            <option value="{{ $emp->emp_id }}">
                {{ $emp->firstname }} {{ $emp->lastname }}
            </option>
                @endforeach
            @endif

        </select>
    </div>
    @else
    <input type="hidden" name="issued_to" value="0">
    @endif

    <div class="form-group shadow-textarea">
        <label>Remarks</label>
        <textarea name="remarks" class="form-control z-depth-1" 
                  rows="3" placeholder="Remarks..."></textarea>
    </div>

    <div class="text-center mt-4">
        @if (!$issueBack)
        <button type="button" class="btn btn-orange waves-effect btn-block" 
                onclick="$(this).issue('{{ $key }}');">
            <i class="fas fa-paper-plane"></i> Issue
        </button>
        @else
        <button type="button" class="btn btn-orange waves-effect btn-block" 
                onclick="$(this).issueBack('{{ $key }}');">
            <i class="fas fa-undo-alt"></i> Issue Back
        </button>
        @endif
    </div>
</form>