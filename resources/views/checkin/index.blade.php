<!DOCTYPE html>
<html>
<head>
    <title>Guest Check-in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">🎟 Guest Arrival</h5>
                </div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="/checkin">
                        @csrf
                    
                        <div id="scanSection">
                        <div class="card mt-3 mb-3">
                            <div class="card-header bg-dark text-white">
                                Scan QR Code
                            </div>

                            <div class="card-body text-center">
                                <div id="reader" style="width:300px; margin:auto;"></div>
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            <label class="form-label">QR Code / Invitation Code</label>
                            <input type="text" name="qr_code"
                                   class="form-control form-control-lg text-center"
                                   autofocus required>
                        </div>
                        </div>

                        <div class="mt-3 mb-3" id="attendeeSection" style="display:none;">
                            <label class="form-label">Total Attendees</label>
                            <input type="number" name="total_attendees"
                                class="form-control form-control-lg text-center"
                                min="1" required>
                        </div>

                        {{-- <div class="d-grid">
                            <button class="btn btn-success btn-lg">
                                ✅ Check-in Guest
                            </button>
                        </div> --}}

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- <script>
document.addEventListener("keydown", function(e) {
    if (e.key === "Enter") {
        document.querySelector("form").submit();
    }
});
</script> --}}

<script src="https://unpkg.com/html5-qrcode"></script>

<audio id="successSound" src="https://www.soundjay.com/buttons/sounds/button-3.mp3"></audio>

<script>
let scanner;
let isScanned = false;

function onScanSuccess(decodedText) {
    if (isScanned) return;
    isScanned = true;

    // 🔊 Sound
    document.getElementById('successSound').play();

    // Isi QR
    document.querySelector('input[name="qr_code"]').value = decodedText;

    // Stop kamera
    if (scanner) {
        scanner.clear();
    }

    // ❌ Sembunyikan semua scan section
    document.getElementById('scanSection').style.display = 'none';

    // ✅ Tampilkan input attendee
    document.getElementById('attendeeSection').style.display = 'block';

    // Fokus ke input jumlah
    document.querySelector('input[name="total_attendees"]').focus();
}

// Init
scanner = new Html5QrcodeScanner("reader", {
    fps: 10,
    qrbox: 250
});

scanner.render(onScanSuccess);
</script>


<script>
document.querySelector('input[name="total_attendees"]').addEventListener('input', function () {
    if (this.value && this.value > 0) {
        setTimeout(() => {
            document.querySelector('form').submit();
        }, 250); // delay dikit biar user lihat inputnya
    }
});
</script>


</body>
</html>