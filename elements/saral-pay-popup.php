<?php
// Path to your logo (relative to the page that includes this file, i.e. index.php).
// Change this to your real logo file, e.g. 'assets/images/logo.png'
$sp_logo = 'upload/saralpay.png';

// YouTube video ID (works for Shorts too). Leave empty ('') to hide the video button.
$sp_video_id = '6FeH0y952dc';
?>
<!-- ===== Saral Pay announcement popup ===== -->
<style>
    .sp-overlay {
        position: fixed; inset: 0; z-index: 99999;
        display: none; align-items: center; justify-content: center;
        padding: 16px; background: rgba(6, 22, 38, .68); backdrop-filter: blur(3px);
    }
    .sp-overlay.sp-open { display: flex; animation: spFade .25s ease-out; }
    .sp-modal {
        position: relative; display: flex; width: 100%; max-width: 860px;
        max-height: 92vh; max-height: 92dvh; overflow: hidden; background: #fff;
        border-radius: 16px; box-shadow: 0 28px 70px rgba(0, 0, 0, .4);
        animation: spRise .35s ease-out;
    }

    /* ---- Left brand panel ---- */
    .sp-brand {
        position: relative; flex: 0 0 39%; padding: 28px 26px; color: #fff; overflow: hidden;
        background: linear-gradient(165deg, #007cc4 0%, #005b8f 55%, #003f66 100%);
        display: flex; flex-direction: column; gap: 22px;
    }
    .sp-brand::before, .sp-brand::after {
        content: ""; position: absolute; border-radius: 50%; pointer-events: none;
    }
    .sp-brand::before { width: 240px; height: 240px; right: -90px; top: -80px; background: rgba(255, 255, 255, .07); }
    .sp-brand::after  { width: 160px; height: 160px; left: -60px; bottom: 90px; background: rgba(255, 60, 0, .18); }
    .sp-brand > * { position: relative; z-index: 1; }

    .sp-logo {
        align-self: flex-start; display: flex; align-items: center; gap: 10px;
        background: #fff; padding: 9px 14px; border-radius: 10px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, .2);
    }
    .sp-logo img { display: block; height: 42px; width: auto; max-width: 170px; object-fit: contain; }
    .sp-logo .sp-wordmark { display: none; color: #005b8f; font-weight: 700; font-size: 15px; line-height: 1.15; }
    .sp-logo.sp-noimg img { display: none; }
    .sp-logo.sp-noimg .sp-wordmark { display: block; }

    .sp-brand h2 { margin: 0; font-size: 42px; line-height: 1; color: #fff; font-weight: 800; letter-spacing: -.5px; }
    .sp-brand h2 span { color: #ff8a5c; }
    .sp-brand .sp-tag { margin: 10px 0 0; font-size: 15px; line-height: 1.5; opacity: .92; }

    /* mini payment-success card */
    .sp-receipt {
        margin-top: auto; padding: 14px 16px; border-radius: 12px;
        background: rgba(255, 255, 255, .95); color: #10233a;
        box-shadow: 0 10px 24px rgba(0, 0, 0, .25);
    }
    .sp-receipt-top { display: flex; align-items: center; gap: 10px; }
    .sp-tick {
        flex: 0 0 30px; height: 30px; border-radius: 50%; background: #1fa463; color: #fff;
        display: grid; place-items: center; font-size: 17px;
    }
    .sp-receipt strong { display: block; font-size: 14px; }
    .sp-receipt small { display: block; font-size: 12px; color: #5a6b7b; }
    .sp-receipt-row {
        display: flex; justify-content: space-between; margin-top: 10px; padding-top: 10px;
        border-top: 1px dashed #cfd9e2; font-size: 12.5px; color: #4a5a6a;
    }
    .sp-receipt-row b { color: #10233a; }
    .sp-secure { display: flex; align-items: center; gap: 8px; font-size: 12.5px; opacity: .9; }

    /* ---- Right content ---- */
    .sp-body { flex: 1; min-width: 0; min-height: 0; display: flex; flex-direction: column; overflow: hidden; }
    .sp-scroll { flex: 1; min-height: 0; overflow-y: auto; padding: 34px 32px 10px; -webkit-overflow-scrolling: touch; }
    .sp-footer { flex: none; padding: 14px 32px 20px; background: #fff; border-top: 1px solid #edf1f5; }
    .sp-new {
        display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px; border-radius: 999px;
        background: #fff1ea; color: #d93300; font-size: 13px; font-weight: 700; margin-bottom: 12px;
    }
    .sp-body h3 { margin: 0 0 8px; font-size: 25px; line-height: 1.25; color: #10233a; font-weight: 800; padding-right: 28px; }
    .sp-body .sp-lead { margin: 0 0 18px; font-size: 14.5px; line-height: 1.6; color: #4a5a6a; }

    .sp-list { list-style: none; margin: 0 0 12px; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .sp-list li {
        display: flex; align-items: flex-start; gap: 11px; padding: 12px;
        border: 1px solid #e3ebf1; border-radius: 12px; font-size: 14px; line-height: 1.35; color: #16293d;
        background: #fafcfd;
    }
    .sp-list li i {
        flex: 0 0 34px; height: 34px; display: grid; place-items: center;
        border-radius: 9px; background: #e3f1fa; color: #006eae; font-size: 17px;
    }
    .sp-list li span b { display: block; font-size: 14px; }
    .sp-list li span em { display: block; font-style: normal; font-size: 12.5px; color: #66778a; margin-top: 2px; }
    .sp-list li.sp-soon { grid-column: 1 / -1; align-items: center; border-style: dashed; background: transparent; color: #66778a; }
    .sp-list li.sp-soon i { background: #f0f2f4; color: #8a97a3; }

    .sp-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 14px; }
    .sp-pay {
        display: inline-flex; align-items: center; gap: 10px; padding: 15px 30px;
        border-radius: 10px; background: linear-gradient(180deg, #ff5a26, #ff3c00);
        color: #fff !important; font-weight: 700; font-size: 16.5px; text-decoration: none !important;
        box-shadow: 0 8px 20px rgba(255, 60, 0, .35); transition: transform .2s, box-shadow .2s;
    }
    .sp-pay:hover { transform: translateY(-2px); box-shadow: 0 12px 26px rgba(255, 60, 0, .45); }
    .sp-pay i { font-size: 17px; }
    .sp-later { background: none; border: 0; padding: 8px 4px; font-size: 14px; color: #5a6b7b; cursor: pointer; text-decoration: underline; }
    .sp-foot { margin: 10px 0 0; font-size: 12.5px; color: #7a8a99; }

    .sp-watch {
        display: inline-flex; align-items: center; gap: 8px; padding: 13px 20px; cursor: pointer;
        border: 2px solid #006eae; border-radius: 10px; background: #fff; color: #006eae;
        font-weight: 700; font-size: 15px; transition: background .2s;
    }
    .sp-watch:hover { background: #e9f4fb; }
    .sp-watch i { font-size: 18px; }

    /* ---- Video view (covers the popup) ---- */
    .sp-modal.sp-vid { height: min(90vh, 740px); }
    .sp-video {
        position: absolute; inset: 0; z-index: 4; display: none; flex-direction: column;
        align-items: center; padding: 14px 16px 16px; background: #071726; color: #fff;
    }
    .sp-video.sp-on { display: flex; }
    .sp-video-bar { width: 100%; display: flex; align-items: center; gap: 12px; margin-bottom: 10px; }
    .sp-back {
        display: inline-flex; align-items: center; gap: 6px; border: 0; cursor: pointer;
        padding: 8px 14px; border-radius: 999px; background: rgba(255, 255, 255, .14); color: #fff; font-size: 14px;
    }
    .sp-back:hover { background: rgba(255, 255, 255, .24); }
    .sp-video-title { font-size: 15px; font-weight: 700; }
    .sp-frame { flex: 1; min-height: 0; width: 100%; display: flex; align-items: center; justify-content: center; }
    .sp-frame-box { height: 100%; aspect-ratio: 9 / 16; max-width: 100%; border-radius: 12px; overflow: hidden; background: #000; }
    .sp-frame-box iframe { display: block; width: 100%; height: 100%; border: 0; }
    .sp-video .sp-pay { margin-top: 12px; padding: 12px 26px; font-size: 15.5px; }
    .sp-back:focus-visible, .sp-watch:focus-visible { outline: 3px solid #ff8a5c; outline-offset: 2px; }

    .sp-close {
        position: absolute; top: 12px; right: 12px; width: 36px; height: 36px;
        border: 0; border-radius: 50%; background: rgba(16, 35, 58, .08);
        color: #10233a; font-size: 22px; line-height: 1; cursor: pointer; z-index: 3;
    }
    .sp-close:hover { background: rgba(16, 35, 58, .18); }
    .sp-pay:focus-visible, .sp-close:focus-visible, .sp-later:focus-visible { outline: 3px solid #006eae; outline-offset: 2px; }

    @keyframes spFade { from { opacity: 0; } to { opacity: 1; } }
    @keyframes spRise { from { opacity: 0; transform: translateY(20px) scale(.98); } to { opacity: 1; transform: none; } }

    @media (max-width: 720px) {
        .sp-overlay { padding: 10px; }
        .sp-modal { flex-direction: column; max-height: 94vh; max-height: 94dvh; border-radius: 14px; }
        /* slim header: just the logo */
        .sp-brand { flex: none; padding: 14px 16px; gap: 0; flex-direction: row; align-items: center; }
        .sp-brand > div:not(.sp-logo), .sp-receipt, .sp-secure { display: none; }
        .sp-logo { padding: 6px 10px; }
        .sp-logo img { height: 34px; }
        /* compact content */
        .sp-scroll { padding: 16px 16px 6px; }
        .sp-new { font-size: 12px; padding: 4px 10px; margin-bottom: 8px; }
        .sp-body h3 { font-size: 19px; padding-right: 0; margin-bottom: 6px; }
        .sp-body .sp-lead { font-size: 13.5px; line-height: 1.5; margin-bottom: 12px; }
        .sp-list { grid-template-columns: 1fr; gap: 8px; margin-bottom: 6px; }
        .sp-list li { padding: 8px 10px; align-items: center; }
        .sp-list li i { flex-basis: 30px; height: 30px; font-size: 15px; }
        .sp-list li span em { display: none; }
        /* button always visible */
        .sp-footer { padding: 12px 16px calc(12px + env(safe-area-inset-bottom, 0px)); box-shadow: 0 -8px 16px rgba(16, 35, 58, .08); }
        .sp-actions { gap: 8px; }
        .sp-pay { flex: 1 1 100%; justify-content: center; padding: 14px 20px; }
        .sp-watch { flex: 1; justify-content: center; padding: 10px 12px; font-size: 14px; }
        .sp-later { flex: 1; text-align: center; padding: 10px 6px; }
        .sp-modal.sp-vid { height: 94vh; height: 94dvh; }
        .sp-video .sp-pay { width: 100%; flex: none; }
        .sp-foot { display: none; }
        .sp-close { top: 10px; right: 10px; background: rgba(255, 255, 255, .95); }
    }
    @media (max-height: 560px) and (max-width: 720px) {
        .sp-body .sp-lead { display: none; }
    }
    @media (prefers-reduced-motion: reduce) {
        .sp-overlay.sp-open, .sp-modal { animation: none; }
        .sp-pay { transition: none; }
    }
</style>

<div class="sp-overlay" id="saralPayPopup" role="dialog" aria-modal="true" aria-labelledby="spTitle">
    <div class="sp-modal">
        <button type="button" class="sp-close" id="spClose" aria-label="Close">&times;</button>

        <?php if (!empty($sp_video_id)) { ?>
        <div class="sp-video" id="spVideo">
            <div class="sp-video-bar">
                <button type="button" class="sp-back" id="spBack"><i class="bi bi-arrow-left"></i> Back</button>
                <span class="sp-video-title">How Saral Pay works</span>
            </div>
            <div class="sp-frame"><div class="sp-frame-box" id="spFrame"></div></div>
            <a class="sp-pay" href="https://sarthi-customer.srfcnbfc.com" target="_blank" rel="noopener">
                <i class="bi bi-wallet2"></i> Pay EMI now
            </a>
        </div>
        <?php } ?>

        <div class="sp-brand">
            <div class="sp-logo" id="spLogo">
                <img src="<?= htmlspecialchars($sp_logo) ?>" alt="Saral Pay"
                     onerror="document.getElementById('spLogo').classList.add('sp-noimg')">
                <span class="sp-wordmark">Saral Pay</span>
            </div>

            <div>
                <h2>Saral <span>Pay</span></h2>
                <p class="sp-tag">Pay your EMI in a few taps and see every payment the moment it happens.</p>
            </div>

            <div class="sp-receipt" aria-hidden="true">
                <div class="sp-receipt-top">
                    <div class="sp-tick"><i class="bi bi-check-lg"></i></div>
                    <div>
                        <strong>EMI paid successfully</strong>
                        <small>Receipt generated instantly</small>
                    </div>
                </div>
                <div class="sp-receipt-row"><span>Status</span><b>Updated in real time</b></div>
            </div>

            <div class="sp-secure"><i class="bi bi-shield-check"></i> Official customer payment portal</div>
        </div>

        <div class="sp-body">
          <div class="sp-scroll">
            <span class="sp-new"><i class="bi bi-megaphone"></i> Now live for all customers</span>
            <h3 id="spTitle">Pay your EMI directly with Saral Pay</h3>
            <p class="sp-lead">We are proud to announce that Shri Ram Finance Corporation has launched Saral Pay, making EMI payments easier, faster and more transparent for you.</p>

            <ul class="sp-list">
                <li><i class="bi bi-credit-card"></i><span><b>Pay EMI online</b><em>Directly through Saral Pay</em></span></li>
                <li><i class="bi bi-lightning-charge"></i><span><b>Instant receipt</b><em>Real-time EMI update</em></span></li>
                <li><i class="bi bi-graph-up"></i><span><b>EMI and history</b><em>Check all your transactions</em></span></li>
                <li><i class="bi bi-file-earmark-text"></i><span><b>NOC request</b><em>Raise it from your account</em></span></li>
                <li><i class="bi bi-unlock"></i><span><b>Foreclosure request</b><em>Close your loan early</em></span></li>
                <li class="sp-soon"><i class="bi bi-stars"></i><span>Many more features coming soon</span></li>
            </ul>
          </div>

          <div class="sp-footer">
            <div class="sp-actions">
                <a class="sp-pay" id="spPay" href="https://sarthi-customer.srfcnbfc.com" target="_blank" rel="noopener">
                    <i class="bi bi-wallet2"></i> Pay EMI now
                </a>
                <?php if (!empty($sp_video_id)) { ?>
                <button type="button" class="sp-watch" id="spWatch" data-video="<?= htmlspecialchars($sp_video_id) ?>">
                    <i class="bi bi-play-circle-fill"></i> Watch demo
                </button>
                <?php } ?>
                <button type="button" class="sp-later" id="spLater">Maybe later</button>
            </div>
            <p class="sp-foot">You will be taken to the Saral Pay customer portal.</p>
          </div>
        </div>
    </div>
</div>

<script>
(function () {
    var overlay = document.getElementById('saralPayPopup');
    if (!overlay) return;
    var KEY = 'saralPayPopupSeen';
    var lastFocus = null;

    function seen() { try { return sessionStorage.getItem(KEY) === '1'; } catch (e) { return false; } }
    function remember() { try { sessionStorage.setItem(KEY, '1'); } catch (e) {} }

    var vid = document.getElementById('spVideo');
    var frame = document.getElementById('spFrame');
    var modal = overlay.querySelector('.sp-modal');
    var watchBtn = document.getElementById('spWatch');

    function playVideo() {
        if (!vid) return;
        frame.innerHTML = '<iframe src="https://www.youtube.com/embed/' + watchBtn.getAttribute('data-video') +
            '?autoplay=1&rel=0&playsinline=1" title="How Saral Pay works" ' +
            'allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>';
        vid.classList.add('sp-on');
        modal.classList.add('sp-vid');
        document.getElementById('spBack').focus();
    }
    function stopVideo() {
        if (!vid) return;
        frame.innerHTML = '';            // removing the iframe stops playback
        vid.classList.remove('sp-on');
        modal.classList.remove('sp-vid');
    }

    function open() {
        lastFocus = document.activeElement;
        overlay.classList.add('sp-open');
        document.body.style.overflow = 'hidden';
        document.getElementById('spPay').focus();
    }
    function close() {
        stopVideo();
        overlay.classList.remove('sp-open');
        document.body.style.overflow = '';
        remember();
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }

    if (watchBtn) {
        watchBtn.addEventListener('click', playVideo);
        document.getElementById('spBack').addEventListener('click', function () { stopVideo(); watchBtn.focus(); });
    }
    document.getElementById('spClose').addEventListener('click', close);
    document.getElementById('spLater').addEventListener('click', close);
    document.getElementById('spPay').addEventListener('click', remember);
    overlay.addEventListener('click', function (e) { if (e.target === overlay) close(); });
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape' || !overlay.classList.contains('sp-open')) return;
        if (vid && vid.classList.contains('sp-on')) { stopVideo(); } else { close(); }
    });

    // Shows once per browser session. Remove the "if (!seen())" check to show on every visit.
    window.addEventListener('load', function () {
        if (!seen()) setTimeout(open, 1200);
    });
})();
</script>
<!-- ===== /Saral Pay announcement popup ===== -->