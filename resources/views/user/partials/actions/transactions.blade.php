@if ($transaction->paid_at && $transaction->receipt)
    -
@else
    <a href="{{ route('transactions.show', compact('transaction')) }}" class="btn btn-primary">
        <i class="fas fa-upload"></i>
    </a>
@endif