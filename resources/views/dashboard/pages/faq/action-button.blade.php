<div class="d-flex justify-content-center align-items-center">
    <div class="action-btns">
        <a href="{{ route('dashboard.faq.show', $faq->id) }}" style="text-decoration: none;" class="action-btn view" title="View">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('dashboard.faq.show', $faq->id) }}" style="text-decoration: none;" class="action-btn edit" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        <form action="{{ route('dashboard.faq.destroy', $faq->id) }}" method="POST" style="display:inline; text-decoration: none;">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn delete" title="Delete" onclick="return confirm('Are you sure you want to delete this faq?');">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</div>
