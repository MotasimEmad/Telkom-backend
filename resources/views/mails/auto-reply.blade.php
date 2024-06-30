<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>Welcome Email</title>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');

        .footertext {
            font-size: 12px;
        }

        @media (min-width: 640px) {
            .footertext {
                font-size: 16px;
            }}
    </style>
</head>
<body style="margin : 0px">
<div style="display: flex; align-items: center; justify-content: center; flex-direction: column; margin-top: 1.25rem; font-family : Nunito, sans-serif ">
    <section style="max-width: 42rem; background-color: #fff;">
        <header style="padding-top: 1rem; padding-bottom: 1rem; display: flex; justify-content: center; width: 100%;">
            <a href="#">
                <img src="https://www.tailwindtap.com/_next/static/media/nav-logo.371aaafb.svg" alt="tailwindtaplogo"/>
            </a>
        </header>
        <div style="width : 100%; height : 2px; background-color : #365CCE;"></div>
        <div style="text-align : center; width : 100%; margin-top : 15px; ">
            <div style="font-weight : bold; font-size : 25px;">
                Thanks for <span style="position : relative">
            Contact us
            <div style="position :absolute; height : 3px; background-color : #365CCE; width : 55px; left : 1px; bottom : -4px;"></div>
          </span>
            </div>
        </div>
        <main style="text-align : start; padding-left : 20px; padding-right : 20px;">
            <p>
                Hey <span style="font-weight : bold;">{{ $full_name }}</span>,
            </p>
            <p style="margin-top : 10px;">
                We have received your message and our team will start processing it. We will get back to you shortly
            </p>
            <a href="http://telkom.ae/">
                <button style="padding-left: 1.25rem; padding-right: 1.25rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-top: 1.5rem; font-size: 14px; font-weight: bold; text-transform: capitalize; background-color: #f97316; color: #fff; transition-property: background-color; transition-duration: 300ms; transform: none; border-radius: 0.375rem; border-width: 1px; border: none; outline: none; cursor: pointer;">
                    Visit Site
                </button>
            </a>
            <p>
                Thank you, <br/>
                Telkom Team
            </p>
        </main>
        <footer style="margin-top: 2rem;">
            <div style="background-color: #f97316; padding-top :10px; padding-bottom : 10px; color: #fff; text-align: center;">
                <p class="footertext">© 2024 Telkom. All Rights Reserved.</p>
            </div>
        </footer>
    </section>
</div>
</body>
</html>