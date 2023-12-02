<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Camera and Barcode Scanner</title>
  <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
</head>
<body>

<div style="display: flex; justify-content: space-between;">
  <video id="video" width="320" height="240" autoplay></video>
  <canvas id="canvas" width="320" height="240" style="border: 2px solid #000;"></canvas>
</div>

<div id="result"></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const resultDiv = document.getElementById('result');

    // Coba akses kamera
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          // Tampilkan video dari kamera
          video.srcObject = stream;

          // Inisialisasi QuaggaJS
          Quagga.init({
            inputStream: {
              name: 'Live',
              type: 'LiveStream',
              target: video,
              constraints: {
                width: { min: 320 },
                height: { min: 240 }
              }
            },
            decoder: {
              readers: ['ean_reader', 'upc_reader'],
            },
          }, function(err) {
            if (err) {
              console.error(err);
              return;
            }

            // Start Quagga
            Quagga.start();
          });

          // Resize canvas to match video size
          const track = stream.getVideoTracks()[0];
          const settings = track.getSettings();
          canvas.width = settings.width;
          canvas.height = settings.height;
        })
        .catch(function (error) {
          console.error('Error accessing camera:', error);
        });
    } else {
      console.error('getUserMedia is not supported');
    }

    // Listen for barcode detection
    Quagga.onDetected(function(result) {
      const code = result.codeResult.code;
      resultDiv.innerHTML = `Barcode Data: ${code}`;

      // Draw a rectangle around the detected barcode on the canvas
      const canvasContext = canvas.getContext('2d');
      canvasContext.clearRect(0, 0, canvas.width, canvas.height);

      const { x, y, width, height } = result.box;
      canvasContext.strokeStyle = '#F00'; // Merah
      canvasContext.lineWidth = 2;
      canvasContext.strokeRect(x, y, width, height);
    });

    // Stop Quagga when the page is about to be unloaded
    window.addEventListener("beforeunload", function() {
      Quagga.stop();
    });
  });
</script>

</body>
</html>
