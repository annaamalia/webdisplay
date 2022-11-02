(function (e) {
  if (
    !"mediaDevices" in navigator ||
    !"getUserMedia" in navigator.mediaDevices
  ) {
    alert("Camera API is not available in your browser");
    return;
  }

  // get page elements
  const video = document.querySelector("#camera-container");
  const btnPlay = document.querySelector("#btn-photo");
  const btnScreenshot = document.querySelector("#btn-capture");
  const btnChangeCamera = document.querySelector("#btn-switch");
  const screenshotsContainer = document.querySelector("#change-asset");
  const canvas = document.querySelector("#canvas");
  const devicesSelect = document.querySelector("#devicesSelect");

  // video constraints
  const constraints = {
    video: {
      width: {
        // min: 1280,
        ideal: 'auto',
        // max: 2560,
      },
      height: {
        // min: 720,
        ideal: 'auto',
        // max: 1440,
      },
    },
  };

  // use front face camera
  let useFrontCamera = true;

  // current video stream
  let videoStream;

  // handle events
  // play
  btnPlay.addEventListener("click", function () {
    video.play();
    btnPlay.classList.add("d-none");
    btnScreenshot.classList.remove("d-none");
    $('#camera-container').removeClass("d-none");
    $('#img-preview-camera').addClass("d-none");
    $('#btn-switch').removeClass("d-none");
  });

  // take screenshot
  btnScreenshot.addEventListener("click", function () {
    $('#camera-container').addClass("d-none");
    video.pause();
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext("2d").drawImage(video, 0, 0);
    $('#photo').val(canvas.toDataURL("image/png"));
    $('#change-asset').attr('src', canvas.toDataURL("image/png"));
    btnPlay.classList.remove("d-none");
    btnScreenshot.classList.add("d-none");
    $('#btn-switch').addClass("d-none");
    $('#img-preview-camera').removeClass("d-none");
  });

  // switch camera
  btnChangeCamera.addEventListener("click", function () {
    useFrontCamera = !useFrontCamera;
    initializeCamera();
    btnPlay.classList.remove("d-none");
    btnScreenshot.classList.add("d-none");
    $('#camera-container').removeClass("d-none");
    $('#img-preview-camera').addClass("d-none");
    $('#btn-switch').removeClass("d-none");
    video.play();
  });

  // stop video stream
  function stopVideoStream() {
    if (videoStream) {
      videoStream.getTracks().forEach((track) => {
        track.stop();
      });
    }
  }

  // initialize
  async function initializeCamera() {
    stopVideoStream();
    constraints.video.facingMode = useFrontCamera ? "user" : "environment";

    try {
      videoStream = await navigator.mediaDevices.getUserMedia(constraints);
      video.srcObject = videoStream;
    } catch (err) {
      hl.modal(err.message)
    }
  }

  e.Camera = initializeCamera;
})(window);