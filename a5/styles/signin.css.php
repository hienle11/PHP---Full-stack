<style>
    body {
        background-color: #fff;
    }

    #signin-section {
        width: 500px;
        margin: 3rem auto 0 auto;
    }

    #signin-section>h2 {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-container {
        width: 100%;
        padding: 1.25rem 1.625rem 2rem;
        background-color: #FFFFFF;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 1.5rem;
    }

    .form__btn--primary {
        background-image: linear-gradient(rgb(247, 223, 165), rgb(240, 193, 75));
        border-color: #a88734 #9c7e31 #846a29 !important;
        color: #111;
        border: 1px solid;
        border-radius: 5px;
        font-size: 0.8rem;
    }

    .form__btn--secondary {
        border: 1px solid;
        border-color: #adb1b8 #a2a6ac #8d9096;
        background-image: linear-gradient(rgb(247, 248, 250), rgb(231, 233, 236));
        border-radius: 5px;
        height: 2.1rem;
        font-size: 0.8rem;

    }

    .form__btn--secondary a {
        color: #111;
    }

    .form__btn--secondary a:hover {
        color: #111;
        cursor: pointer;
        text-decoration: none;
    }

    .divider {
        position: relative;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .divider::after {
        content: "";
        width: 100%;
        height: 1px;
        display: block;
        background-color: transparent;
        border-top: 1px solid #e7e7e7e7;
        position: absolute;
        top: 50%;
        margin-top: 1px;
        z-index: 1;
    }

    .divider h6 {
        
        position: relative;
        display: inline-block;
        line-height: 10px;
        font-size: 0.75rem;
        font-weight: 400;
        z-index: 2;
        margin: 0 auto;
        padding: 0 8px 0 7px;
        color: #767676;
        background-color: #fff;
    }

    @media (max-width: 768px) {
        #signin-section {
            width: 80%;
        }
    }
</style>