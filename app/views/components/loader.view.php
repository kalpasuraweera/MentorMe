<!-- Loader -->
<div id="loading-spinner" class="fixed flex items-center justify-center hidden"
    style="background-color: rgba(0, 0, 0, 0.5); top: 0; right: 0; bottom: 0; left: 0; z-index: 50;">
    <div class="rounded-full" style="
            animation: spin 1s linear infinite;
            border: 4px solid transparent;
            border-top-color: white;
            height: 4rem;
            width: 4rem;
        "></div>
</div>
<style>
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<script>
    function showLoader() {
        document.getElementById('loading-spinner').classList.remove('hidden');
    }

    function hideLoader() {
        document.getElementById('loading-spinner').classList.add('hidden');
    }
</script>