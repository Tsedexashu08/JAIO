<svg width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
    class="iconify iconify--emojione waving-hand" preserveAspectRatio="xMidYMid meet">

    <path d="M34 42.3l7.8 1.5l6.4-32.9c.4-2.2-1-4.4-3.1-4.8c-2.2-.4-4.3 1.1-4.7 3.3L34 42.3" fill="#ffdd67">

    </path>

    <path d="M45.2 6.1c-.3-.1-.5-.1-.8-.1c1.8.7 2.8 2.6 2.4 4.6l-6.4 32.9l1.4.3l6.4-32.9c.5-2.3-.9-4.4-3-4.8"
        fill="#eba352">

    </path>

    <path d="M26 43.3h9.4V7c0-2.7-2.1-5-4.7-5C28.2 2 26 4.2 26 7v36.3" fill="#ffdd67">

    </path>

    <path d="M30.8 2c-.2 0-.5 0-.7.1c2.3.4 4 2.4 4 4.9v36.4h1.4V7c0-2.8-2.1-5-4.7-5" fill="#eba352">

    </path>

    <path d="M21 43.2l8-2.1L20.3 8c-.6-2.3-2.9-3.7-5.1-3.2c-2.2.6-3.5 2.9-2.9 5.2L21 43.2" fill="#ffdd67">

    </path>

    <path d="M15.2 4.8l-.6.3c2-.1 3.8 1.2 4.4 3.3l8.7 33.1l1.4-.4L20.3 8c-.6-2.3-2.9-3.7-5.1-3.2" fill="#eba352">

    </path>

    <path d="M4 13.4c-1.9.9-2.5 3.3-1.5 5.3L15.7 45l6.7-3.4L9.2 15.3c-1-2-3.3-2.8-5.2-1.9" fill="#ffdd67">

    </path>

    <path d="M4 13.4c-.2.1-.4.2-.6.4c1.7-.5 3.6.4 4.5 2.2l13.2 26.3l1.3-.6L9.2 15.3c-1-2-3.3-2.8-5.2-1.9"
        fill="#eba352">

    </path>

    <path
        d="M61.7 29.3c-1.6-3.1-6.6-2.9-11.7 2.7c-3.6 3.9-4.3 5.2-7.9 5.1V33s-7.7-5.7-23-3.1c0 0-8.7 1.2-8.7 5.8c0 0-1.5 11.1 1.6 18.1c4.6 10.4 28.2 13.1 35.6-4.6c1.5-3.5 4.5-6.1 7.2-9.4c3.1-4 8.6-7.2 6.9-10.5"
        fill="#ffdd67">

    </path>

    <g fill="#eba352">

        <path
            d="M61.7 29.3c-.3-.6-.7-1-1.2-1.4c.1.1.2.2.2.4c1.7 3.4-3.8 6.5-7.1 10.5c-2.7 3.3-5.7 5.9-7.2 9.4c-6.4 15.3-25 15.3-32.8 8.3c7.1 8 27.1 8.8 33.8-7.3c1.5-3.5 4.5-6.1 7.2-9.4c3.3-4 8.8-7.2 7.1-10.5">

        </path>

        <path d="M43.1 37.1c-6.5-2.4-18.1 2-16.5 13.7c0-10.9 9.9-13.6 15.3-13.6c.8-.1 1.2-.1 1.2-.1">

        </path>

    </g>

</svg>

<style>
    .waving-hand {
        transform: rotate(-20deg);
        margin-top: -12%
    }

    .waving-hand:hover {
        animation: wave 0.1s infinite alternate;
    }

    @keyframes wave {
        0% {
            transform: rotate(20deg);
        }

        100% {
            transform: rotate(-20deg);
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wavingHand = document.querySelector('.waving-hand');
        wavingHand.style.animation = 'wave 0.1s infinite alternate';
        setTimeout(() => {
            wavingHand.style.animation = '';
        }, 2000);
    });
</script>
