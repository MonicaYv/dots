<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voice Recorder</title>
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self' https: data: blob: 'unsafe-inline' 'unsafe-eval'; media-src 'self' blob:;" />
    <style>
        #status {
            font-weight: bold;
            color: green;
        }

        #error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Record Your Voice</h2>

    <div id="status">Click "Start Recording" to begin.</div>
    <div id="timer"></div>
    <div id="error"></div>

    <!-- Form to submit the recorded voice -->
    <form id="voiceForm" action="{{ route('voice') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button type="button" id="recordButton">Start Recording</button>
        <button type="button" id="stopButton" disabled>Stop Recording</button>
        <br /><br />
        <audio id="audioPlayback" controls></audio>
        <br /><br />
        <input type="hidden" name="voice_data" id="voiceData" />
        <button type="submit" disabled id="submitBtn">Submit Recording</button>
    </form>

    <script>
        let recordButton = document.getElementById("recordButton");
        let stopButton = document.getElementById("stopButton");
        let submitBtn = document.getElementById("submitBtn");
        let audioPlayback = document.getElementById("audioPlayback");
        let voiceData = document.getElementById("voiceData");
        let status = document.getElementById("status");
        let errorDisplay = document.getElementById("error");
        let timer = document.getElementById("timer");
        let mediaRecorder;
        let audioChunks = [];
        let recordingTime = 0;
        let interval;

        // Check if the browser supports MediaRecorder API
        if (!window.MediaRecorder) {
            alert("Your browser does not support audio recording.");
        }

        // Ensure compatibility with older Safari versions by including webkit prefixes
        navigator.getUserMedia =
            navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia;
        window.URL = window.URL || window.webkitURL;

        // Timer function to display recording time
        function startTimer() {
            recordingTime = 0;
            timer.textContent = `Recording time: 0s`;
            interval = setInterval(() => {
                recordingTime++;
                timer.textContent = `Recording time: ${recordingTime}s`;
            }, 1000);
        }

        function stopTimer() {
            clearInterval(interval);
            timer.textContent = `Final recording time: ${recordingTime}s`;
        }

        // Start recording
        recordButton.addEventListener("click", () => {
            if (audioPlayback.src) {
                if (!confirm("You have an existing recording. Overwrite it?")) {
                    return;
                }
            }
            audioChunks = [];
            navigator.mediaDevices
                .getUserMedia({
                    audio: true
                })
                .then((stream) => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    startTimer();
                    status.textContent = "Recording...";
                    recordButton.disabled = true;
                    stopButton.disabled = false;

                    mediaRecorder.addEventListener("dataavailable", (event) => {
                        audioChunks.push(event.data);
                    });

                    mediaRecorder.addEventListener("stop", () => {
                        stopTimer();
                        status.textContent =
                            "Recording complete. You can play or submit it.";
                        let audioBlob = new Blob(audioChunks, {
                            type: "audio/mp4"
                        });
                        let audioUrl = URL.createObjectURL(audioBlob);
                        audioPlayback.src = audioUrl;

                        // Convert the audio blob to Base64
                        let reader = new FileReader();
                        reader.readAsDataURL(audioBlob);
                        reader.onloadend = function() {
                            voiceData.value = reader.result;
                            submitBtn.disabled = false;
                        };
                    });
                })
                .catch((error) => {
                    console.error("Error accessing the microphone:", error);
                    errorDisplay.textContent =
                        "Could not access the microphone. Please ensure your browser has permission to access it.";
                    status.textContent = "Recording failed.";
                });
        });

        // Stop recording
        stopButton.addEventListener("click", () => {
            mediaRecorder.stop();
            recordButton.disabled = false;
            stopButton.disabled = true;
        });
    </script>
</body>

</html>
