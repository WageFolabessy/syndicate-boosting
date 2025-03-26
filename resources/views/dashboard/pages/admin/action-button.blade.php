<div class="d-flex justify-content-center align-items-center">
    @if (Auth::user()->id !== $admins->id)
        <div class="action-btns">
            <form action="{{ route('dashboard.admin.destroy', $admins->id) }}" method="POST"
                style="display:inline; text-decoration: none;">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn delete" title="Delete"
                    onclick="return confirm('Are you sure you want to delete this admin?');">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    @else
        <div class="action-btns">
               <p>You</p>
        </div>
    @endif
</div>
