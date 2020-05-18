@forelse ($notifications as $notification)
    @if (!$loop->first)
       <div class="dropdown-divider my-0"></div>
    @endif
    @switch($notification->type)
        @case('App\Notifications\SubscriptionExpirationReminder')
            <a class="dropdown-item p-3" href="{{ route('users.show', ['user' => auth()->user()]) }}">
                <div class="d-flex align-items-center">
                    <span class="text-base mr-3 text-darkslategray">&bull;</span>
                    <p class="mb-0">Langganan Anda akan segera berakhir.</p>
                </div>
                <span class="text-muted ml-4">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
            @break
        @case('App\Notifications\LoanExpiration')
            <a class="dropdown-item p-3" href="{{ route('users.loans', ['user' => auth()->user()]) }}">
                <div class="d-flex align-items-center">
                    <span class="text-base mr-3 text-darkslategray">&bull;</span>
                    <p class="mb-0 text-wrap">Masa peminjaman buku "{{ $notification->data['title'] }}" akan segera berakhir.</p>
                    <img src="{{ asset("storage/{$notification->data['cover']}") }}" style="width: 48px;" class="h-auto">
                </div>
                <span class="text-muted ml-4">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
            @break
        @default
            <span class="dropdown-item p-3 text-center">Kesalahan tipe notifikasi.</span>
    @endswitch
@empty
    <span class="dropdown-item p-3 text-center">Tidak ada notifikasi.</span>
@endforelse