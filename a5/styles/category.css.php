<style>
    .body {
        background-color: #fff !important;
    }


    .container {
        text-align: center;
        min-height: 40rem;
    }




    .card-img-top {
        cursor: pointer;
    }

    .margin-center {
        margin: 0 auto !important;
    }

    .col-custom {
        background-color: #fff;
        padding: 3rem 4rem;
        border: 1px solid Lavender;
        border-left: none;

    }

    .col-custom:first-child {
        border: 1px solid Lavender;
    }

    .card-custom {
        border: none !important;
        width: 70%;
    }

    .row {
        width: 100%;
    }

    .padding-0 {
        padding-right: 0;
        padding-left: 0;
    }

    footer {
        margin-top: 10rem;
        color: #fff;
        background-color: #232F3E;
        text-align: center;
        padding: 2rem 0;
    }

    @media (max-width: 1376px) {
        html {
            font-size: 70%;
        }
    }

    @media (max-width: 600px) {
        html {
            font-size: 50%;
        }

        .col-custom:nth-child(2),
        .col-custom:nth-child(3) {
            border: 1px solid Lavender;
        }
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top:3rem;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 200;
    }

    .pagination a.active {
        font-weight: 600;
    }
</style>