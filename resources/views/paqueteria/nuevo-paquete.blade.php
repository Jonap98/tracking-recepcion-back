<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/card.css') }}">
    <style>
        .plan {
            border-radius: 16px;
            box-shadow: 0 30px 30px -25px rgba(0, 38, 255, 0.205);
            /* padding: 10px; */
            background-color: #fff;
            color: #697e91;
            max-width: 400px;
        }

        .plan strong {
            font-weight: 600;
            color: #425275;
        }

        .plan .inner {
            align-items: center;
            padding-top: 5px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            /* padding-top: 40px; */
            background-color: #ecf0ff;
            border-radius: 12px;
            position: relative;
        }

        .plan .pricing {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #bed6fb;
            border-radius: 99em 0 0 99em;
            display: flex;
            align-items: center;
            padding: 0.625em 0.75em;
            font-size: 1.25rem;
            font-weight: 600;
            color: #425475;
        }

        .plan .title {
            font-weight: 600;
            font-size: 1.25rem;
            color: #425675;
        }

        .plan .title + * {
            /* margin-top: 0.75rem; */
        }

        .plan .info + * {
            margin-top: 1rem;
        }

        .plan .features {
            display: flex;
            flex-direction: column;
        }

        .plan .features li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .plan .features li + * {
            margin-top: 0.75rem;
        }

        .plan .features .icon {
            background-color: #1FCAC5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
        }

        .plan .features .icon svg {
            width: 14px;
            height: 14px;
        }

        .plan .features + * {
            margin-top: 1.25rem;
        }

        .plan .action {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .plan .button {
            background-color: #6558d3;
            border-radius: 6px;
            color: #fff;
            font-weight: 500;
            font-size: 1.125rem;
            text-align: center;
            border: 0;
            outline: 0;
            width: 100%;
            padding: 0.625em 0.75em;
            text-decoration: none;
        }

        .plan .button:hover, .plan .button:focus {
            background-color: #4133B7;
        }
        .signature {
            max-width: 350px;
            display: flex;
            justify-content: space-between;
        }
        .footer-row {
            /* text-align: left; */
            max-width: 450px;
            margin-left: 0;
            color: #545454;
        }
        .footer-info {
            display: block;
            color: #545454;
        }

    </style>
    <title>Nuevo Paquete</title>
</head>

<body>
    <div class="plan">
		<div class="inner">
			{{-- <span class="pricing">
				<span>
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                    </svg>
				</span>
			</span> --}}
			<p class="title">¡Usted ha recibido un paquete!</p>
			<p class="info">Porfavor pase a recogerlo a recepción en oficinas generales.</p>
			<ul class="features">
				<li>
					{{-- <span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="#fff" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span> --}}
					<span><strong>No</strong> olvide su gafet de acceso</span>
				</li>
			</ul>
			<div class="action">
			{{-- <a class="button" href="http://10.40.129.40:99"> --}}
            <a class="button" href="http://localhost:4200/recepcion/dashboard/home">
				Ver detalles
			</a>
			</div>
		</div>
	</div>
    <hr class="footer-row">

    <span class="footer-info">Esta es una notificación automática del sistema Reception Tracking</span>
    <span class="footer-info">Desarrollada por Materiales</span>
    <span class="footer-info">
        <a href="mailto:jonathan_isai_perez@whirlpool.com,mario_alberto_guerrero@whirlpool.com">Contacto</a>
    </span>
</body>
</html>
