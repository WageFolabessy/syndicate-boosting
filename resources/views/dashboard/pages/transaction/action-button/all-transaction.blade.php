<div class="d-flex justify-content-center align-items-center">
    <div class="action-btns">
        @if (class_basename($detail->transactionable) == 'CustomOrderDetail')
            <a href="{{ route('dashboard.custom-boosting-transaction.detail', $detail->transactionable->id) }}"
                style="text-decoration: none;" class="action-btn view" title="View">
                <i class="fas fa-eye"></i>
            </a>
        @elseif(class_basename($detail->transactionable) == 'PackageOrderDetail')
            <a href="{{ route('dashboard.package-boosting-transaction.detail', $detail->transactionable->id) }}"
                style="text-decoration: none;" class="action-btn view" title="View">
                <i class="fas fa-eye"></i>
            </a>
        @endif
    </div>
</div>
