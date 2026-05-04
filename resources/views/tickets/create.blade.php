@extends('layout')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <h2>Buy Ticket</h2>
        
        @if($activeDraw)
            <div class="card" style="margin-top: 1.5rem;">
                <p style="color: var(--text-muted); margin-bottom: 1.5rem;">
                    Purchasing for Draw Date: <strong style="color: var(--primary)">{{ $activeDraw->draw_date->format('Y-m-d') }}</strong>
                </p>
                
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="draw_id" value="{{ $activeDraw->id }}">
                    
                    <div class="form-group">
                        <label for="numbers">Lotto Numbers</label>
                        <input type="text" name="numbers" id="numbers" placeholder="e.g., 5,12,23,34,41,42" required>
                        <small style="color: var(--text-muted); font-size: 0.8rem;">Enter 6 numbers separated by commas or use auto-generate.</small>
                    </div>
                    
                    <div style="display:flex; gap:1rem; margin-top: 1rem;">
                        <button type="button" onclick="generateNumbers()" class="btn btn-outline" style="flex: 1;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Auto-Generate
                        </button>
                        <button type="submit" class="btn btn-primary" style="flex: 1;">
                            Confirm Purchase
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function generateNumbers() {
                    fetch('{{ route('tickets.generate') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('numbers').value = data.numbers;
                    });
                }
            </script>
        @else
            <div class="card" style="text-align: center; padding: 3rem;">
                <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: var(--text-muted); margin-bottom: 1rem;"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p style="color: var(--text-muted)">No active draws available. Please ask an admin to schedule a draw.</p>
            </div>
        @endif
    </div>
@endsection

