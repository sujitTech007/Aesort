<div class="flash-wrapper" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
    <style>
        .flash-message {
            min-width: 260px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            transition: opacity 0.6s ease, transform 0.6s ease;
            opacity: 1;
            transform: translateY(0);
            margin-bottom: 8px;
        }
        .flash-hide {
            opacity: 0 !important;
            transform: translateY(-8px) !important;
        }
    </style>

    @if(session('status'))
        <div class="alert alert-success flash-message">
            {{ session('status') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger flash-message">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger flash-message">
            <ul style="margin:0; padding-left:18px;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            try {
                var msgs = document.querySelectorAll('.flash-message');
                if (!msgs || msgs.length === 0) return;
                // Auto-hide after 3 seconds
                setTimeout(function () {
                    msgs.forEach(function (m) { m.classList.add('flash-hide'); });
                    // remove from DOM after transition (allow 700ms)
                    setTimeout(function () { msgs.forEach(function (m) { if (m && m.parentNode) m.parentNode.removeChild(m); }); }, 700);
                }, 3000);
            } catch (e) {
                // silent fail
                console.error(e);
            }
        });
    </script>

</div>
