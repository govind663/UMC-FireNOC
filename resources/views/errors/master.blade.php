<!DOCTYPE html>
<html lang="id" dir="ltr">

	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />

	    <!-- Title -->
	    <title>Sorry, Page Not Found</title>
	    <style>
	     	html, body{
			  	margin: 0;
			  	padding: 0;
			  	text-align: center;
			  	font-family: sans-serif;
			  	background-color: #E7FFFF;
			}

			h1, a{
  				margin: 0;
			  	padding: 0;
			  	text-decoration: none;
			}

			.section{
			  	padding: 4rem 2rem;
			}

			.section .error{
			  	font-size: 150px;
			  	color: #009ef7;
			  	text-shadow: 
				    1px 1px 1px #0b73ad,    
				    2px 2px 1px #0b73ad,
				    3px 3px 1px #0b73ad,
				    4px 4px 1px #0b73ad,
				    5px 5px 1px #0b73ad,
				    6px 6px 1px #0b73ad,
				    7px 7px 1px #0b73ad,
				    8px 8px 1px #0b73ad,
				    25px 25px 8px rgba(0,0,0, 0.2);
			}

			.page{
			  	margin: 2rem 0;
			  	font-size: 20px;
			  	font-weight: 600;
			  	color: #444;
			}

			.back-home{
			  	display: inline-block;
			  	border: 2px solid #222;
			  	color: #222;
			  	text-transform: uppercase;
			  	font-weight: 600;
			  	padding: 0.75rem 1rem 0.6rem;
			  	transition: all 0.2s linear;
			  	box-shadow: 0 3px 8px rgba(0,0,0, 0.3);
			}
			.back-home:hover{
			  	background: #222;
			  	color: #ddd;
			}
	     </style>
	</head>

	<body class="bg-dark text-white py-5">
	    @yield('body')
    </body>

</html>