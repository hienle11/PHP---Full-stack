<style>
    body {
        background-color: #EAEDED !important;
    }

    h5 {
        font-size: 3rem;
        margin-left: 2rem;
    }

    ul {
        list-style-type: none;
    }

    .row-custom {
        width: 100%;
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding: 0.5rem;
    }

    .img-container {
        width: 15%;
    }

    .list-container {
        background-color: #fff;
    }

    .order-container {
        padding: 0.5rem;
        background-color: #fff;
        padding-bottom: 2rem;
        text-align: center;
    }

    .btn-custom {
        background-image: linear-gradient(rgb(247, 223, 165), rgb(240, 193, 75));
        border-color: #a88734 #9c7e31 #846a29 !important;
        color: #111;
        border: 1px solid;
        border-radius: 5px;
        width: 80%;
    }

    .loader {
        border: 16px solid #f3f3f3;
        /* Light grey */
        border-top: 16px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        height: auto;
    }

    .stepper {
        border: 1px solid #eee;
        display: inline-block;
        overflow: visible;
        height: 2.1em;
        background: #fff;
        padding: 1px;
    }

    .stepper input {
        width: 3em;
        height: 100%;
        text-align: center;
        border: 0;
        background: transparent;
        color: #000;
    }

    .stepper button {
        width: 1.4em;
        font-weight: 300;
        height: 100%;
        line-height: 0.1em;
        font-size: 1.4em;
        padding: 0.2em !important;
        background: #eee;
        color: #333;
        border: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 1376px) {
        html {
            font-size: 70%;
        }
    }

    @media (max-width: 600px) {
        h5 {
            margin: 0rem 0.5rem !important;
        }

        html {
            font-size: 50%;
        }

        .container-fluid {
            height: 40rem;
        }
    }

    
</style>