<style>
    body {
        background-color: #fff;
    }

    .img-container {
        width: 70%;
        margin: 0 auto;
    }

    .btn-custom {
        background-image: linear-gradient(rgb(247, 223, 165), rgb(240, 193, 75));
        border-color: #a88734 #9c7e31 #846a29 !important;
        color: #111;
        border: 1px solid;
        border-radius: 5px;
    }

    .row-custom {
        width: 100%;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    /* Popup container */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    /* The actual popup (appears on top) */
    .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: #fff;
        color: #111;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        top: 125%;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        margin-right: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent #fff transparent;
    }

    /* Toggle this class when clicking on the popup container (hide and show the popup) */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>